<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Angkatan;
use App\Models\DataTaruna;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KetarunaanDataTarunaController extends Controller
{

    public function title()
    {
        return 'Data Taruna';
    }
    public function subtitle()
    {
        return 'Add Data Taruna';
    }
    public function js()
    {
        return asset('controller_js/admin/akademik_kurikulum.js');
    }
    public function routeName()
    {
        return 'ketarunaan/data-taruna';
    }

    public function index()
    {
        $data['data'] = DataTaruna::with(['Angkatan'])->get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.ketarunaan.data_taruna.index', $data);
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
        $konten = view('admin.page.ketarunaan.data_taruna.form', $data);
        $js = $this->js();

        $put['title'] = $this->title();
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        if (isset($data['file']) && $data['file'] != null) {
            // Validasi request
            $validator = Validator::make($request->all(), [
                'file' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Validasi untuk gambar JPEG, PNG, JPG maksimum 2MB
            ]);

            // Jika validasi gagal, kembalikan respon dengan pesan error
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $dokumen = $request->file('file');
            $nama_file = $dokumen->getClientOriginalName();
            $dokumen->move('data_taruna/', $nama_file);
        }
        DB::beginTransaction();
        try {
            $insert = $data['id'] == '' ? new DataTaruna() : DataTaruna::find($data['id']);
            $insert->id_angkatan = $data['id_angkatan'];
            $insert->keterangan = $data['keterangan'];
            if (isset($data['file']) && $data['file'] != null) {
                $insert->file = 'data_taruna/' . $nama_file;
            }

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
        $data['data'] = DataTaruna::with(['Angkatan'])->find($id);
        $data['dataAngkatan'] = Angkatan::get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['judulForm'] = 'Edit';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.ketarunaan.data_taruna.form', $data);
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
            $data = DataTaruna::find($id);
            $data->delete();
            // jika $data->file itu ada isinya maka unlink();
            if (isset($data->foto_dosen) && $data->foto_dosen != null) {
                unlink($data->foto_dosen);
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
