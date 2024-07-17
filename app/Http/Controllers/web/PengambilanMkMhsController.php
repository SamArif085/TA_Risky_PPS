<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Angkatan;
use App\Models\LaporanTaOjt;
use App\Models\PengambilanMkMhs;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PengambilanMkMhsController extends Controller
{

    public function title()
    {
        return 'Halaman Pengambilan Matakuliah Mahasiswa';
    }
    public function subtitle()
    {
        return 'Add Pengambilan Matakuliah Mahasiswa';
    }
    public function js()
    {
        // return asset('controller_js/admin/Pengambilan Matakuliah Mahasiswa.js');
    }
    public function routeName()
    {
        return 'pengambilan_mata_kuliah_mhs';
    }

    public function index()
    {
        $data['data'] = PengambilanMkMhs::with(['Semester'])->get();
        // dd($data['data']);
        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.pengambilan_mk_mhs.index', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Pengambilan Matakuliah Mahasiswa';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function create()
    {
        $data['semester'] = Semester::get()->toArray();
        $data['angkatan'] = Angkatan::get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['judulForm'] = 'Tambah';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.pengambilan_mk_mhs.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Pengambilan Matakuliah Mahasiswa';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);

        DB::beginTransaction();
        try {
            $insert = $data['id'] == null ? new PengambilanMkMhs() : PengambilanMkMhs::find($data['id']);
            $insert->id_semester = $data['id_semester'];
            $insert->angkatan = $data['angkatan'];
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
        $data['data'] = PengambilanMkMhs::get()->find($id);
        $data['semester'] = Semester::get()->toArray();
        $data['angkatan'] = Angkatan::get()->toArray();
        $data['subtitle'] = $this->subtitle();

        $data['judulForm'] = 'Edit';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.pengambilan_mk_mhs.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Pengambilan Matakuliah Mahasiswa';
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
