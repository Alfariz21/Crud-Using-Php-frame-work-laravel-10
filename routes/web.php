<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KariawanController;
use App\Http\Controllers\KehadiranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('/kehadiran/store', [KehadiranController::class, 'store'])->name('kehadiran.store');
Route::get('/kariawan', [KariawanController::class, 'index'])->name('kariawan.index');
Route::post('/karyawan/store', [KariawanController::class, 'store'])->name('karyawan.store');
Route::get('/golongan', ['App\Http\Controllers\GolonganController', 'index'])->name('golongan.index');
Route::get('/golongan/create', ['App\Http\Controllers\GolonganController', 'create'])->name('golongan.create');
Route::post('/golongan', ['App\Http\Controllers\GolonganController', 'store'])->name('golongan.store');
Route::get('/golongan/{id}/edit', ['App\Http\Controllers\GolonganController', 'edit'])->name('golongan.edit');
Route::delete('/golongan/{id}', ['App\Http\Controllers\GolonganController', 'destroy'])->name('golongan.destroy');
Route::put('/golongan/{id}', ['App\Http\Controllers\GolonganController', 'update'])->name('golongan.update');
Route::get('/pelanggan', ['App\Http\Controllers\PelangganController','index']);
Route::get('/pelanggan/create', ['App\Http\Controllers\PelangganController', 'create'])->name('pelanggan.create');
Route::post('/pelanggan', ['App\Http\Controllers\PelangganController', 'store'])->name('pelanggan.store');
Route::get('/pelanggan/{id}/edit', ['App\Http\Controllers\PelangganController', 'edit'])->name('pelanggan.edit');
Route::put('/pelanggan/{id}', ['App\Http\Controllers\PelangganController', 'update'])->name('pelanggan.update');
Route::delete('/pelanggan/{id}', ['App\Http\Controllers\PelangganController', 'destroy'])->name('pelanggan.destroy');
Route::get('/pelanggan', ['App\Http\Controllers\PelangganController', 'index'])->name('pelanggan.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
