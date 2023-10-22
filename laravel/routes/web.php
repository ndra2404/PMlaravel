<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PMController;

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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/doLogin', [AuthController::class, 'authenticate'])->name('doLogin');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [AuthController::class, 'home'])->name('home');

    //siswa

    Route::any('/siswa', [SiswaController::class, 'index'])->name('siswa');
    Route::any('/siswa/{id}', [SiswaController::class, 'editSiswa'])->name('siswa.edit');
    Route::any('/siswa/delete/{id}', [SiswaController::class, 'deleteSiswa'])->name('siswa.delete');

    Route::get('/bobot', [SiswaController::class, 'bobot'])->name('bobot');
    Route::get('/kriteria', [SiswaController::class, 'kriteria'])->name('kriteria');
    Route::get('/nilai', [SiswaController::class, 'nilai'])->name('nilai');
    Route::any('/addNilai', [SiswaController::class, 'addNilai'])->name('addNilai');
    Route::get('/nilaiMinimal', [SiswaController::class, 'nilaiMinimal'])->name('nilaiMinimal');
    Route::any('/addNilaiMinimal/{id}', [SiswaController::class, 'addNilaiMinimal'])->name('addNilaiMinimal');

    //PM
    Route::get('/perhitungan', [PMController::class, 'index'])->name('perhitungan');
    Route::get('/rekomendasi', [PMController::class, 'rekomendasi'])->name('rekomendasi');
});
