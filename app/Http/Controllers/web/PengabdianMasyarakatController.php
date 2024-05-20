<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\ListKegiatan;
use App\Models\GambarKegiatan;
use App\Models\TahunKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PengabdianMasyarakatController extends Controller
{
    public function title()
    {
        return 'Halaman Pengabdian Masyarakat';
    }
    public function subtitle()
    {
        return 'Add Pengabdian Masyarakat';
    }
    public function js()
    {
        return asset('controller_js/admin/PengabdianMasyarakat.js');
    }
    public function routeName()
    {
        return 'pengabdian/masyarakat';
    }

    public function index()
    {

        $data['data'] = ListKegiatan::with(['foto', 'tahun'])->get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.research.pengabdian_masyarakat.index', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Pengabdian Masyarakat';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function create()
    {
        $data['tahun'] = TahunKegiatan::get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['judulForm'] = 'Tambah';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.research.pengabdian_masyarakat.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Pengabdian Masyarakat';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        DB::beginTransaction();
        try {
            $insert = $data['id'] == '' ? new ListKegiatan() : ListKegiatan::find($data['id']);
            $insert->id_tahun_kegiatan = $data['id_tahun_kegiatan'];
            $insert->nama = $data['nama'];
            $insert->rincian_kegiatan = $data['rincian_kegiatan'];
            $insert->save();

            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $file) {
                    $validator = Validator::make(['file' => $file], [
                        'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                    ]);

                    if ($validator->fails()) {
                        DB::rollBack();
                        return redirect()->back()->withErrors($validator)->withInput();
                    }

                    $nama_file = $file->getClientOriginalName();
                    $file->move('file-pengabdian-masyarakat/', $nama_file);

                    $insertFoto = new GambarKegiatan();
                    $insertFoto->id_list_kegiatan = $insert->id;
                    $insertFoto->gambar = 'file-pengabdian-masyarakat/' . $nama_file;
                    $insertFoto->save();
                }
            }

            if (isset($data['delete_images'])) {
                foreach ($data['delete_images'] as $imageId) {
                    $gambar = GambarKegiatan::find($imageId);
                    if ($gambar) {
                        if (file_exists(public_path($gambar->gambar))) {
                            unlink(public_path($gambar->gambar));
                        }
                        $gambar->delete();
                    }
                }
            }

            DB::commit();
            return redirect($this->routeName())->with('success', 'Data berhasil disubmit!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }
    }


    public function edit($id)
    {
        $data['data'] = ListKegiatan::with('Foto')->find($id);
        $data['tahun'] = TahunKegiatan::get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['judulForm'] = 'Edit';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.research.pengabdian_masyarakat.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Pengabdian Masyarakat';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::beginTransaction();
        try {
            $data = ListKegiatan::find($id);
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
