<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});



Auth::routes();

Route::group(['prefix' => 'dashboard/admin'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [HomeController::class, 'profile'])->name('profile');
        Route::post('update', [HomeController::class, 'updateprofile'])->name('profile.update');
    });

    Route::controller(AkunController::class)
        ->prefix('akun')
        ->as('akun.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('showdata', 'dataTable')->name('dataTable');
            Route::match(['get','post'],'tambah', 'tambahAkun')->name('add');
            Route::match(['get','post'],'{id}/ubah', 'ubahAkun')->name('edit');
            Route::delete('{id}/hapus', 'hapusAkun')->name('delete');
        });

        // 2. Tambahan route resource untuk Pegawai
        Route::controller(PegawaiController::class)
    ->prefix('pegawai')
    ->as('pegawai.')
    ->group(function () {
        Route::get('/', 'index')->name('index');                  // List pegawai
        Route::get('tambah', 'create')->name('create');           // Form tambah pegawai
        Route::post('tambah', 'store')->name('store');            // Simpan data baru
        Route::get('{pegawai}/ubah', 'edit')->name('edit');       // Form edit
        Route::put('{pegawai}/ubah', 'update')->name('update');   // Update data
        Route::delete('{pegawai}/hapus', 'destroy')->name('delete'); // Hapus data
        Route::get('{pegawai}', 'show')->name('show');            // Detail pegawai (opsional)
    });
    
});
