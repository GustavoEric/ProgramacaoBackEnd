<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/products/type', [ProductController::class, 'findByType']); // Adiciona esta linha
Route::apiResource('products',ProductController::class)->except(
    [
        'create',
    ]
    );
Route::apiResource('orders',OrderController::class);
Route::post('/users/register', [UserController::class, 'store']);
Route::post('/users/login', [UserController::class, 'login']);