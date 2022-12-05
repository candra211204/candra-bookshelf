<?php

use App\Http\Controllers\BacaController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Halaman pertama kali muncul
Route::get('/', function () {
    return redirect('beranda');
});

// Rute ke halaman beranda
Route::get('beranda', [BerandaController::class, 'index']);

// Rute halaman home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    // Halaman baca
    Route::get('/baca/{id}', [BerandaController::class, 'baca']);
    
    // Rute kategori
        // Halaman tabel kategori
        Route::resource('kategori', KategoriController::class)->middleware('editor_user');

        // Aksi hapus kategori
        Route::get('hapusKategori/{id}', [KategoriController::class, 'destroy'])->middleware('editor_user');

    // Rute buku
        // Halaman tabel buku
        Route::get('buku', [BukuController::class, 'index']);

        // Halaman form tambah buku
        Route::get('buku/tambah', [BukuController::class, 'create'])->middleware('editor_user');

        // Aksi tambah buku
        Route::post('buku', [BukuController::class, 'store'])->middleware('editor_user');

        // Halaman form edit buku
        Route::get('edit/buku/{id}', [BukuController::class, 'edit'])->middleware('editor_user');
        
        // Aksi update buku
        Route::put('buku/{id}', [BukuController::class, 'update'])->middleware('editor_user');
        
        // Aksi hapus buku
        Route::get('buku/{id}', [BukuController::class, 'destroy'])->middleware('editor_user');
    
    // Rute user
        // Halaman tabel user
        Route::get('user', [UserController::class, 'index']);

        // Halaman form edit user
        Route::get('edit/user/{id}', [UserController::class, 'edit'])->middleware('editor_user');
        
        // Aksi update user
        Route::put('user/{id}', [UserController::class, 'update'])->middleware('editor_user');
});

Auth::routes();
