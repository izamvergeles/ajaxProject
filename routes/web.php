<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\ProductController::class, 'index'])->name('index');
Route::post('fetchData', [App\Http\Controllers\ProductController::class, 'fetchData'])->name('fetchData');
// Route::post('fetchDataP', [App\Http\Controllers\ProductController::class, 'fetchData'])->name('fetchData');

Route::resource('product', App\Http\Controllers\ProductController::class);

