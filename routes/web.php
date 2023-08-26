<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\JurusanController::class, 'index'])->name('home');


use App\Http\Controllers\MahasiswaController as Mhs;

Route::prefix('/mahasiswa')->group(function () {
    Route::get('/list-daftar', [Mhs::class, 'listDaftarMahasiswa'])->name('mahaiswa.list');
    Route::get('/tabel', [Mhs::class, 'tabelMahasiswa'])->name('mahaiswa.tabel');
    Route::get('/blog', [Mhs::class, 'blogMahaiswa'])->name('mahaiswa.blog');

    Route::resource('/jurusan', App\Http\Controllers\JurusanController::class);
    // resource ini mewakili method-method index, create, store, show, edit, update, dan destroy

    // membatasi versi di route
    Route::get('/jurusan/{jurusan}', [App\Http\Controllers\JurusanController::class, 'show'])->name('jurusan.show')->middleware('auth')->middleware('can:view,jurusan');
})->middleware('auth');