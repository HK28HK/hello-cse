<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StarsFrontController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [StarsFrontController::class, 'index']);

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('stars', AdminController::class);
    });
