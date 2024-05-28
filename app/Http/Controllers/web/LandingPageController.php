<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Akreditasi;
use App\Models\Dosen;
use App\Models\KalenderAkademik;
use App\Models\VideoProfile;
use App\Models\MataKuliah;
use App\Models\Sertifikasi;


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
        $videos = VideoProfile::get();

        foreach ($videos as $video) {
            $video->video_id = $this->extractVideoId($video->link_video);
        }

        $data['link'] = $videos;
        $data['title'] = 'Video Profile';

        $konten = view('user.page.video_profile', $data);
        $put['title'] = 'Video Profile';
        $put['konten'] = $konten;

        return view('user.template.main', $put);
    }
    private function extractVideoId($url)
    {
        if (preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $url, $matches)) {
            return $matches[1];
        }
        return null;
    }
    public function akreditasi()
    {
        $data = [];
        $get = Akreditasi::get();

        $data['link'] = $get;
        $data['title'] = 'Akreditasi';

        $konten = view('user.page.akreditasi', $data);
        $put['title'] = 'Akreditasi';
        $put['konten'] = $konten;

        return view('user.template.main', $put);
    }
    public function sertifikasi()
    {
        $data = [];
        $get = Sertifikasi::get();

        $data['link'] = $get;
        $data['title'] = 'Sertifikasi';

        $konten = view('user.page.sertifikasi', $data);
        $put['title'] = 'Sertifikasi';
        $put['konten'] = $konten;

        return view('user.template.main', $put);
    }
    public function kurikulum()
    {
        $data = [];
        $data['link'] = MataKuliah::get();
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
        $data['data'] = Dosen::get();
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
