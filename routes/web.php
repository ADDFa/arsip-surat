<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ChangeProfilController;
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
Route::post('/', [LoginController::class, 'entry']);
Route::get('/keluar', [LoginController::class, 'exit']);

Route::middleware('login')->group(function () {
    Route::get('beranda', [MainController::class, 'index']);
    Route::get('surat-masuk/laporan', [IncomingMailController::class, 'report']);
    Route::get('surat-keluar/laporan', [OutgoingMailController::class, 'report']);

    Route::singleton('tentang', AboutController::class);
    Route::singleton('pengguna.edit-profil', ChangeProfilController::class)->parameter('pengguna', 'credential');

    Route::resources(
        [
            'pengguna'          => UserController::class,
            'surat-masuk'       => IncomingMailController::class,
            'surat-keluar'      => OutgoingMailController::class
        ],
        [
            'parameters'        => [
                'surat-masuk'   => 'incoming_mail',
                'surat-keluar'  => 'outgoing_mail',
                'pengguna'      => 'user'
            ]
        ]
    );

    Route::get('test', [IncomingMailController::class, 'test']);
    Route::post('disposisi', [IncomingMailController::class, 'disposition']);
});
