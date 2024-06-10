<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FasilitasController extends Controller
{
    public function title()
    {
        return 'Halaman Fasilitas';
    }

    public function subtitle($type)
    {
        return 'Add Fasilitas ' . ucfirst($type);
    }

    public function js()
    {
        return asset('controller_js/admin/fasilitas.js');
    }

    public function routeName($type)
    {
        return $type;
    }

    public function laboratorium()
    {
        return $this->showFasilitas('laboratorium');
    }

    public function kelas()
    {
        return $this->showFasilitas('kelas');
    }

    public function penunjang()
    {
        return $this->showFasilitas('penunjang');
    }

    public function showFasilitas($type)
    {
        $query = Fasilitas::query();
        if ($type == 'laboratorium') {
            $query->where('nama', 'LIKE', '%Labolatorium%')->orWhere('nama', 'LIKE', '%Laboratorium%');
        } elseif ($type == 'kelas') {
            $query->where('nama', 'LIKE', '%Kelas%');
        } elseif ($type == 'penunjang') {
            $query->where('nama', 'LIKE', '%Ruang%')
                ->orWhere('nama', 'LIKE', '%Program Studi%');
        }

        $data['data'] = $query->get()->toArray();
        $data['subtitle'] = $this->subtitle($type);
        $data['routeName'] = $this->routeName($type);
        $konten = view('admin.page.fasilitas.' . $type . '.index', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Fasilitas';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function create(Request $request)
    {
        $type = $request->segment(1);
        $data = [];
        $data['subtitle'] = $this->subtitle($type);
        $data['judulForm'] = 'Tambah';
        $data['routeName'] = $this->routeName($type);
        $konten = view('admin.page.fasilitas.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Fasilitas';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function store(Request $request)
    {
        $type = $request->segment(1);
        $data = $request->all();

        if (isset($data['file']) && $data['file'] != null) {
            $validator = Validator::make($request->all(), [
                'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $dokumen = $request->file('file');
            $nama_file = $dokumen->getClientOriginalName();
            $dokumen->move('file-fasilitas/', $nama_file);
        }

        DB::beginTransaction();
        try {
            $insert = $data['id'] == '' ? new Fasilitas() : Fasilitas::find($data['id']);
            $insert->nama = $data['nama'];
            $insert->lokasi = $data['lokasi'];

            if (isset($data['file']) && $data['file'] != null) {
                $insert->foto = 'file-fasilitas/' . $nama_file;
            }

            $insert->save();
            DB::commit();
            return redirect(route($type))->with('success', 'Data berhasil disubmit!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {
        $type = $request->segment(1);
        $data['data'] = Fasilitas::find($id);
        $data['subtitle'] = $this->subtitle($type);
        $data['judulForm'] = 'Edit';
        $data['routeName'] = $this->routeName($type);
        $konten = view('admin.page.fasilitas.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Fasilitas';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::beginTransaction();
        try {
            $data = Fasilitas::find($id);
            $data->delete();

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
