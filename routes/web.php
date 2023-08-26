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

// Route::get('/create-sale', [SalesController::class, 'create']);
// Route::get('/list-sales', [SalesController::class, 'index']);
// Route::get('/list-sales/{id}', [SalesController::class, 'show']);
// Route::post('/create-sale', [SalesController::class, 'store']);

Route::resource('sales', SalesController::class);


Route::get('/create-product', [ProductController::class, 'create']);
Route::get('/list-products', [ProductController::class, 'index']);
Route::post('/create-product', [ProductController::class, 'store']);

Route::resource('products', ProductController::class);

Route::get('/create-client', [ClientController::class, 'create']);
Route::get('/list-clients', [ClientController::class, 'index']);
Route::post('/create-client', [ClientController::class, 'store']);

Route::resource('client', clientController::class);
