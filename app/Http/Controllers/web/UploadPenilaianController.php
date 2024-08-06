<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Angkatan;
use App\Models\UploadPenilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UploadPenilaianController extends Controller
{

    public function title()
    {
        return 'Halaman Upload Penilaian ';
    }
    public function subtitle()
    {
        return 'Add Upload Penilaian ';
    }
    public function js()
    {
        // return asset('controller_js/admin/Dosen.js');
    }
    public function routeName()
    {
        return 'upload_penilaian';
    }

    public function index()
    {
        $data['data'] = UploadPenilaian::with(['AngkatanMhs'])->get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.upload_penilaian.index', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Upload Penilaian ';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function create()
    {
        $data['dataTugas'] = ['UAS', 'UTS', 'TUGAS AKHIR'];
        $data['angkatan'] = Angkatan::get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['judulForm'] = 'Tambah';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.upload_penilaian.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Upload Penilaian ';
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
                'file' => 'required',
            ]);

            // Jika validasi gagal, kembalikan respon dengan pesan error
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $dokumen = $request->file('file');
            $nama_file = $dokumen->getClientOriginalName();
            $dokumen->move('file-penilaian/', $nama_file);
        }

        DB::beginTransaction();
        try {
            $insert = $data['id'] == '' ? new UploadPenilaian() : UploadPenilaian::find($data['id']);
            $insert->angkatan = $data['angkatan'];
            $insert->tipe = $data['tipe'];
            if (isset($data['file']) && $data['file'] != null) {
                $insert->file = 'file-penilaian/' . $nama_file;
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
        $data['dataTugas'] = ['UAS', 'UTS', 'TUGAS AKHIR'];
        $data['angkatan'] = Angkatan::get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['judulForm'] = 'Edit';
        $data['routeName'] = $this->routeName();

        $data['data'] = UploadPenilaian::with(['AngkatanMhs'])->find($id);

        $konten = view('admin.page.upload_penilaian.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Upload Penilaian ';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::beginTransaction();
        try {
            $data = UploadPenilaian::find($id);
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