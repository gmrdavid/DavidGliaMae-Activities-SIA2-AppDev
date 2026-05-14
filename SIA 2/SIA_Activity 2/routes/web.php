<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ItemController;

Route::get('/filstreetfoods', [ItemController::class, 'index']);
Route::get('/filstreetfoods/{id}', [ItemController::class, 'show']);