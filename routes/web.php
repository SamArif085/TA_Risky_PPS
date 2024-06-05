<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\web\AkademikKalenderController;
use App\Http\Controllers\web\AkademikKurikulumController;
use App\Http\Controllers\web\AkademikStaffPengajarController;
use App\Http\Controllers\web\DashboardController;
use App\Http\Controllers\web\LandingPageController;
use App\Http\Controllers\web\SertifikasiController;
use App\Http\Controllers\web\AkreditasiController;
use App\Http\Controllers\web\AngkatanController;
use App\Http\Controllers\web\DosenController;
use App\Http\Controllers\web\FasilitasController;
use App\Http\Controllers\web\JenisDosenController;
use App\Http\Controllers\web\JenisJurnalController;
use App\Http\Controllers\web\JurnalController;
use App\Http\Controllers\web\KegiatanProdiController;
use App\Http\Controllers\web\KetarunaanDataTarunaController;
use App\Http\Controllers\web\KetarunaanPrestasiController;
use App\Http\Controllers\web\KurikulumController;
use App\Http\Controllers\web\LaporanTAOJTController;
use App\Http\Controllers\web\MasterAkademikController;
use App\Http\Controllers\web\PenelitianController;
use App\Http\Controllers\web\PengabdianMasyarakatController;
use App\Http\Controllers\web\SemesterController;
use App\Http\Controllers\web\SettingUserController;
use App\Http\Controllers\web\TahunKegiatanController;
use App\Http\Controllers\web\VideoProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// ??LANDING PAGE
Route::get('/', [LandingPageController::class, 'home'])->name('/')->middleware('guest');
Route::get('sejarah', [LandingPageController::class, 'sejarah'])->name('sejarah');
Route::get('visimisi', [LandingPageController::class, 'visimisi'])->name('visimisi');
Route::get('profile-lulusan', [LandingPageController::class, 'profileLulusan'])->name('profile-lulusan');
Route::get('video-profile-lulusan', [LandingPageController::class, 'videoProfileLulusan'])->name('video-profile-lulusan');
Route::get('landing-akreditasi', [LandingPageController::class, 'akreditasi'])->name('landing-akreditasi');
Route::get('landing-sertifikasi', [LandingPageController::class, 'sertifikasi'])->name('landing-sertifikasi');
Route::get('landing-kurikulum', [LandingPageController::class, 'kurikulum'])->name('landing-kurikulum');
Route::get('kalender', [LandingPageController::class, 'kalender'])->name('kalender');
Route::get('staff-pengajar', [LandingPageController::class, 'staffPengajar'])->name('staff-pengajar');
Route::get('landing-laboratorium', [LandingPageController::class, 'laboratorium'])->name('landing-laboratorium');
Route::get('landing-kelas', [LandingPageController::class, 'kelas'])->name('landing-kelas');
Route::get('landing-penunjang', [LandingPageController::class, 'penunjang'])->name('landing-penunjang');
Route::get('data-taruna', [LandingPageController::class, 'dataTaruna'])->name('data-taruna');
Route::get('taruna', [LandingPageController::class, 'taruna'])->name('taruna');
Route::get('himpunan-taruna', [LandingPageController::class, 'himpunanTaruna'])->name('himpunan-taruna');
Route::get('landing-penelitian', [LandingPageController::class, 'penelitian'])->name('landing-penelitian');
Route::get('pkm', [LandingPageController::class, 'pkm'])->name('pkm');
Route::get('jurnal', [LandingPageController::class, 'jurnal'])->name('jurnal');
Route::get('landing-TA-OJT', [LandingPageController::class, 'ta_ojt'])->name('landing-TA-OJT');

