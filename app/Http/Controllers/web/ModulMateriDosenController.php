<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\MataKuliah;
use App\Models\ModulMateriDosen;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ModulMateriDosenController extends Controller
{

    public function title()
    {
        return 'Halaman Modul Materi ';
    }
    public function subtitle()
    {
        return 'Add Modul Materi ';
    }
    public function js()
    {
        // return asset('controller_js/admin/Dosen.js');
    }
    public function routeName()
    {
        return 'modul_materi';
    }

    public function index()
    {
        $data['data'] = ModulMateriDosen::with(['KodeMatkulDosen'])->get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.modul_materi.index', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Modul Materi ';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function create()
    {
        $data['dataMatkul'] = MataKuliah::get()->toArray();
        $data['semester'] = Semester::get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['judulForm'] = 'Tambah';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.modul_materi.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Modul Materi ';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }


    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        if (isset($data['file_materi']) && $data['file_materi'] != null) {
            // Validasi request
            $validator = Validator::make($request->all(), [
                'file_materi' => 'required',
            ]);

            // Jika validasi gagal, kembalikan respon dengan pesan error
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $dokumen = $request->file('file_materi');
            $nama_file = $dokumen->getClientOriginalName();
            $dokumen->move('file-materi/', $nama_file);
        }



        $nama_materi = explode('-', $data['kode_matkul'])[1];
        $kode_matkul = explode('-', $data['kode_matkul'])[0];
        DB::beginTransaction();
        try {
            $insert = $data['id'] == '' ? new ModulMateriDosen() : ModulMateriDosen::find($data['id']);
            $insert->semester = $data['semester'];
            $insert->kode_matkul = $kode_matkul;
            $insert->nama_materi = $nama_materi;
            if (isset($data['file_materi']) && $data['file_materi'] != null) {
                $insert->file_materi = 'file-materi/' . $nama_file;
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
        $data['dataMatkul'] = MataKuliah::get()->toArray();
        $data['semester'] = Semester::get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['judulForm'] = 'Edit';
        $data['routeName'] = $this->routeName();

        $data['data'] = ModulMateriDosen::with(['KodeMatkulDosen'])->find($id);

        $konten = view('admin.page.modul_materi.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Modul Materi ';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::beginTransaction();
        try {
            $data = ModulMateriDosen::find($id);
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
