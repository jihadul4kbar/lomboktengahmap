<?php

use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PengaturanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::resource('/kategori', KategoriController::class)->middleware('auth');
Route::resource('/lokasi', LokasiController::class)->middleware('auth');
Route::resource('/area', AreaController::class)->middleware('auth');
Route::get('/dashboard',[Dashboard::class, 'index'])->name('dashboard')->middleware('auth');

/*
| -------------------------------------
| Routing untuk Proses User
| -------------------------------------
*/
Route::get('/pengguna', [AuthController::class, 'datapengguna'])->middleware('auth');
Route::get('/daftar', [AuthController::class, 'formUser'])->name('daftar')->middleware('auth');
Route::post('/daftar',[AuthController::class, 'simpan'])->name('daftar')->middleware('auth');
Route::get('/logout',[AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login')->middleware('guest');


Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan');
Route::post('/pengaturan/update', [PengaturanController::class, 'update'])->name('update');
