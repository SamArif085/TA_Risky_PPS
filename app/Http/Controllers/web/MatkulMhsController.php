<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Angkatan;
use App\Models\LaporanTaOjt;
use App\Models\Matkul;
use App\Models\PengambilanMkDos;
use App\Models\PengambilanMkMhs;
use App\Models\Presensi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MatkulMhsController extends Controller
{

    public function title()
    {
        return 'Halaman Matkul';
    }
    public function subtitle()
    {
        return 'Add Matkul';
    }
    public function js()
    {
        // return asset('controller_js/admin/Matkul.js');
    }
    public function routeName()
    {
        return 'matkul_mhs';
    }

    public function index($id_user)
    {
        $angkatan_mhs = User::find($id_user)->angkatan;
        $semester_mhs = PengambilanMkMhs::where('angkatan', $angkatan_mhs)->first()->id_semester;
        $data['data'] = PengambilanMkDos::with('Dosen', 'KodeMatkul', 'semester', 'RelasiPengambilanMKMhs', 'RelasiPengambilanMKMhs.semester')->where('semester', $semester_mhs)->get()->toArray();
        $data['subtitle'] = $this->subtitle();
        // $data['id_user'] = $id_user;
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.matkul_mhs.index', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Matkul';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }

    public function show($id)
    {
        $data['data'] = PengambilanMkDos::with('Dosen', 'KodeMatkul', 'Semester', 'RelasiPengambilanMKMhs', 'ModulMateri', 'RelasiPengambilanMKMhs.semester')->where('id', $id)->get()->toArray();
        // dd($data['data']);
        $data['subtitle'] = 'Detail Materi';
        // $data['id_pengambilan_mk_dos'] = $id;
        $data['routeName'] = $this->routeName();
        $konten = view('admin.page.matkul_mhs.form', $data);
        $js = $this->js();

        $put['title'] = 'Halaman Detail Materi';
        $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.template.main', $put);
    }
}
