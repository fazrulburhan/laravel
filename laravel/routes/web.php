<?php

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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\AuthController;

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');


use App\Http\Controllers\SiswaController;

// Route untuk menampilkan daftar siswa
Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');

// Route untuk menampilkan form tambah siswa
Route::get('siswa/create', [SiswaController::class, 'create'])->name('siswa.create');

// Route untuk menyimpan data siswa
Route::post('siswa', [SiswaController::class, 'store'])->name('siswa.store');

// Route untuk menampilkan form edit siswa
Route::get('siswa/{siswa}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');

// Route untuk mengupdate data siswa
Route::put('siswa/{siswa}', [SiswaController::class, 'update'])->name('siswa.update');

// Route untuk menghapus data siswa
Route::delete('siswa/{siswa}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

use App\Http\Controllers\ProfileController;

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');

