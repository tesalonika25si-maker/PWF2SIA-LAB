<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});
Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
})->name('mahasiswa.show');

Route::get('/nama/{tesa}', function ($tesa) {
    return 'Nama saya: ' . $tesa;

});

Route::get('/nim/{param1?}', function ($param1 = '2557301125') {
    return 'NIM saya: ' . $param1;
});

Route::get('/mahasiswa/detail', function () {
    return '<h1>Selamat Datang!</h1><h2>Ini halaman Detail Mahasiswa</h2>';
});

Route::get('/mahasiswa/profile', function () {
    return '<h1>Selamat Datang!</h1><h2>Ini halaman Profil Mahasiswa</h2>';
});

Route::get('/home', [HomeController::class, 'index']);

Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');


Route::get('/question', [QuestionController::class, 'index'])
		->name('question.index');

Route::get('dashboard',[DashboardController::class,'index'])
->name('dashboard.index');
