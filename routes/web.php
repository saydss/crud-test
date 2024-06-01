<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

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

Route::get('/', [BarangController::class, 'index'])->name('home');

Route::get('/barangs', [BarangController::class, 'index'])->name('barangs.index');
Route::get('/barangs/tambah', [BarangController::class, 'create'])->name('barangs.tambah');
Route::post('/barangs', [BarangController::class, 'store'])->name('barangs.store');
Route::get('/barangs/{barang}', [BarangController::class, 'show'])->name('barangs.show');
Route::get('/barangs/{barang}/edit', [BarangController::class, 'edit'])->name('barangs.edit');
Route::post('/barangs/{barang}', [BarangController::class, 'update'])->name('barangs.update');

Route::delete('barangs/{id}/delete', [BarangController::class, 'destroy'])->name('barangs.destroy');