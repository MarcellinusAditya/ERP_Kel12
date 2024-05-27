<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [ProductController::class, 'indexHome'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
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

    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/myprofile', [UserController::class, 'myprofile'])->name('myprofile');
    Route::patch('/user/myprofile/{id}', [UserController::class, 'update']);
    Route::patch('/user/myprofile/password/{id}', [UserController::class, 'updatepassword']);

    Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');
    Route::get('/supplier/tambah', [SupplierController::class, 'create'])->name('supplier.create');
    Route::post('/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/supplier/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::put('/supplier/update/{id}', [SupplierController::class, 'update'])->name('supplier.update');
    Route::get('/supplier/hapus/{id}', [SupplierController::class, 'destroy']);
});

require __DIR__.'/auth.php';
