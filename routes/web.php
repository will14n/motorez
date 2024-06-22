<?php

use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StockController::class, 'index'])->name('stock.index');
Route::get('/stock/create', [StockController::class, 'create'])->name('stock.create');
Route::post('/stock', [StockController::class, 'store'])->name('stock.store');
Route::get('/stock/show', [StockController::class, 'show'])->name('stock.show');
Route::get('/stock/export', [StockController::class, 'export'])->name('stock.export');
