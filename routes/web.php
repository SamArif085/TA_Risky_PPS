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

// ?ADMIN
// DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('guest');
