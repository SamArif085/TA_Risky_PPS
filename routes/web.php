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
use App\Http\Controllers\web\JenisDosenController;
use App\Http\Controllers\web\JenisJurnalController;
use App\Http\Controllers\web\KurikulumController;
use App\Http\Controllers\web\LabController;
use App\Http\Controllers\web\MasterAkademikController;
use App\Http\Controllers\web\SemesterController;
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
Route::get('kurikulum', [LandingPageController::class, 'kurikulum'])->name('kurikulum');
Route::get('kalender', [LandingPageController::class, 'kalender'])->name('kalender');
Route::get('staff-pengajar', [LandingPageController::class, 'staffPengajar'])->name('staff-pengajar');
Route::get('laboratorium', [LandingPageController::class, 'laboratorium'])->name('laboratorium');
Route::get('kelas', [LandingPageController::class, 'kelas'])->name('kelas');
Route::get('penunjang', [LandingPageController::class, 'penunjang'])->name('penunjang');
Route::get('taruna', [LandingPageController::class, 'taruna'])->name('taruna');
Route::get('himpunan-taruna', [LandingPageController::class, 'himpunanTaruna'])->name('himpunan-taruna');
Route::get('penelitian', [LandingPageController::class, 'penelitian'])->name('penelitian');
Route::get('pkm', [LandingPageController::class, 'pkm'])->name('pkm');
Route::get('jurnal', [LandingPageController::class, 'jurnal'])->name('jurnal');

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
// Route::post('sertifikasi.delete', [SertifikasiController::class, 'destroy'])->name('sertifikasi.delete');

// AKREDITAS
Route::get('akreditasi', [AkreditasiController::class, 'index'])->name('akreditasi');
Route::get('akreditasi/add', [AkreditasiController::class, 'create'])->name('akreditasi.add');
Route::get('akreditasi/edit/{id}', [AkreditasiController::class, 'edit'])->name('akreditasi.edit');
Route::post('akreditasi/submit', [AkreditasiController::class, 'store'])->name('akreditasi.submit');
// Route::post('sertifikasi.delete', [AkreditasiController::class, 'destroy'])->name('sertifikasi.delete');

// KURIKULUM
Route::get('kurikulum', [KurikulumController::class, 'index'])->name('kurikulum');
Route::get('kurikulum/add', [KurikulumController::class, 'create'])->name('kurikulum.add');
Route::get('kurikulum/edit/{id}', [KurikulumController::class, 'edit'])->name('kurikulum.edit');
Route::post('kurikulum/submit', [KurikulumController::class, 'store'])->name('kurikulum.submit');
// Route::post('sertifikasi.delete', [KurikulumController::class, 'destroy'])->name('sertifikasi.delete');

// SEMESTER
Route::get('semester', [SemesterController::class, 'index'])->name('semester');
Route::get('semester/add', [SemesterController::class, 'create'])->name('semester.add');
Route::get('semester/edit/{id}', [SemesterController::class, 'edit'])->name('semester.edit');
Route::post('semester/submit', [SemesterController::class, 'store'])->name('semester.submit');
// Route::post('sertifikasi.delete', [SemesterController::class, 'destroy'])->name('sertifikasi.delete');

// ANGKATAN
Route::get('angkatan', [AngkatanController::class, 'index'])->name('angkatan');
Route::get('angkatan/add', [AngkatanController::class, 'create'])->name('angkatan.add');
Route::get('angkatan/edit/{id}', [AngkatanController::class, 'edit'])->name('angkatan.edit');
Route::post('angkatan/submit', [AngkatanController::class, 'store'])->name('angkatan.submit');
// Route::post('sertifikasi.delete', [AngkatanController::class, 'destroy'])->name('sertifikasi.delete');

// JENIS DOSEN
Route::get('jenisDosen', [JenisDosenController::class, 'index'])->name('jenisDosen');
Route::get('jenisDosen/add', [JenisDosenController::class, 'create'])->name('jenisDosen.add');
Route::get('jenisDosen/edit/{id}', [JenisDosenController::class, 'edit'])->name('jenisDosen.edit');
Route::post('jenisDosen/submit', [JenisDosenController::class, 'store'])->name('jenisDosen.submit');
// Route::post('sertifikasi.delete', [JenisDosenController::class, 'destroy'])->name('sertifikasi.delete');

// LAB
Route::get('lab', [LabController::class, 'index'])->name('lab');
Route::get('lab/add', [LabController::class, 'create'])->name('lab.add');
Route::get('lab/edit/{id}', [LabController::class, 'edit'])->name('lab.edit');
Route::post('lab/submit', [LabController::class, 'store'])->name('lab.submit');
// Route::post('sertifikasi.delete', [LabController::class, 'destroy'])->name('sertifikasi.delete');

// MASTER AKADEMIK
Route::get('masterAkademik', [MasterAkademikController::class, 'index'])->name('masterAkademik');
Route::get('masterAkademik/add', [MasterAkademikController::class, 'create'])->name('masterAkademik.add');
Route::get('masterAkademik/edit/{id}', [MasterAkademikController::class, 'edit'])->name('masterAkademik.edit');
Route::post('masterAkademik/submit', [MasterAkademikController::class, 'store'])->name('masterAkademik.submit');
// Route::post('sertifikasi.delete', [MasterAkademikController::class, 'destroy'])->name('sertifikasi.delete');

// TAHUN KEGIATAN
Route::get('tahunKegiatan', [TahunKegiatanController::class, 'index'])->name('tahunKegiatan');
Route::get('tahunKegiatan/add', [TahunKegiatanController::class, 'create'])->name('tahunKegiatan.add');
Route::get('tahunKegiatan/edit/{id}', [TahunKegiatanController::class, 'edit'])->name('tahunKegiatan.edit');
Route::post('tahunKegiatan/submit', [TahunKegiatanController::class, 'store'])->name('tahunKegiatan.submit');
// Route::post('sertifikasi.delete', [TahunKegiatanController::class, 'destroy'])->name('sertifikasi.delete');

// JENIS JURNAL
Route::get('jenisJurnal', [JenisJurnalController::class, 'index'])->name('jenisJurnal');
Route::get('jenisJurnal/add', [JenisJurnalController::class, 'create'])->name('jenisJurnal.add');
Route::get('jenisJurnal/edit/{id}', [JenisJurnalController::class, 'edit'])->name('jenisJurnal.edit');
Route::post('jenisJurnal/submit', [JenisJurnalController::class, 'store'])->name('jenisJurnal.submit');
// Route::post('sertifikasi.delete', [JenisJurnalController::class, 'destroy'])->name('sertifikasi.delete');


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
