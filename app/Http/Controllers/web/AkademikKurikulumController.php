<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum;
use App\Models\MataKuliah;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AkademikKurikulumController extends Controller
{

    public function title()
    {
        return 'Kurikulum Program Studi';
    }
    public function subtitle()
    {
        return 'Add Akademik Kurikulum';
    }
    public function js()
    {
        return asset('controller_js/admin/akademik_kurikulum.js');
    }
    public function routeName()
    {
        return 'akademik/kurikulum';
    }

    public function index()
    {
        $data['data'] = MataKuliah::with(['Semester'])->get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.akademik.kurikulum.index', $data);
        $js = $this->js();

        $put['title'] = $this->title();
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function create()
    {
        $data['dataSemester'] = Semester::get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $data['judulForm'] = 'Tambah';
        $konten = view('admin.page.akademik.kurikulum.form', $data);
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
            $insert = $data['id'] == '' ? new MataKuliah() : MataKuliah::find($data['id']);
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
        $data['data'] = MataKuliah::with(['Semester'])->find($id);
        $data['dataSemester'] = Semester::get()->toArray();
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
            $data = MataKuliah::find($id);
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
