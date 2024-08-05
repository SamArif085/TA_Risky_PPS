<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Angkatan;
use App\Models\MataKuliah;
use App\Models\PengambilanMkDos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengambilanMkDosController extends Controller
{

    public function title()
    {
        return 'Halaman Pengambilan Matakuliah Dosen Pengajar';
    }
    public function subtitle()
    {
        return 'Add Pengambilan Matakuliah Dosen Pengajar';
    }
    public function js()
    {
        // return asset('controller_js/admin/Pengambilan Matakuliah Dosen.js');
    }
    public function routeName()
    {
        return 'pengambilan_mata_kuliah_dos';
    }

    public function index()
    {
        $data['data'] = PengambilanMkDos::with('Dosen', 'KodeMatkul')->get();
        // dd($data);
        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.pengambilan_mk_dos.index', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Pengambilan Matakuliah Dosen Pengajar';
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
        $data['dosen'] = User::where('role', 2)->get()->toArray();
        $data['matakuliah'] = Matakuliah::get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['judulForm'] = 'Tambah';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.pengambilan_mk_dos.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Pengambilan Matakuliah Dosen Pengajar';
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
            $insert = $data['id'] == null ? new PengambilanMkDos() : PengambilanMkDos::find($data['id']);
            $insert->id_user = $data['id_user'];
            $insert->kode_matkul = $data['kode_matkul'];
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

        $put['title'] = 'Halaman Pengambilan Matakuliah Dosen Pengajar';
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
