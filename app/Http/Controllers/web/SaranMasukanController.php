<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\LaporanTaOjt;
use App\Models\SaranMasukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SaranMasukanController extends Controller
{

    public function title()
    {
        return 'Halaman Saran & Masukan Prodi';
    }
    public function subtitle()
    {
        return 'Add Saran & Masukan Prodi';
    }
    public function js()
    {
        // return asset('controller_js/admin/SaranMasukan.js');
    }
    public function routeName($suffix = '')
    {
        return $suffix ? 'saran-masukan.' . $suffix : 'saran-masukan';
    }

    public function index()
    {
        $data['data'] = SaranMasukan::get();
        // dd($data['data']);
        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.saran_masukan.index', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Saran Dan Masukan Prodi';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function create()
    {
        $data['subtitle'] = $this->subtitle();
        $data['judulForm'] = 'Tambah';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.saran_masukan.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Presensi';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function store(Request $request)
    {
        $request->validate([
            'saran_masuk' => 'required|string|max:255',
        ]);

        $data = $request->only('saran_masuk');
        DB::beginTransaction();
        try {
            $insert = new SaranMasukan();
            $insert->saran_masuk = $data['saran_masuk'];
            $insert->save();
            DB::commit();
            return redirect()->route($this->routeName('add'))->with('success', 'Data berhasil disubmit!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }
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
