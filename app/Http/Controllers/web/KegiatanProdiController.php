<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\KegiatanProdi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class KegiatanProdiController extends Controller
{
    public function title()
    {
        return 'Halaman Kegiatan Prodi';
    }
    public function subtitle()
    {
        return 'Add Kegiatan Prodi';
    }
    public function js()
    {
        // return asset('controller_js/admin/PengabdianMasyarakat.js');
    }
    public function routeName()
    {
        return 'kegiatan-prodi';
    }

    public function index()
    {
        $data['data'] = KegiatanProdi::get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.master_menu.kegiatan_prodi.index', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Kegiatan Prodi';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function create()
    {
        $data['data'] = KegiatanProdi::get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['judulForm'] = 'Tambah';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.master_menu.kegiatan_prodi.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Kegiatan Prodi';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if (isset($data['file']) && $data['file'] != null) {
            $validator = Validator::make($request->all(), [
                'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $dokumen = $request->file('file');
            $nama_file = $dokumen->getClientOriginalName();
            $dokumen->move('file-kegiatan-prodi/', $nama_file);
        }

        DB::beginTransaction();
        try {
            $insert = $data['id'] == '' ? new KegiatanProdi() : KegiatanProdi::find($data['id']);
            $insert->nama = $data['nama'];

            if (isset($data['file']) && $data['file'] != null) {
                $insert->foto = 'file-kegiatan-prodi/' . $nama_file;
            }

            $insert->save();
            DB::commit();
            return redirect($this->routeName())->with('success', 'Data berhasil disubmit!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }
    }

    public function edit($id)
    {
        $data['data'] = KegiatanProdi::get()->find($id);
        $data['subtitle'] = $this->subtitle();
        $data['judulForm'] = 'Edit';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.master_menu.kegiatan_prodi.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Kegiatan Prodi';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::beginTransaction();
        try {
            $data = KegiatanProdi::find($id);
            $data->delete();

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
