<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

Route::get('/orders', [CategoryOrder::class, 'index']);
Route::post('/orders', [CategoryOrder::class, 'store']);
Route::get('/orders/{id}', [CategoryOrder::class, 'show']);
Route::put('/orders/{id}', [CategoryOrder::class, 'update']);
Route::delete('/orders/{id}', [CategoryOrder::class, 'destroy']);

Route::get('/reviews', [CategoryReview::class, 'index']);
Route::post('/reviews', [CategoryReview::class, 'store']);
Route::get('/reviews/{id}', [CategoryReview::class, 'show']);
Route::put('/reviews/{id}', [CategoryReview::class, 'update']);
Route::delete('/reviews/{id}', [CategoryReview::class, 'destroy']);

Route::get('/users', [CategoryUser::class, 'index']);
Route::post('/users', [CategoryUser::class, 'store']);
Route::get('/users/{id}', [CategoryUser::class, 'show']);
Route::put('/users/{id}', [CategoryUser::class, 'update']);
Route::delete('/users/{id}', [CategoryUser::class, 'destroy']);