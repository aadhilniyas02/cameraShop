<?php

use Illuminate\Support\Facades\Route;

use App\Models\Product;
use App\Models\User;
use App\Model\Cart;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;

use App\Http\Resources\ProductResource;
use App\Http\Resources\CartResource;
use App\Http\Resources\UserResource;

use App\Http\Controllers\AuthController;


//Route::post('/login', [AuthController::class, 'login']);
//Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

//  Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('products', ProductController::class); // API resource route for products
    Route::apiResource('users', UserController::class)->only(['index', 'show']); // API resource route for users
    Route::apiResource('carts', CartController::class);// API resource route for carts
//  });










