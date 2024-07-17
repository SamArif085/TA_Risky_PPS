<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Angkatan;
use App\Models\LaporanTaOjt;
use App\Models\Presensi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Milon\Barcode\DNS2D;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PresensiController extends Controller
{

    public function title()
    {
        return 'Halaman Presensi';
    }
    public function subtitle()
    {
        return 'Add Presensi';
    }
    public function js()
    {
        // return asset('controller_js/admin/Presensi.js');
    }
    public function routeName()
    {
        return 'presensi';
    }

    public function index()
    {
        $data['data'] = Presensi::get();
        // dd($data['data']);
        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.pengambilan_mk_mhs.index', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Presensi';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }
    public function riwayatpresensi($id_user)
    {
        $data['data'] = Presensi::with(['matkul', 'user'])->where('id_user', $id_user)->get()->toArray();
        // dd($data['data']);
        $data['subtitle'] = 'Riwayat Presensi';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.riwayat_presensi.index', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Presensi';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function download($filename)
    {
        $filePath = 'file-laporan-ta-ojt/' . $filename;
        return response()->download(public_path($filePath));
    }

    public function create()
    {
        $data['data'] = LaporanTaOjt::get()->toArray();
        $data['dataAngkatan'] = Angkatan::get()->toArray();
        $data['subtitle'] = $this->subtitle();
        $data['judulForm'] = 'Tambah';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.pengambilan_mk_mhs.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Presensi';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $validatedData = $request->validate([
            'id_user' => 'required|integer',
            'semester' => 'required|string|max:255',
            'angkatan' => 'required|string|max:255',
            'kode_matkul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'required|date_format:H:i:s',
            'status_kehadiran' => 'required|string|max:255',
            'keterangan' => 'nullable|string', 'ttd' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048', // validate the file upload
        ]);

        DB::beginTransaction();
        try {
            $insert = new Presensi();
            $insert->id_user = $data['id_user'];
            $insert->semester = $data['semester'];
            $insert->angkatan = $data['angkatan'];
            $insert->kode_matkul = $data['kode_matkul'];
            $insert->tanggal = $data['tanggal'];
            $insert->waktu_masuk = $data['waktu_masuk'];
            $insert->status_kehadiran = $data['status_kehadiran'];
            $insert->keterangan = $data['keterangan'];
            $insert->ttd = $data['qrcode'];
            $insert->save();
            DB::commit();
            return redirect('riwayat-presensi/' . $data['id_user'])->with('success', 'Berhasil melakukan presensi!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }
    }

    public function edit(string $id)
    {
        $data['data'] = LaporanTaOjt::get()->find($id);
        $data['dataAngkatan'] = Angkatan::get()->toArray();
        $data['subtitle'] = $this->subtitle();

        $data['judulForm'] = 'Edit';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.pengambilan_mk_mhs.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Presensi';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::beginTransaction();
        try {
            $data = LaporanTaOjt::find($id);
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

    public function presensi_mhs($kode_matkul, $angkatan, $semester)
    {

        $data = [];
        $data['subtitle'] = 'Presensi';
        $data['judulForm'] = 'Presensi';
        $data['routeName'] = $this->routeName();

        $data['kode_matkul'] = $kode_matkul;
        $data['angkatan'] = $angkatan;
        $data['semester'] = $semester;

        $data['tanggal'] = date('Y-m-d');
        $data['waktu'] =  date('H:i:s');
        $data['status_kehadiran'] =  [
            'Hadir',
            'Sakit',
            'Izin',
            'Alfa'
        ];




        $konten = view('admin.page.presensi.form', $data);

        $js = $this->js();

        $put['title'] = 'Halaman Presensi';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }
    public function search_data_mhs(Request $request)
    {
        $data = $request->all();
        $user = User::where('kode_user', $data['kode_user'])->first();

        if ($user) {
            if ($user->id == $data['id_user']) {
                $data['user'] = $user;
                $data['status'] = 200;
                $data['message'] = 'Data ditemukan';
            } else {
                $data['status'] = 500;
                $data['message'] = 'Data Barcode bukan punya anda';
            }
        } else {
            $data['status'] = 500;
            $data['message'] = 'Data tidak ditemukan';
        }
        return response()->json($data);
    }
}
