<?php

use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('get-color', [CategoriesController::class, 'getColor']);
Route::get('eloquent-example', [CategoriesController::class, 'EloquentExample']);
