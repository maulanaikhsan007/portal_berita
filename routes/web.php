<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\PlaylistController;
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

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

//Kategori
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::get('/kategori/destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

//Artikel
Route::get('/artikel', [ArtikelController::class, 'index']);
Route::get('/artikel/create', [ArtikelController::class, 'create'])->name('artikel.create');
Route::post('/artikel', [ArtikelController::class, 'store'])->name('artikel.store');
Route::get('/artikel/edit/{id}', [ArtikelController::class, 'edit'])->name('artikel.edit');
Route::put('/artikel/update/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
Route::get('/artikel/destroy/{id}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');

//Playlist
Route::get('/playlist', [PlaylistController::class, 'index']);
Route::get('/playlist/create', [PlaylistController::class, 'create'])->name('playlist.create');
Route::post('/playlist', [PlaylistController::class, 'store'])->name('playlist.store');
Route::get('/playlist/edit/{id}', [PlaylistController::class, 'edit'])->name('playlist.edit');
Route::put('/playlist/update/{id}', [PlaylistController::class, 'update'])->name('playlist.update');
Route::get('/playlist/destroy/{id}', [PlaylistController::class, 'destroy'])->name('playlist.destroy');

//Materi
Route::get('/materi', [MateriController::class, 'index']);
Route::get('/materi/create', [MateriController::class, 'create'])->name('materi.create');
Route::post('/materi', [MateriController::class, 'store'])->name('materi.store');
Route::get('/materi/edit/{id}', [MateriController::class, 'edit'])->name('materi.edit');
Route::put('/materi/update/{id}', [MateriController::class, 'update'])->name('materi.update');
Route::get('/materi/destroy/{id}', [MateriController::class, 'destroy'])->name('materi.destroy');