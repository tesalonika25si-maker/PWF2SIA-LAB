<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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

Route::get('/question', [QuestionController::class, 'index'])->name('question.index');
Route::post('/question/store', [QuestionController::class, 'store'])->name('question.store');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('checkislogin');

Route::middleware(['checkislogin'])->group(function () {
    Route::middleware(['checkrole:Super Admin'])->group(function () {
        Route::resource('users', UserController::class);
    });

    Route::middleware(['checkrole:Super Admin,mitra'])->group(function () {
        Route::resource('pelanggan', PelangganController::class);
    });
});

Route::redirect('/user', '/users');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('auth.logout');

Route::get('auth/logout', [AuthController::class,'logout'])->name('logout');
