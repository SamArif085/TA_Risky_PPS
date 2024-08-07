<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\RPS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RPSController extends Controller
{

    public function title()
    {
        return 'Halaman RPS ';
    }
    public function subtitle()
    {
        return 'Add RPS ';
    }
    public function js()
    {
        // return asset('controller_js/admin/Dosen.js');
    }
    public function routeName()
    {
        return 'rps';
    }

    public function index()
    {
        $data['data'] = RPS::get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.rps.index', $data);
        $js = $this->js();

        $put['title'] = 'Halaman RPS ';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function create()
    {
        $data['subtitle'] = $this->subtitle();
        $data['judulForm'] = 'Tambah';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.rps.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman RPS ';
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
                'file' => 'required',
            ]);

            // Jika validasi gagal, kembalikan respon dengan pesan error
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $dokumen = $request->file('file');
            $nama_file = $dokumen->getClientOriginalName();
            $dokumen->move('file-rps/', $nama_file);
        }

        DB::beginTransaction();
        try {
            $insert = $data['id'] == '' ? new RPS() : RPS::find($data['id']);
            $insert->nama = $data['nama'];
            $insert->status = isset($data['status']) ? $data['status'] : 0;
            if (isset($data['file']) && $data['file'] != null) {
                $insert->file = 'file-rps/' . $nama_file;
            }
            $insert->save();
            DB::commit();
            return redirect($this->routeName())->with('success', 'Data berhasil disubmit!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }
    }

    public function show(string $id)
    {
    }

    public function edit(string $id)
    {
        $data['data'] = RPS::find($id);
        $data['subtitle'] = $this->subtitle();
        $data['judulForm'] = 'Edit';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.rps.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman RPS ';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function update(Request $request)
    {
        $status = $request->status;
        $id_acc = $request->id_acc;
        $id = $request->id;

        DB::beginTransaction();
        try {
            $data = RPS::find($id);

            $data->status = $status;
            $data->id_acc = $id_acc;
            $data->save();
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'Data berhasil diupdate',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'code' => 500,
                'message' => 'Terjadi kesalahan: ' . $th->getMessage(),
            ]);
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::beginTransaction();
        try {
            $data = RPS::find($id);
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
