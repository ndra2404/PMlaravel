<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;

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
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
    Route::get('/nilai', [SiswaController::class, 'nilai'])->name('nilai');
    Route::any('/addNilai', [SiswaController::class, 'addNilai'])->name('addNilai');
});
