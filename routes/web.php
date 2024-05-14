<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\web\DashboardController;
use App\Http\Controllers\web\LandingPageController;
use App\Http\Controllers\web\SertifikasiController;
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

// VIDEO PROFILE
Route::get('video-profile', [VideoProfileController::class, 'index'])->name('video-profile');
Route::get('video-profile/add', [VideoProfileController::class, 'create'])->name('video-profile.add');
Route::get('video-profile/edit/{id}', [VideoProfileController::class, 'edit'])->name('video-profile.edit');
Route::post('video-profile/submit', [VideoProfileController::class, 'store'])->name('video-profile.submit');


// SERTIFIKAT
Route::get('sertifikasi', [SertifikasiController::class, 'index'])->name('sertifikasi');
Route::get('sertifikasi/add', [SertifikasiController::class, 'create'])->name('sertifikasi.add');
Route::get('sertifikasi/edit/{id}', [SertifikasiController::class, 'edit'])->name('sertifikasi.edit');
Route::post('sertifikasi/submit', [SertifikasiController::class, 'store'])->name('sertifikasi.submit');
// Route::post('sertifikasi.delete', [SertifikasiController::class, 'destroy'])->name('sertifikasi.delete');