// ?ADMIN
// DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
// Authrntication
Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('home', [LoginController::class, 'index'])->name('home')->middleware('guest');
Route::post('login-up', [LoginController::class, 'authentication']);
Route::get('registrasi', [LoginController::class, 'registrasi'])->name('registrasi');
Route::post('registrasiStore', [LoginController::class, 'registrasiStore']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// SERTIFIKAT
Route::get('sertifikasi', [SertifikasiController::class, 'index'])->name('sertifikasi');
Route::get('sertifikasi/add', [SertifikasiController::class, 'create'])->name('sertifikasi.add');
Route::get('sertifikasi/edit/{id}', [SertifikasiController::class, 'edit'])->name('sertifikasi.edit');
Route::post('sertifikasi/submit', [SertifikasiController::class, 'store'])->name('sertifikasi.submit');

// AKREDITAS
Route::get('akreditasi', [AkreditasiController::class, 'index'])->name('akreditasi');
Route::get('akreditasi/add', [AkreditasiController::class, 'create'])->name('akreditasi.add');
Route::get('akreditasi/edit/{id}', [AkreditasiController::class, 'edit'])->name('akreditasi.edit');
Route::post('akreditasi/submit', [AkreditasiController::class, 'store'])->name('akreditasi.submit');

// KURIKULUM

Route::get('kurikulum', [KurikulumController::class, 'index'])->name('master.kurikulum');
Route::get('kurikulum/add', [KurikulumController::class, 'create'])->name('master.kurikulum.add');
Route::get('kurikulum/edit/{id}', [KurikulumController::class, 'edit'])->name('master.kurikulum.edit');
Route::post('kurikulum/submit', [KurikulumController::class, 'store'])->name('master.kurikulum.submit');

// SEMESTER
Route::get('semester', [SemesterController::class, 'index'])->name('semester');
Route::get('semester/add', [SemesterController::class, 'create'])->name('semester.add');
Route::get('semester/edit/{id}', [SemesterController::class, 'edit'])->name('semester.edit');
Route::post('semester/submit', [SemesterController::class, 'store'])->name('semester.submit');

// ANGKATAN
Route::get('angkatan', [AngkatanController::class, 'index'])->name('angkatan');
Route::get('angkatan/add', [AngkatanController::class, 'create'])->name('angkatan.add');
Route::get('angkatan/edit/{id}', [AngkatanController::class, 'edit'])->name('angkatan.edit');
Route::post('angkatan/submit', [AngkatanController::class, 'store'])->name('angkatan.submit');

// DOSEN
Route::get('dosen', [DosenController::class, 'index'])->name('dosen');
Route::get('dosen/add', [DosenController::class, 'create'])->name('dosen.add');
Route::get('dosen/edit/{id}', [DosenController::class, 'edit'])->name('dosen.edit');
Route::post('dosen/submit', [DosenController::class, 'store'])->name('dosen.submit');

// JENIS DOSEN
Route::get('jenisDosen', [JenisDosenController::class, 'index'])->name('jenisDosen');
Route::get('jenisDosen/add', [JenisDosenController::class, 'create'])->name('jenisDosen.add');
Route::get('jenisDosen/edit/{id}', [JenisDosenController::class, 'edit'])->name('jenisDosen.edit');
Route::post('jenisDosen/submit', [JenisDosenController::class, 'store'])->name('jenisDosen.submit');

// FASILITAS LABORATORIUM
Route::get('laboratorium', [FasilitasController::class, 'laboratorium'])->name('laboratorium');
Route::get('laboratorium/add', [FasilitasController::class, 'create'])->name('laboratorium.add');
Route::get('laboratorium/edit/{id}', [FasilitasController::class, 'edit'])->name('laboratorium.edit');
Route::post('laboratorium/submit', [FasilitasController::class, 'store'])->name('laboratorium.submit');

// FASILITAS KELAS
Route::get('kelas', [FasilitasController::class, 'kelas'])->name('kelas');
Route::get('kelas/add', [FasilitasController::class, 'create'])->name('kelas.add');
Route::get('kelas/edit/{id}', [FasilitasController::class, 'edit'])->name('kelas.edit');
Route::post('kelas/submit', [FasilitasController::class, 'store'])->name('kelas.submit');

// FASILITAS PENUNJANG
Route::get('penunjang', [FasilitasController::class, 'penunjang'])->name('penunjang');
Route::get('penunjang/add', [FasilitasController::class, 'create'])->name('penunjang.add');
Route::get('penunjang/edit/{id}', [FasilitasController::class, 'edit'])->name('penunjang.edit');
Route::post('penunjang/submit', [FasilitasController::class, 'store'])->name('penunjang.submit');

// MASTER AKADEMIK
Route::get('masterAkademik', [MasterAkademikController::class, 'index'])->name('masterAkademik');
Route::get('masterAkademik/add', [MasterAkademikController::class, 'create'])->name('masterAkademik.add');
Route::get('masterAkademik/edit/{id}', [MasterAkademikController::class, 'edit'])->name('masterAkademik.edit');
Route::post('masterAkademik/submit', [MasterAkademikController::class, 'store'])->name('masterAkademik.submit');

// TAHUN KEGIATAN
Route::get('tahunKegiatan', [TahunKegiatanController::class, 'index'])->name('tahunKegiatan');
Route::get('tahunKegiatan/add', [TahunKegiatanController::class, 'create'])->name('tahunKegiatan.add');
Route::get('tahunKegiatan/edit/{id}', [TahunKegiatanController::class, 'edit'])->name('tahunKegiatan.edit');
Route::post('tahunKegiatan/submit', [TahunKegiatanController::class, 'store'])->name('tahunKegiatan.submit');

// JENIS JURNAL
Route::get('jenisJurnal', [JenisJurnalController::class, 'index'])->name('jenisJurnal');
Route::get('jenisJurnal/add', [JenisJurnalController::class, 'create'])->name('jenisJurnal.add');
Route::get('jenisJurnal/edit/{id}', [JenisJurnalController::class, 'edit'])->name('jenisJurnal.edit');
Route::post('jenisJurnal/submit', [JenisJurnalController::class, 'store'])->name('jenisJurnal.submit');

// PENELITIAN
Route::get('penelitian', [PenelitianController::class, 'index'])->name('penelitian');
Route::get('penelitian/add', [PenelitianController::class, 'create'])->name('penelitian.add');
Route::get('penelitian/edit/{id}', [PenelitianController::class, 'edit'])->name('penelitian.edit');
Route::post('penelitian/submit', [PenelitianController::class, 'store'])->name('penelitian.submit');

// PENGABDIAN MASYARAKAT
Route::get('pengabdian/masyarakat', [PengabdianMasyarakatController::class, 'index'])->name('pengabdian/masyarakat');
Route::get('pengabdian/masyarakat/add', [PengabdianMasyarakatController::class, 'create'])->name('pengabdian/masyarakat.add');
Route::get('pengabdian/masyarakat/edit/{id}', [PengabdianMasyarakatController::class, 'edit'])->name('pengabdian/masyarakat.edit');
Route::post('pengabdian/masyarakat/submit', [PengabdianMasyarakatController::class, 'store'])->name('pengabdian/masyarakat.submit');

// PUBLIKASI ILMIAH
Route::get('publikasi/ilmiah', [JurnalController::class, 'index'])->name('publikasi/ilmiah');
Route::get('publikasi/ilmiah/add', [JurnalController::class, 'create'])->name('publikasi/ilmiah.add');
Route::get('publikasi/ilmiah/edit/{id}', [JurnalController::class, 'edit'])->name('publikasi/ilmiah.edit');
Route::post('publikasi/ilmiah/submit', [JurnalController::class, 'store'])->name('publikasi/ilmiah.submit');

// ? KEBUTUHAN LANDING PAGES
// VIDEO PROFILE
Route::get('video-profile', [VideoProfileController::class, 'index'])->name('video-profile');
Route::get('video-profile/add', [VideoProfileController::class, 'create'])->name('video-profile.add');
Route::get('video-profile/edit/{id}', [VideoProfileController::class, 'edit'])->name('video-profile.edit');
Route::post('video-profile/submit', [VideoProfileController::class, 'store'])->name('video-profile.submit');

// AKADEMIK KURIKULUM
Route::get('akademik/kurikulum', [AkademikKurikulumController::class, 'index'])->name('akademik/kurikulum');
Route::get('akademik/kurikulum/add', [AkademikKurikulumController::class, 'create'])->name('akademik/kurikulum.add');
Route::get('akademik/kurikulum/edit/{id}', [AkademikKurikulumController::class, 'edit'])->name('akademik/kurikulum.edit');
Route::post('akademik/kurikulum/submit', [AkademikKurikulumController::class, 'store'])->name('akademik/kurikulum.submit');
// AKADEMIK KALENDER
Route::get('akademik/kalender', [AkademikKalenderController::class, 'index'])->name('akademik/kalender');
Route::get('akademik/kalender/add', [AkademikKalenderController::class, 'create'])->name('akademik/kalender.add');
Route::get('akademik/kalender/edit/{id}', [AkademikKalenderController::class, 'edit'])->name('akademik/kalender.edit');
Route::post('akademik/kalender/submit', [AkademikKalenderController::class, 'store'])->name('akademik/kalender.submit');
// AKADEMIK STAFF PENGAJAR
Route::get('akademik/staff-pengajar', [AkademikStaffPengajarController::class, 'index'])->name('akademik/staff-pengajar');
Route::get('akademik/staff-pengajar/add', [AkademikStaffPengajarController::class, 'create'])->name('akademik/staff-pengajar.add');
Route::get('akademik/staff-pengajar/edit/{id}', [AkademikStaffPengajarController::class, 'edit'])->name('akademik/staff-pengajar.edit');
Route::post('akademik/staff-pengajar/submit', [AkademikStaffPengajarController::class, 'store'])->name('akademik/staff-pengajar.submit');

// KETARUNAAN PRESTASI
Route::get('ketarunaan/prestasi', [KetarunaanPrestasiController::class, 'index'])->name('ketarunaan/prestasi');
Route::get('ketarunaan/prestasi/add', [KetarunaanPrestasiController::class, 'create'])->name('ketarunaan/prestasi.add');
Route::get('ketarunaan/prestasi/edit/{id}', [KetarunaanPrestasiController::class, 'edit'])->name('ketarunaan/prestasi.edit');
Route::post('ketarunaan/prestasi/submit', [KetarunaanPrestasiController::class, 'store'])->name('ketarunaan/prestasi.submit');
// KETARUNAAN DATA TARUNA
Route::get('ketarunaan/data-taruna', [KetarunaanDataTarunaController::class, 'index'])->name('ketarunaan/data-taruna');
Route::get('ketarunaan/data-taruna/add', [KetarunaanDataTarunaController::class, 'create'])->name('ketarunaan/data-taruna.add');
Route::get('ketarunaan/data-taruna/edit/{id}', [KetarunaanDataTarunaController::class, 'edit'])->name('ketarunaan/data-taruna.edit');
Route::post('ketarunaan/data-taruna/submit', [KetarunaanDataTarunaController::class, 'store'])->name('ketarunaan/data-taruna.submit');

// SETTING USER
Route::get('settingUser', [SettingUserController::class, 'index'])->name('settingUser');
Route::post('settingUser/submit', [SettingUserController::class, 'store'])->name('settingUser.submit');

// KEGIATAN PRODI
Route::get('kegiatan-prodi', [KegiatanProdiController::class, 'index'])->name('kegiatan-prodi');
Route::get('kegiatan-prodi/add', [KegiatanProdiController::class, 'create'])->name('kegiatan-prodi.add');
Route::get('kegiatan-prodi/edit/{id}', [KegiatanProdiController::class, 'edit'])->name('kegiatan-prodi.edit');
Route::post('kegiatan-prodi/submit', [KegiatanProdiController::class, 'store'])->name('kegiatan-prodi.submit');

// LAPORAN TA & OJT
Route::get('laporan/TA-OJT', [LaporanTAOJTController::class, 'index'])->name('laporan/TA-OJT');
Route::get('laporan/TA-OJT/add', [LaporanTAOJTController::class, 'create'])->name('laporan/TA-OJT.add');
Route::get('laporan/TA-OJT/edit/{id}', [LaporanTAOJTController::class, 'edit'])->name('laporan/TA-OJT.edit');
Route::post('laporan/TA-OJT/submit', [LaporanTAOJTController::class, 'store'])->name('laporan/TA-OJT.submit');
Route::get('/download/{filename}', [LaporanTAOJTController::class, 'download'])->name('file.download');

