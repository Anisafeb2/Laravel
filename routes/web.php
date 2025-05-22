<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DataMahasiswaController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

// Autentikasi
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Resource lain
Route::resource('books', BookController::class);
Route::resource('data-mahasiswa', DataMahasiswaController::class);
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::get('/barang/data', [BarangController::class, 'getData'])->name('barang.data');
