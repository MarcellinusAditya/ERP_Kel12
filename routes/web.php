<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LogsController;

Route::get('/', function () {
    return redirect('/Inventaris');
});

Route::get('/Inventaris', [ProductController::class, 'indexHome'])->name('index');

Route::get('/tabel', [ProductController::class, 'index']);
Route::get('/create', [ProductController::class, 'create']);
Route::post('/store', [ProductController::class, 'store']);
Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/destroy/{id}', [ProductController::class, 'destroy']);

Route::get('/logs', [LogsController::class, 'index'])->name('logs.index');
Route::get('/logs/create/{id}/{status}', [LogsController::class, 'create'])->name('logs.create');
Route::post('/logs/create/{id}', [LogsController::class, 'store'])->name('logs.store');