<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Angkatan;
use App\Models\LaporanTaOjt;
use App\Models\ModulMateriDosen;
use App\Models\PengambilanMkDos;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MateriController extends Controller
{

    public function title()
    {
        return 'Halaman Materi';
    }
    public function subtitle()
    {
        return 'Add Materi';
    }
    public function js()
    {
        // return asset('controller_js/admin/materi.js');
    }
    public function routeName()
    {
        return 'materi';
    }

    public function index()
    {
        $userId = Auth::id();

        // Fetch data related to the logged-in user
        $data['data'] = PengambilanMkDos::with('Dosen', 'KodeMatkul', 'RelasiPengambilanMKMhs', 'Semester', 'RelasiPengambilanMKMhs.semester')->where('id_user', $userId)->get()->toArray();
        // dd($data['data']);
        $data['subtitle'] = $this->subtitle();
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.materi.dosen.index', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Materi ';
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
        $konten = view('admin.page.riwayat_materi.index', $data);
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


    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        if (isset($data['file_materi']) && $data['file_materi'] != null) {
            // Validasi request
            $validator = Validator::make($request->all(), [
                'file_materi' => 'required',
            ]);

            // Jika validasi gagal, kembalikan respon dengan pesan error
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $dokumen = $request->file('file_materi');
            $nama_file = $dokumen->getClientOriginalName();
            $dokumen->move('file-materi/', $nama_file);
        }


        DB::beginTransaction();
        try {
            $insert = $data['id'] == '' ? new ModulMateriDosen() : ModulMateriDosen::find($data['id']);
            $insert->id_pengambilan_mk_dos = $data['id_pengambilan_mk_dos'];
            $insert->nama_materi = $data['nama_materi'];
            if (isset($data['file_materi']) && $data['file_materi'] != null) {
                $insert->file_materi = 'file-materi/' . $nama_file;
            }
            $insert->save();
            DB::commit();
            return redirect()->back()->with('success', 'Data berhasil disubmit!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }
    }

    public function edit(string $id)
    {
        $data['data'] = PengambilanMkDos::with('Dosen', 'KodeMatkul', 'RelasiPengambilanMKMhs', 'RelasiPengambilanMKMhs.semester')->find($id);
        // dd($data['data']);
        $data['subtitle'] = $this->subtitle();

        $data['judulForm'] = 'Edit';
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.materi.materi.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Presensi';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }
    public function show(string $id)
    {
        $data['data'] = PengambilanMkDos::with('Dosen', 'KodeMatkul','Semester', 'RelasiPengambilanMKMhs', 'ModulMateri', 'RelasiPengambilanMKMhs.semester')->where('id', $id)->get()->toArray();
        // dd($data['data']);
        $data['subtitle'] = 'Detail Materi';
        $data['id_pengambilan_mk_dos'] = $id;
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.materi.materi.index', $data);
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
            $data = ModulMateriDosen::find($id);
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

        $konten = view('admin.page.materi.mhs.form', $data);
        $js = $this->js();
        $put['title'] = 'Halaman Presensi';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }
}
