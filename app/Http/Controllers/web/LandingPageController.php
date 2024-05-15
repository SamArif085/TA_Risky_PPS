<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\DosenModel;
use App\Models\KalenderAkademik;
use App\Models\KalenderAkademikModel;
use App\Models\KurikulumModel;
use App\Models\KurikuluModel;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{

    public function home()
    {
        $data = [];
        $konten = view('user.page.home', $data);
        $js = asset('controller_js/home.js');


        $put['title'] = 'Halaman Home';
        $put['konten'] = $konten;
        $put['js'] = $js;


        return view('user.template.main', $put);
    }

    public function sejarah()
    {
        $data = [];
        $data['title'] = 'Sejarah';

        $konten = view('user.page.sejarah', $data);
        $put['title'] = 'Sejarah';
        $put['konten'] = $konten;

        return view('user.template.main', $put);
    }
    public function visimisi()
    {
        $data = [];
        $data['title'] = 'Visi Misi';

        $konten = view('user.page.visi_misi', $data);
        $put['title'] = 'Visi Misi';
        $put['konten'] = $konten;

        return view('user.template.main', $put);
    }
    public function profileLulusan()
    {
        $data = [];
        $data['data'] = [];
        $data['title'] = 'Profile Lulusan';

        $konten = view('user.page.profile_lulusan', $data);
        $put['title'] = 'Profile Lulusan';
        $put['konten'] = $konten;

        return view('user.template.main', $put);
    }
    public function videoProfileLulusan()
    {
        $data = [];
        $data['data'] = [];
        $data['title'] = 'Video Profile';

        $konten = view('user.page.video_profile', $data);
        $put['title'] = 'Video Profile';
        $put['konten'] = $konten;

        return view('user.template.main', $put);
    }
    public function kurikulum()
    {
        $data = [];
        $data['data'] = KurikulumModel::get();
        $data['title'] = 'Kurikulum';

        $konten = view('user.page.kurikulum', $data);
        $put['title'] = 'Kurikulum';
        $put['konten'] = $konten;

        return view('user.template.main', $put);
    }
    public function kalender()
    {
        $data = [];
        $data['data'] = KalenderAkademik::get();
        $data['title'] = 'Kalender';

        $konten = view('user.page.kalender', $data);
        $put['title'] = 'Kalender';
        $put['konten'] = $konten;

        return view('user.template.main', $put);
    }
    public function staffPengajar()
    {
        $data = [];
        $data['data'] = DosenModel::get();
        $data['title'] = 'Staff Pengajar';

        $konten = view('user.page.staff_pengajar', $data);
        $put['title'] = 'Staff Pengajar';
        $put['konten'] = $konten;

        return view('user.template.main', $put);
    }
    public function laboratorium()
    {
        $data = [];
        $data['data'] = [];
        $data['title'] = 'Fasilitas Laboratorium';

        $konten = view('user.page.laboratorium', $data);
        $put['title'] = 'Fasilitas Laboratorium';
        $put['konten'] = $konten;

        return view('user.template.main', $put);
    }
    public function penunjang()
    {
        $data = [];
        $data['data'] = [];
        $data['title'] = 'Fasilitas Penunjang';

        $konten = view('user.page.penunjang', $data);
        $put['title'] = 'Fasilitas Penunjang';
        $put['konten'] = $konten;

        return view('user.template.main', $put);
    }
    public function kelas()
    {
        $data = [];
        $data['data'] = [];
        $data['title'] = 'Fasilitas Kelas';

        $konten = view('user.page.kelas', $data);
        $put['title'] = 'Fasilitas Kelas';
        $put['konten'] = $konten;

        return view('user.template.main', $put);
    }
    public function taruna()
    {
        $data = [];
        $data['data'] = [];
        $data['title'] = 'Data Taruna Aktif';

        $konten = view('user.page.taruna', $data);
        $put['title'] = 'Data Taruna Aktif';
        $put['konten'] = $konten;

        return view('user.template.main', $put);
    }
    public function himpunanTaruna()
    {
        $data = [];
        $data['data'] = [];
        $data['title'] = 'Himpunan Taruna';

        $konten = view('user.page.himpunan_taruna', $data);
        $put['title'] = 'Himpunan Taruna';
        $put['konten'] = $konten;

        return view('user.template.main', $put);
    }
    public function penelitian()
    {
        $data = [];
        $data['data'] = [];
        $data['title'] = 'Pengabdian Kepada Masyarakat';

        $konten = view('user.page.penelitian', $data);
        $put['title'] = 'Pengabdian Kepada Masyarakat';
        $put['konten'] = $konten;

        return view('user.template.main', $put);
    }
    public function pkm()
    {
        $data = [];
        $data['data'] = [];
        $data['title'] = 'Pengabdian Kepada Masyarakat';

        $konten = view('user.page.pkm', $data);
        $put['title'] = 'Pengabdian Kepada Masyarakat';
        $put['konten'] = $konten;

        return view('user.template.main', $put);
    }
    public function jurnal()
    {
        $data = [];
        $data['data'] = [];
        $data['title'] = 'Publikasi Ilmiah';

        $konten = view('user.page.jurnal', $data);
        $put['title'] = 'Publikasi Ilmiah';
        $put['konten'] = $konten;

        return view('user.template.main', $put);
    }
}
