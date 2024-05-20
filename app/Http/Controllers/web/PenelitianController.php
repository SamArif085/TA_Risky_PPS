<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Penelitian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenelitianController extends Controller
{

    public function title()
    {
        return 'Halaman Penelitian';
    }
    public function subtitle()
    {
        return 'Add Penelitian';
    }
    public function js()
    {
        return asset('controller_js/admin/Penelitian.js');
    }
    public function routeName()
    {
        return 'penelitian';
    }

    public function index()
    {
        $data['data'] = Penelitian::with(['dosen'])->get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.research.penelitian.index', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Penelitian';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function create()
    {
        $data['dosen'] = Dosen::get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['judulForm'] = 'Tambah';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.research.penelitian.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Penelitian';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }


    public function store(Request $request)
    {
        $data = $request->all();

        DB::beginTransaction();
        try {
            $insert = $data['id'] == '' ? new Penelitian() : Penelitian::find($data['id']);
            $insert->id_dosen = $data['id_dosen'];
            $insert->judul = $data['judul'];
            $insert->jumlah = $data['jumlah'];

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
        $data['data'] = Penelitian::find($id);
        $data['dosen'] = Dosen::get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['judulForm'] = 'Edit';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.research.penelitian.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Penelitian';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::beginTransaction();
        try {
            $data = Penelitian::find($id);
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
