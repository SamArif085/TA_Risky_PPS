<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Akreditasi;
use App\Models\DataTaruna;
use App\Models\Dosen;
use App\Models\PrestasiTaruna;
use App\Models\Fasilitas;
use App\Models\Jurnal;
use App\Models\ListKegiatan;
use App\Models\KalenderAkademik;
use App\Models\KegiatanProdi;
use App\Models\LaporanTaOjt;
use App\Models\VideoProfile;
use App\Models\MataKuliah;
use App\Models\Penelitian;
use App\Models\Sertifikasi;


class LandingPageController extends Controller
{

    public function home()
    {
        $data = [];
        $data['link'] = Akreditasi::get();
        $data['kegiatan'] = KegiatanProdi::orderBy('created_at', 'desc')->take(6)->get();
        $data['dataDosen'] = Dosen::get();
        $data['fasilitas'] = Fasilitas::get();

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
        $kalenderAkademik = KalenderAkademik::with(['Angkatan', 'Semester'])->get();
        $dataGroupedByAngkatan = [];
        $firstSemesterGanjil = null;
        $firstSemesterGenap = null;

        foreach ($kalenderAkademik as $item) {

            $angkatanName = $item->angkatan->angkatan ?? 'kosong';
            $AngkatanTahun = $item->angkatan->tahun ?? 'kosong';
            $NamaSemester = $item->Semester->semester ?? 'kosong';
            $catatanSemester = $item->Semester->catatan ?? 'kosong';

            $dataGroupedByAngkatan[$item->id_angkatan]['name'] = $angkatanName;
            $dataGroupedByAngkatan[$item->id_angkatan]['tahun'] = $AngkatanTahun;
            $dataGroupedByAngkatan[$item->id_angkatan]['items'][] =
                [
                    'item' => $item,
                    'semester' => $NamaSemester,
                    'catatan' => $catatanSemester,
                ];

            if ($item->ganjil_genap == 1 && is_null($firstSemesterGanjil)) {
                $firstSemesterGanjil = $item->semester;
            }
            if ($item->ganjil_genap == 2 && is_null($firstSemesterGenap)) {
                $firstSemesterGenap = $item->semester;
            }

            if ($item->ganjil_genap == 1) {
                $dataGroupedByAngkatan[$item->id_angkatan]['semesterGanjil'] = $NamaSemester;
                $dataGroupedByAngkatan[$item->id_angkatan]['catatansemesterGanjil'] = $catatanSemester;
            }

            if ($item->ganjil_genap == 2) {
                $dataGroupedByAngkatan[$item->id_angkatan]['semesterGenap'] = $NamaSemester;
            }
            $dataGroupedByAngkatan[$item->id_angkatan]['catatansemesterGenap'] = $catatanSemester;
        }

        foreach ($dataGroupedByAngkatan as &$angkatan) {
            if (!isset($angkatan['semesterGanjil'])) {
                $angkatan['semesterGanjil'] = 'Semester Ganjil';
            }
            if (!isset($angkatan['semesterGenap'])) {
                $angkatan['semesterGenap'] = 'Semester Genap';
            }
        }

        $data['link'] = $dataGroupedByAngkatan;
        $data['title'] = 'Kalender';
        $data['firstSemesterGanjil'] = $firstSemesterGanjil;
        $data['firstSemesterGenap'] = $firstSemesterGenap;

        $konten = view('user.page.kalender', $data);
        $put['title'] = 'Kalender';
        $put['konten'] = $konten;

        return view('user.template.main', $put);
    }

