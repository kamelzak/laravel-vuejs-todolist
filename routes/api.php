<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/items', 'App\Http\Controllers\ItemController@index');
Route::post('/items', 'App\Http\Controllers\ItemController@store');
Route::put('/items/{id}', 'App\Http\Controllers\ItemController@update');
Route::delete('/items/{id}', 'App\Http\Controllers\ItemController@destroy');

/*
Route::prefix('/item')->group(function() {
    Route::post('/store', 'App\Http\Controllers\ItemController@store');
    Route::put('/{id}', 'App\Http\Controllers\ItemController@update');
    Route::delete('/{id}', 'App\Http\Controllers\ItemController@destroy');
});
*/