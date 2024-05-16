<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\JenisDosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DosenController extends Controller
{

    public function title()
    {
        return 'Halaman Dosen';
    }
    public function subtitle()
    {
        return 'Add Dosen';
    }
    public function js()
    {
        return asset('controller_js/admin/Dosen.js');
    }
    public function routeName()
    {
        return 'dosen';
    }

    public function index()
    {
        $data['data'] = Dosen::with(['JenisDosen'])->get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.master_menu.dosen.index', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Dosen';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function create()
    {
        $data['jenisDosen'] = JenisDosen::get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['judulForm'] = 'Tambah';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.master_menu.dosen.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Dosen';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }


    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        if (isset($data['file']) && $data['file'] != null) {
            // Validasi request
            $validator = Validator::make($request->all(), [
                'file' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Validasi untuk gambar JPEG, PNG, JPG maksimum 2MB
            ]);

            // Jika validasi gagal, kembalikan respon dengan pesan error
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $dokumen = $request->file('file');
            $nama_file = $dokumen->getClientOriginalName();
            $dokumen->move('file-dosen/', $nama_file);
        }

        DB::beginTransaction();
        try {
            $insert = $data['id'] == '' ? new Dosen() : Dosen::find($data['id']);
            $insert->nama_dosen = $data['nama_dosen'];
            $insert->id_jenis_dosen = $data['jenis_dosen'];
            $insert->jabatan = $data['jabatan'];
            $insert->fb = $data['fb'];
            $insert->twitter = $data['twitter'];
            $insert->ig = $data['ig'];

            if (isset($data['file']) && $data['file'] != null) {
                $insert->foto_dosen = 'file-dosen/' . $nama_file;
            }

            $insert->save();
            DB::commit();
            return redirect($this->routeName())->with('success', 'Data berhasil disubmit!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }
    }

    public function show(string $id)
    {
    }

    public function edit(string $id)
    {
        $data['data'] = Dosen::find($id);
        $data['subtitle'] = $this->subtitle();
        $data['judulForm'] = 'Edit';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.master_menu.dosen.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Dosen';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::beginTransaction();
        try {
            $data = Dosen::find($id);
            $data->delete();
            // jika $data->file itu ada isinya maka unlink();
            if (isset($data->file) && $data->file != null) {
                unlink($data->file);
            }
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'Data berhasil dihapus',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'code' => 500,
                'message' => 'Terjadi kesalahan: ' . $th->getMessage(),
            ]);
        }
    }
}