    public function staffPengajar()
    {
        $data = [];
        $data['link'] = Dosen::get();
        $data['title'] = 'Staff Pengajar';

        $dosenTetap = [];
        $dosenTeknisi = [];

        foreach ($data['link'] as $dosen) {
            if ($dosen['id_jenis_dosen'] == 1) {
                $dosenTetap[] = $dosen;
            } elseif ($dosen['id_jenis_dosen'] == 2) {
                $dosenTeknisi[] = $dosen;
            }
        }

        $data['dosenTetap'] = $dosenTetap;
        $data['dosenTeknisi'] = $dosenTeknisi;

        $konten = view('user.page.staff_pengajar', $data);
        $put['title'] = 'Staff Pengajar';
        $put['konten'] = $konten;

        return view('user.template.main', $put);
    }
    public function laboratorium()
    {
        $data = [];
        $fasilitas = Fasilitas::where('nama', 'LIKE', '%Labolatorium%')
            ->orWhere('nama', 'LIKE', '%Laboratorium%')
            ->get();
        $tampilan = $fasilitas->chunk(3);

        $data['tampilan'] = $tampilan;
        $data['title'] = 'Fasilitas Laboratorium';

        $konten = view('user.page.laboratorium', $data);
        $put['title'] = 'Fasilitas Laboratorium';
        $put['konten'] = $konten;

        return view('user.template.main', $put);
    }
    public function penunjang()
    {
        $data = [];
        $fasilitas = Fasilitas::where('nama', 'LIKE', '%Ruang%')->orWhere('nama', 'LIKE', '%Program Studi%')->get();
        $tampilan = $fasilitas->chunk(3);
        $data['tampilan'] = $tampilan;
        $data['title'] = 'Fasilitas Penunjang';

        $konten = view('user.page.penunjang', $data);
        $put['title'] = 'Fasilitas Penunjang';
        $put['konten'] = $konten;

        return view('user.template.main', $put);
    }
    public function kelas()
    {
        $data = [];
        $fasilitas = Fasilitas::where('nama', 'LIKE', '%Kelas%')->get();
        $tampilan = $fasilitas->chunk(3);
        $data['tampilan'] = $tampilan;
        $data['title'] = 'Fasilitas Kelas';

        $konten = view('user.page.kelas', $data);
        $put['title'] = 'Fasilitas Kelas';
        $put['konten'] = $konten;

        return view('user.template.main', $put);
    }
    public function taruna()
    {
        $data = [];
        $Perstasi = PrestasiTaruna::all();

        $AkademiPerstasi = $Perstasi->where('id_master_akademik', 1);
        $nonAkademiPerstasi = $Perstasi->where('id_master_akademik', 2);

        $totalAkademi = [
            'lokal' => $AkademiPerstasi->where('lokal', '!=', null)->count(),
            'nasional' => $AkademiPerstasi->where('nasional', '!=', null)->count(),
            'internasional' => $AkademiPerstasi->where('internasional', '!=', null)->count(),
        ];
        $totalNonAkademi = [
            'lokal' => $nonAkademiPerstasi->where('lokal', '!=', null)->count(),
            'nasional' => $nonAkademiPerstasi->where('nasional', '!=', null)->count(),
            'internasional' => $nonAkademiPerstasi->where('internasional', '!=', null)->count(),
        ];

        $data['AkademiPerstasi'] = $AkademiPerstasi;
        $data['nonAkademiPerstasi'] = $nonAkademiPerstasi;
        $data['totalAkademi'] = $totalAkademi;
        $data['totalNonAkademi'] = $totalNonAkademi;
        $data['title'] = 'Data Taruna Aktif';

        $konten = view('user.page.taruna', $data);
        $put['title'] = 'Data Taruna Aktif';
        $put['konten'] = $konten;

        return view('user.template.main', $put);
    }

    public function dataTaruna()
    {
        $data = [];
        $dataTaruna = DataTaruna::with(['Angkatan'])->get();
        $dataPerAngkatan = [];
        foreach ($dataTaruna as $taruna) {
            $dataPerAngkatan[$taruna->id_angkatan][] = $taruna;
        }

        $data['dataPerAngkatan'] = $dataPerAngkatan;
        $data['title'] = 'Data Taruna Aktif';

        $konten = view('user.page.data_taruna', $data);
        $put['title'] = 'Data Taruna Aktif';
        $put['konten'] = $konten;

        return view('user.template.main', $put);
    }
    public function penelitian()
    {
        $data = [];
        $data['link'] = Penelitian::with(['Dosen'])->get();
        $data['title'] = 'Pengabdian Kepada Masyarakat';

        $konten = view('user.page.penelitian', $data);
        $put['title'] = 'Pengabdian Kepada Masyarakat';
        $put['konten'] = $konten;

        return view('user.template.main', $put);
    }
    public function pkm()
    {
        $data = [];
        $kegiatan = ListKegiatan::with('tahun', 'foto')->get();

        $kegiatanByTahun = $kegiatan->groupBy(function ($item) {
            return $item->tahun->tahun;
        });

        $data['kegiatanByTahun'] = $kegiatanByTahun;
        $data['title'] = 'Pengabdian Kepada Masyarakat';

        $konten = view('user.page.pkm', $data);
        $put['title'] = 'Pengabdian Kepada Masyarakat';
        $put['konten'] = $konten;

        return view('user.template.main', $put);
    }
    public function jurnal()
    {
        $data = [];
        $data['link'] = Jurnal::get();
        $data['title'] = 'Publikasi Ilmiah';

        $konten = view('user.page.jurnal', $data);
        $put['title'] = 'Publikasi Ilmiah';
        $put['konten'] = $konten;

        return view('user.template.main', $put);
    }
    public function ta_ojt()
    {
        $data = [];
        $data['link'] = LaporanTaOjt::with('Angkatan')->get();
        // dd(  $data['link']);
        $data['title'] = 'Publikasi Ilmiah';

        $konten = view('user.page.laporan_ta_ojt', $data);
        $put['title'] = 'Publikasi Ilmiah';
        $put['konten'] = $konten;

        return view('user.template.main', $put);
    }
}
