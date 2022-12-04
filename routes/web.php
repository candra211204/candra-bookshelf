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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    
    // Rute baca buku
    Route::get('baca/{id}', [BacaController::class, 'baca']);
    Route::put('beranda/{id}', [BacaController::class, 'update']);

    // Rute tabel kategori
    Route::resource('kategori', KategoriController::class)->middleware('editor_user');
    Route::get('hapusKategori/{id}', [KategoriController::class, 'destroy'])->middleware('editor_user');

    // Rute tabel buku
    Route::get('/buku', [BukuController::class, 'index']);

    // Form tambah buku
    Route::get('/buku/tambah', [BukuController::class, 'create'])->middleware('editor_user');

    // Tambah buku
    Route::post('/buku', [BukuController::class, 'store'])->middleware('editor_user');

    // Form edit buku
    Route::get('/edit/buku/{id}', [BukuController::class, 'edit'])->middleware('editor_user');

    // Update buku
    Route::put('/buku/{id}', [BukuController::class, 'update'])->middleware('editor_user');

    // Hapus buku
    Route::get('/buku/{id}', [BukuController::class, 'destroy'])->middleware('editor_user');

    // Rute tabel user
    Route::resource('user', UserController::class)->middleware('editor_user');
});
