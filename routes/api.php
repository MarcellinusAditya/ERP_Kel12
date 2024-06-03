<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductAPIController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/product', 'App\Http\Controllers\Api\ProductAPIController@index');
Route::get('/log', 'App\Http\Controllers\Api\ProductAPIController@indexlog');
Route::get('/product/{id}', 'App\Http\Controllers\Api\ProductAPIController@show');