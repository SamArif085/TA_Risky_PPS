<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Angkatan;
use App\Models\LaporanTaOjt;
use App\Models\PengambilanMkMhs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PengambilanMkDosController extends Controller
{

    public function title()
    {
        return 'Halaman Pengambilan Matakuliah Dosen';
    }
    public function subtitle()
    {
        return 'Add Pengambilan Matakuliah Dosen';
    }
    public function js()
    {
        // return asset('controller_js/admin/Pengambilan Matakuliah Dosen.js');
    }
    public function routeName()
    {
        return 'pengambilan_mata_kuliah_mhs';
    }

    public function index()
    {
        $data['data'] = PengambilanMkMhs::get();
        // dd($data['data']);
        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.pengambilan_mk_dos.index', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Pengambilan Matakuliah Dosen';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function download($filename)
    {
        $filePath = 'file-laporan-ta-ojt/' . $filename;
        return response()->download(public_path($filePath));
    }

    public function create()
    {
        $data['data'] = LaporanTaOjt::get()->toArray();
        $data['dataAngkatan'] = Angkatan::get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['judulForm'] = 'Tambah';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.pengambilan_mk_dos.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Pengambilan Matakuliah Dosen';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if (isset($data['file']) && $data['file'] != null) {
            $validator = Validator::make($request->all(), [
                'file' => 'required|mimes:doc,docx,pdf|max:3048',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $dokumen = $request->file('file');
            $nama_file = $dokumen->getClientOriginalName();
            $dokumen->move('file-laporan-ta-ojt/', $nama_file);
        }
        DB::beginTransaction();
        try {
            $insert = $data['id'] == '' ? new LaporanTaOjt() : LaporanTaOjt::find($data['id']);
            $insert->angkatan = $data['angkatan'];
            $insert->kategori = $data['kategori'];
            $insert->nama = $data['nama'];
            $insert->judul = $data['judul'];
            $insert->tahun = $data['year'];

            if (isset($data['file']) && $data['file'] != null) {
                $insert->file = 'file-laporan-ta-ojt/' . $nama_file;
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
        $data['data'] = LaporanTaOjt::get()->find($id);
        $data['dataAngkatan'] = Angkatan::get()->toArray();
        $data['subtitle'] = $this->subtitle();

        $data['judulForm'] = 'Edit';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.pengambilan_mk_dos.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Pengambilan Matakuliah Dosen';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::beginTransaction();
        try {
            $data = LaporanTaOjt::find($id);
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
