<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Inventaris', function () {
    return view('inventaris.index');
})->name('index');

Route::get('/tabel', [ProductController::class, 'index']);
Route::get('/create', [ProductController::class, 'create']);
Route::post('/store', [ProductController::class, 'store']);
Route::get('/destroy/{id}', [ProductController::class, 'destroy']);
