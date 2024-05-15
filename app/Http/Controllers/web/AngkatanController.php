<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Angkatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AngkatanController extends Controller
{

    public function title()
    {
        return 'Halaman Angkatan';
    }
    public function subtitle()
    {
        return 'Add Angkatan';
    }
    public function js()
    {
        return asset('controller_js/admin/Angkatan.js');
    }
    public function routeName()
    {
        return 'angkatan';
    }

    public function index()
    {
        $data['data'] = Angkatan::get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.master_menu.angkatan.index', $data);
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
        $konten = view('admin.page.master_menu.angkatan.form', $data);
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
            $insert = $data['id'] == '' ? new Angkatan() : Angkatan::find($data['id']);
            $insert->angkatan = $data['angkatan'];
            $insert->tahun = $data['tahun'];

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
        $data['data'] = Angkatan::find($id);
        $data['subtitle'] = $this->subtitle();
        $data['judulForm'] = 'Edit';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.master_menu.angkatan.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Angkatan';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    function destroy(Request $request)
    {
        $id = $request->id;
        DB::beginTransaction();
        try {
            $data = Angkatan::find($id);
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