<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Angkatan;
use App\Models\KalenderAkademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AkademikKalenderController extends Controller
{

    public function title()
    {
        return 'Kalender Akademik';
    }
    public function subtitle()
    {
        return 'Add Kalender Akademik';
    }
    public function js()
    {
        return asset('controller_js/admin/akademik_kurikulum.js');
    }
    public function routeName()
    {
        return 'akademik/kalender';
    }

    public function index()
    {
        $data['data'] = KalenderAkademik::with(['Angkatan'])->get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.akademik.kalender.index', $data);
        $js = $this->js();

        $put['title'] = $this->title();
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function create()
    {
        $data['dataAngkatan'] = Angkatan::get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $data['judulForm'] = 'Tambah';
        $konten = view('admin.page.akademik.kalender.form', $data);
        $js = $this->js();

        $put['title'] = $this->title();
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        DB::beginTransaction();
        try {
            $insert = $data['id'] == '' ? new KalenderAkademik() : KalenderAkademik::find($data['id']);
            $insert->id_semester = $data['semester'];
            $insert->kode = $data['kode'];
            $insert->mata_kuliah = $data['mata_kuliah'];
            $insert->teori = $data['teori'];
            $insert->praktek = $data['praktik'];
            $insert->total = $data['total'];
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
        $data['data'] = KalenderAkademik::with(['Angkatan'])->find($id);
        $data['dataAngkatan'] = Angkatan::get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['judulForm'] = 'Edit';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.akademik.kurikulum.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Kurikulum';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    function destroy(Request $request)
    {
        $id = $request->id;
        DB::beginTransaction();
        try {
            $data = KalenderAkademik::find($id);
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
