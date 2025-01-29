<?php

use App\Http\Controllers\OutletController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('outlet', [OutletController::class, 'index'])->name('outlet.index');
Route::post('outletAdd', [outletcontroller::class, 'store'])->name('outlet.store');
Route::patch('outletUpdate/{id}', [outletcontroller::class, 'update'])->name('outlet.update');
Route::delete('outletDelete/{id}', [outletcontroller::class, 'destroy'])->name('outlet.destroy');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
