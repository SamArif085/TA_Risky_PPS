<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PrestasiController extends Controller
{

    public function title()
    {
        return 'Halaman Prestasi';
    }
    public function subtitle()
    {
        return 'Add Prestasi';
    }
    public function js()
    {
        return asset('controller_js/admin/Prestasi.js');
    }
    public function routeName()
    {
        return 'prestasi';
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->role == 1) {
            $data['data'] = Prestasi::with('user')->get()->toArray();
        } elseif ($user->role == 3) {
            $data['data'] = Prestasi::with('user')->where('id_user', $user->id)->get()->toArray();
        } else {
            $data['data'] = [];
        }

        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.prestasi.index', $data);
        $js = $this->js();

        $put['title'] = $this->title();
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function create()
    {
        $data = [];
        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $data['judulForm'] = 'Tambah';
        $konten = view('admin.page.prestasi.form', $data);
        $js = $this->js();

        $put['title'] = $this->title();
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function update(Request $request)
    {
        $status = $request->status;

        $id = $request->id;
        DB::beginTransaction();
        try {
            $data = Prestasi::find($id);

            $data->status = $status;
            $data->save();
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'Data berhasil diupdate',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'code' => 500,
                'message' => 'Terjadi kesalahan: ' . $th->getMessage(),
            ]);
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if (isset($data['file']) && $data['file'] != null) {
            // Validasi request
            $validator = Validator::make($request->all(), [
                'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                // Validasi untuk gambar JPEG, PNG, JPG maksimum 2MB
            ]);

            // Jika validasi gagal, kembalikan respon dengan pesan error
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $dokumen = $request->file('file');
            $nama_file = $dokumen->getClientOriginalName();
            $dokumen->move('file-prestasi/', $nama_file);
        }
        DB::beginTransaction();
        try {
            $insert = $data['id'] == '' ? new Prestasi() : Prestasi::find($data['id']);
            $insert->id_user = $data['id_user'];
            $insert->jenis_prestasi = $data['jenis_prestasi'];
            $insert->tingkat_lomba = $data['tingkat'];
            $insert->nama_lomba = $data['nama'];
            $insert->pelaksanaan_lomba = $data['pelaksanaan'];
            $insert->status = isset($data['status']) ? $data['status'] : 0;
            if (isset($data['file']) && $data['file'] != null) {
                $insert->sertifikat = 'file-prestasi/' . $nama_file;
            }
            $insert->save();
            DB::commit();
            return redirect($this->routeName())->with('success', 'Data berhasil disubmit!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }
    }

    public function edit(string $id)
    {
        $data['data'] = Prestasi::find($id);
        $data['subtitle'] = $this->subtitle();
        $data['judulForm'] = 'Edit';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.master_menu.semester.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Prestasi';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    function destroy(Request $request)
    {
        $id = $request->id;
        DB::beginTransaction();
        try {
            $data = Prestasi::find($id);
            $data->delete();

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
