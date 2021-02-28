<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\ProductQuantityHistoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth:sanctum'])->prefix('users')->group(function () {
    Route::get('/show-logged-user-data', [UserController::class, 'showLoggedUserData'])->name('users.showLoggedUserData');
    Route::post('/register', [UserController::class, 'store'])->name('users.store');
    Route::post('/update', [UserController::class, 'update'])->name('users.update');
    Route::get('/account-confirmation/{token}', 'UserController@accountConfirmation');
});

Route::middleware(['auth:sanctum'])->resource('products', ProductController::class);

Route::middleware(['auth:sanctum'])->prefix('users')->group(function () {
    Route::get('/', [ProductQuantityHistoryController::class, 'index'])->name('product-quantity-history.index');
    Route::get('/get-by-product-id/{product_id}', [ProductQuantityHistoryController::class, 'getByProductId'])->name('product-quantity-history.get-by-product-id');
});



