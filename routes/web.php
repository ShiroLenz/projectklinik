<?php

use App\Http\Controllers\AdministrasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;


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
Route::resource('dokter', DokterController::class);
Route::resource('pasien', PasienController::class);

Route::get('dokter/laporan/cetak',[DokterController::class, 'laporan']);
Route::get('pasien/laporan/cetak',[PasienController::class, 'laporan']);

Route::resource('administrasi', AdministrasiController::class);
Route::get('administrasi/laporan/cetak',[AdministrasiController::class, 'laporan']);
Route::get('administrasi/hapus/{id}', hapus);

Route::resource(PasienController::class)->Group(function(){
    Route::get('pasien/cari', 'cari');
    Route::get('/', 'registrasi');
    Route::post('/simpan', 'simpan')->name('pasien.simpan');
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


