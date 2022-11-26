<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IncomingMailController;
use App\Http\Controllers\OutgoingMailController;
use App\Http\Controllers\LoginController;

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

Route::get('/', [LoginController::class, 'index']);

Route::middleware('login')->group(function () {
    Route::get('beranda', [MainController::class, 'index']);
    Route::get('tentang', [MainController::class, 'about']);

    Route::resource('pengguna', UserController::class);

    Route::get('surat-masuk/laporan', [IncomingMailController::class, 'report']);
    Route::resource('surat-masuk', IncomingMailController::class);

    Route::get('surat-keluar/laporan', [OutgoingMailController::class, 'report']);
    Route::resource('surat-keluar', OutgoingMailController::class);

    Route::get('pengguna/{user}/ganti-password', [UserController::class, 'edit']);
});
