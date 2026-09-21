<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MahasiswaController;

Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});
Route::get('/mahasiswa'/'detail', function () {
    return '<h1>Selamat datang </h1><h2>ini halaman detail mahasiswa</h2>
  });

  Route::get('/mahasiswa'/'profil', function () {
    return '<h1>Selamat datang </h1><h2>ini halaman profil mahasiswa</h2>
  });