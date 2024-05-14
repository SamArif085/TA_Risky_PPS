<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\TahunKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TahunKegiatanController extends Controller
{

    public function title()
    {
        return 'Halaman Tahun Kegiatan';
    }
    public function subtitle()
    {
        return 'Add Tahun Kegiatan';
    }
    public function js()
    {
        return asset('controller_js/admin/TahunKegiatan.js');
    }
    public function routeName()
    {
        return 'tahunKegiatan';
    }

    public function index()
    {
        $data['data'] = TahunKegiatan::get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.master_menu.tahun_kegiatan.index', $data);
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
        $konten = view('admin.page.master_menu.tahun_kegiatan.form', $data);
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
            $insert = $data['id'] == '' ? new TahunKegiatan() : TahunKegiatan::find($data['id']);
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
        $data['data'] = TahunKegiatan::find($id);
        $data['subtitle'] = $this->subtitle();
        $data['judulForm'] = 'Edit';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.master_menu.tahun_kegiatan.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Tahun Kegiatan';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    function destroy(Request $request)
    {
        $id = $request->id;
        DB::beginTransaction();
        try {
            $data = TahunKegiatan::find($id);
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
