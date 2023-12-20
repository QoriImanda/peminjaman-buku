<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\PinjamBukuController;
use App\Http\Controllers\MasterData\KategoriController;
use App\Http\Controllers\MasterData\ListBukuController;

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
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    ////Buku 
    Route::get('/buku/index', [BukuController::class, 'index'])->name('buku.index');
    /// Peminjaman
    Route::get('/peminjama/index', [PinjamBukuController::class, 'index'])->name('pinjamBuku.index');

    //// Master Data
    //kategori
    Route::get('/master-data/kategori/index', [KategoriController::class, 'index'])->name('kategori.index');
    Route::post('/master-data/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
    Route::post('/master-data/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::get('/master-data/kategori/delete/{id}', [KategoriController::class, 'delete'])->name('kategori.delete');

    //list buku
    Route::get('/master-data/list-buku/index', [ListBukuController::class, 'index'])->name('listBuku.index');
    Route::post('/master-data/list-buku/store', [ListBukuController::class, 'store'])->name('listBuku.store');
    Route::post('/master-data/list-buku/update/{id}', [ListBukuController::class, 'update'])->name('listBuku.update');
    Route::get('/master-data/list-buku/delete/{id}', [ListBukuController::class, 'delete'])->name('listBuku.delete');


    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
