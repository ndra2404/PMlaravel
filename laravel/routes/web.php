<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PMController;
use App\Http\Controllers\JurusanController;
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

    //kriteria
    Route::any('/kriteria', [SiswaController::class, 'kriteria'])->name('kriteria');
    Route::any('/kriteria/delete/{id}', [SiswaController::class, 'deletekriteria'])->name('kriteria.delete');

    Route::any('/kriteriaMap', [SiswaController::class, 'kriteriaMap'])->name('kriteriaMap');

    Route::get('/nilai', [SiswaController::class, 'nilai'])->name('nilai');
    Route::any('/nilai/{id}', [SiswaController::class, 'nilaiEdit'])->name('nilai.edit');
    Route::any('/addNilai', [SiswaController::class, 'addNilai'])->name('addNilai');
    Route::get('/minimal', [SiswaController::class, 'nilaiMinimal'])->name('nilaiMinimal');
    Route::any('/addNilaiMinimal/{id}', [SiswaController::class, 'addNilaiMinimal'])->name('addNilaiMinimal');

    //PM
    Route::get('/perhitungan', [PMController::class, 'index'])->name('perhitungan');
    Route::get('/rekomendasi', [PMController::class, 'rekomendasi'])->name('rekomendasi');

    //Jurusan
    Route::any('/jurusan', [JurusanController::class, 'index'])->name('jurusan');
    Route::any('/jurusan/delete/{id}', [JurusanController::class, 'delete'])->name('jurusan.delete');
    Route::any('/jurusan/{id}', [JurusanController::class, 'edit'])->name('jurusan.edit');

    //
    Route::any('/users', [AuthController::class, 'users'])->name('users');
});
