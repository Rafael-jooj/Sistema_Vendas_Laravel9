<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\SellersController;
use \App\Http\Controllers\SalesController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\ClientController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/seller', [SellersController::class, 'index']);
Route::get('/create-sale', [SalesController::class, 'create']);
Route::post('/create-sale', [SalesController::class, 'store']);

Route::get('/create-product', [ProductController::class, 'create']);
Route::post('/create-product', [ProductController::class, 'store']);

Route::get('/create-client', [ClientController::class, 'create']);
Route::post('/create-client', [ClientController::class, 'store']);