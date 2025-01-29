<?php

use App\Http\Controllers\Detail_TransaksiController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('member', MemberController::class)->middleware('auth');
    Route::resource('outlet', OutletController::class)->middleware('auth');
    Route::resource('paket', PaketController::class)->middleware('auth');
    Route::resource('transaksi', TransaksiController::class)->middleware('auth');
    Route::resource('detail_transaksi', Detail_TransaksiController::class)->middleware('auth');
});

require __DIR__.'/auth.php';
