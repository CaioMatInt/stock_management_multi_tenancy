<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\ProductQuantityHistoryController;
use \App\Http\Controllers\UserController;

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
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/show-logged-user-data', [UserController::class, 'showLoggedUserData'])->name('users.show-logged-user-data');
    Route::post('/register', [UserController::class, 'register'])->name('users.register');
    Route::patch('/update/{user_id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/account-confirmation/{token}', [UserController::class, 'accountConfirmation'])->name('users.account-confirmation');
});

Route::middleware(['auth:sanctum'])->prefix('products')->group(function () {
    Route::post('/bulk-store', [ProductController::class, 'bulkStore'])->name('product.bulk-store');
    Route::patch('/bulk-update', [ProductController::class, 'bulkUpdate'])->name('product.bulk-update');
});

Route::middleware(['auth:sanctum'])->resource('products', ProductController::class);



Route::middleware(['auth:sanctum'])->prefix('product-quantity-history')->group(function () {
    Route::get('', [ProductQuantityHistoryController::class, 'index'])->name('product-quantity-history.index');
    Route::get('/get-by-product-id/{product_id}', [ProductQuantityHistoryController::class, 'getByProductId'])->name('product-quantity-history.get-by-product-id');
});



