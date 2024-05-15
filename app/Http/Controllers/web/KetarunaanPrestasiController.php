<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\JenisPrestasiTaruna;
use App\Models\MasterAkademik;
use App\Models\PrestasiTaruna;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KetarunaanPrestasiController extends Controller
{

    public function title()
    {
        return 'Prestasi';
    }
    public function subtitle()
    {
        return 'Add Prestasi';
    }
    public function js()
    {
        return asset('controller_js/admin/akademik_kurikulum.js');
    }
    public function routeName()
    {
        return 'ketarunaan/prestasi';
    }

    public function index()
    {
        $data['data'] = PrestasiTaruna::with(['MasterAkademik'])->get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.ketarunaan.prestasi.index', $data);
        $js = $this->js();

        $put['title'] = $this->title();
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function create()
    {
        $data['dataAkademik'] = MasterAkademik::get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $data['judulForm'] = 'Tambah';
        $konten = view('admin.page.ketarunaan.prestasi.form', $data);
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

        DB::beginTransaction();
        try {
            $insert = $data['id'] == '' ? new PrestasiTaruna() : PrestasiTaruna::find($data['id']);
            $insert->id_master_akademik = $data['id_master_akademik'];
            $insert->kegiatan = $data['kegiatan'];
            $insert->waktu_perolehan = $data['waktu_perolehan'];
            $insert->perstasi_yg_dicapai = $data['perstasi_yg_dicapai'];
            if ($data['id'] != '') {
                // set null
                $insert->lokal = null;
                $insert->nasional = null;
                $insert->internasional = null;
            }
            if ($data['prestasi'] == 'lokal') {
                $insert->lokal = 1;
            } elseif ($data['prestasi'] == 'nasional') {
                $insert->nasional = 1;
            } elseif ($data['prestasi'] == 'internasional') {
                $insert->internasional = 1;
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
        $data['data'] = PrestasiTaruna::find($id);
        $data['dataAkademik'] = MasterAkademik::get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['judulForm'] = 'Edit';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.ketarunaan.prestasi.form', $data);
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
            $data = PrestasiTaruna::find($id);
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
