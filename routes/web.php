<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Inventaris', function () {
    return view('inventaris.index');
})->name('index');

Route::get('/tabel', function () {
    return view('inventaris.tabel.index');
})->name('tabel');

Route::get('/tambah', function () {
    return view('inventaris.tambah');
})->name('tambah');