<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Jurnal;
use App\Models\JenisJurnal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JurnalController extends Controller
{

    public function title()
    {
        return 'Halaman Publikasi Ilmiah';
    }
    public function subtitle()
    {
        return 'Add Publikasi Ilmiah';
    }
    public function js()
    {
        return asset('controller_js/admin/Publikasi Ilmiah.js');
    }
    public function routeName()
    {
        return 'publikasi/ilmiah';
    }

    public function index()
    {
        $data['data'] = Jurnal::with(['Jenis'])->get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.research.jurnal.index', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Jurnal';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function create()
    {
        $data['jenisJurnal'] = JenisJurnal::get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['judulForm'] = 'Tambah';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.research.jurnal.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Publikasi Ilmiah';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }


    public function store(Request $request)
    {
        $data = $request->all();
        DB::beginTransaction();
        try {
            $insert = $data['id'] == '' ? new Jurnal() : Jurnal::find($data['id']);
            $insert->id_jenis_jurnal = $data['kategori'];
            $insert->nama = $data['nama'];
            $insert->judul_jurnal = $data['judul'];
            $insert->link_jurnal = $data['link'];

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
        $data['data'] = Jurnal::with(['nama', 'Jenis'])->find($id);
        $data['jenisJurnal'] = JenisJurnal::get()->toArray();
        $data['subtitle'] = $this->subtitle();

        $data['judulForm'] = 'Edit';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.research.jurnal.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Publikasi Ilmiah';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::beginTransaction();
        try {
            $data = Jurnal::find($id);
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
