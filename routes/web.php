<?php

use App\Http\Controllers\web\DashboardController;
use App\Http\Controllers\web\LandingPageController;
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
Route::get('sejarah', [LandingPageController::class, 'sejarah'])->name('sejarah')->middleware('guest');
Route::get('visimisi', [LandingPageController::class, 'visimisi'])->name('visimisi')->middleware('guest');
Route::get('profile-lulusan', [LandingPageController::class, 'profileLulusan'])->name('profile-lulusan')->middleware('guest');
Route::get('video-profile-lulusan', [LandingPageController::class, 'videoProfileLulusan'])->name('video-profile-lulusan')->middleware('guest');
Route::get('kurikulum', [LandingPageController::class, 'kurikulum'])->name('kurikulum')->middleware('guest');
Route::get('kalender', [LandingPageController::class, 'kalender'])->name('kalender')->middleware('guest');
Route::get('staff-pengajar', [LandingPageController::class, 'staffPengajar'])->name('staff-pengajar')->middleware('guest');
Route::get('laboratorium', [LandingPageController::class, 'laboratorium'])->name('laboratorium')->middleware('guest');
Route::get('kelas', [LandingPageController::class, 'kelas'])->name('kelas')->middleware('guest');
Route::get('penunjang', [LandingPageController::class, 'penunjang'])->name('penunjang')->middleware('guest');
Route::get('taruna', [LandingPageController::class, 'taruna'])->name('taruna')->middleware('guest');
Route::get('himpunan-taruna', [LandingPageController::class, 'himpunanTaruna'])->name('himpunan-taruna')->middleware('guest');
Route::get('penelitian', [LandingPageController::class, 'penelitian'])->name('penelitian')->middleware('guest');
Route::get('pkm', [LandingPageController::class, 'pkm'])->name('pkm')->middleware('guest');
Route::get('jurnal', [LandingPageController::class, 'jurnal'])->name('jurnal')->middleware('guest');

// ?ADMIN
// DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('guest');
