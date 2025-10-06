<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', fn() => view('welcome'));
Route::resource('products', ProductController::class);
