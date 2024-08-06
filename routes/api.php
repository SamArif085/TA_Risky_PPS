<?php

use App\Http\Controllers\web\AkademikKalenderController;
use App\Http\Controllers\web\AkademikKurikulumController;
use App\Http\Controllers\web\AkademikStaffPengajarController;
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
use App\Http\Controllers\web\ModulMateriDosenController;
use App\Http\Controllers\web\PenelitianController;
use App\Http\Controllers\web\PengabdianMasyarakatController;
use App\Http\Controllers\web\PengambilanMkDosController;
use App\Http\Controllers\web\PengambilanMkMhsController;
use App\Http\Controllers\web\PresensiController;
use App\Http\Controllers\web\SemesterController;
use App\Http\Controllers\web\SertifikasiController;
use App\Http\Controllers\web\TahunKegiatanController;
use App\Http\Controllers\web\UploadPenilaianController;
use App\Http\Controllers\web\VideoProfileController;
use App\Models\ModulMateriDosen;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// SERTIFIKASI
Route::post('sertifikasi.delete', [SertifikasiController::class, 'destroy'])->name('sertifikasi.delete');
// AKREDITASI
Route::post('akreditasi.delete', [AkreditasiController::class, 'destroy'])->name('akreditasi.delete');
// KURIKULUM
Route::post('kurikulum.delete', [KurikulumController::class, 'destroy'])->name('master.kurikulum.delete');
// SEMESTER
Route::post('semester.delete', [SemesterController::class, 'destroy'])->name('semester.delete');
// ANGKATAN
Route::post('angkatan.delete', [AngkatanController::class, 'destroy'])->name('angkatan.delete');
// DOSEN
Route::post('dosen.delete', [DosenController::class, 'destroy'])->name('dosen.delete');
// JENIS DOSEN
Route::post('jenisDosen.delete', [JenisDosenController::class, 'destroy'])->name('jenisDosen.delete');
// FASILITAS LABORATORIUM
Route::post('laboratorium.delete', [FasilitasController::class, 'destroy'])->name('laboratorium.delete');
// FASILITAS KELAS
Route::post('kelas.delete', [FasilitasController::class, 'destroy'])->name('kelas.delete');
// FASILITAS PENUNJANG
Route::post('penunjang.delete', [FasilitasController::class, 'destroy'])->name('penunjang.delete');
// MASTER AKADEMIK
Route::post('masterAkademik.delete', [MasterAkademikController::class, 'destroy'])->name('masterAkademik.delete');
// TAHUN KEGIATAN
Route::post('tahunKegiatan.delete', [TahunKegiatanController::class, 'destroy'])->name('tahunKegiatan.delete');
// JENIS JURNAL
Route::post('jenisJurnal.delete', [JenisJurnalController::class, 'destroy'])->name('jenisJurnal.delete');
// VIDEO PROFILE
Route::post('video-profile.delete', [VideoProfileController::class, 'destroy'])->name('video-profile.delete');
// AKADEMIK KURIKULUM
Route::post('akademik/kurikulum.delete', [AkademikKurikulumController::class, 'destroy'])->name('akademik/kurikulum.delete');
// AKADEMIK KALENDER
Route::post('akademik/kalender.delete', [AkademikKalenderController::class, 'destroy'])->name('akademik/kalender.delete');
// AKADEMIK STAFF DOSEN
Route::post('akademik/staff-pengajar.delete', [AkademikStaffPengajarController::class, 'destroy'])->name('akademik/staff-pengajar.delete');
// KETARUNAAN PRESTASI
Route::post('ketarunaan/prestasi.delete', [KetarunaanPrestasiController::class, 'destroy'])->name('ketarunaan/prestasi.delete');
// KETARUNAAN PRESTASI
Route::post('ketarunaan/data-taruna.delete', [KetarunaanDataTarunaController::class, 'destroy'])->name('ketarunaan/data-taruna.delete');
// PENELITIAN
Route::post('penelitian.delete', [PenelitianController::class, 'destroy'])->name('penelitian.delete');
// PENGABDIAN MASYARAKAT
Route::post('pengabdian/masyarakat.delete', [PengabdianMasyarakatController::class, 'destroy'])->name('pengabdian/masyarakat.delete');
// PUBLIKASI ILMIAH
Route::post('publikasi/ilmiah.delete', [JurnalController::class, 'destroy'])->name('publikasi/ilmiah.delete');
// KEGIATAN PRODI
Route::post('kegiatan-prodi.delete', [KegiatanProdiController::class, 'destroy'])->name('kegiatan-prodi.delete');
// LAPORAN TA & OJT
Route::post('laporan/TA-OJT.delete', [LaporanTAOJTController::class, 'destroy'])->name('laporan/TA-OJT.delete');
// pengambilan_mk_mhs
Route::post('pengambilan_mata_kuliah_mhs.delete', [PengambilanMkMhsController::class, 'destroy'])->name('pengambilan_mata_kuliah_mhs.delete');
// pengambilan_mk_dos
Route::post('pengambilan_mata_kuliah_dos.delete', [PengambilanMkDosController::class, 'destroy'])->name('pengambilan_mata_kuliah_dos.delete');
// presensi
Route::post('presensi.delete', [PresensiController::class, 'destroy'])->name('presensi.delete');
// search_data_mhs
Route::post('search_data_mhs.cari', [PresensiController::class, 'search_data_mhs'])->name('search_data_mhs.cari');
// modul_materi_dosen
Route::post('modul_materi.delete', [ModulMateriDosenController::class, 'destroy'])->name('modul_materi.delete');
// upload_penilaian_dosen
Route::post('upload_penilaian.delete', [UploadPenilaianController::class, 'destroy'])->name('upload_penilaian.delete');
