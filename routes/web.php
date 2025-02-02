<?php

use Illuminate\Support\Facades\Route;

use App\Models\Product;
use App\Models\User;
use App\Model\Cart;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;


Route::get('/' , function(){
    return view ('home');
})->name('home');




// User login page route - when user click login text it will redirect to the login page
Route::get('/login', [AuthController::class, 'showLoginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);


// Admin Login Route
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AdminLoginController::class, 'create'])->name('admin.login');
    Route::post('/admin/login', [AdminLoginController::class, 'store']);
});

// Admin Dashboard Route
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// Admin pages returns to View
Route::get('/product/addProducts', [ProductController::class, 'create'])->name('product.addProducts');

Route::get('/product/manageProducts', [ProductController::class, 'index'])->name('product.manageProducts');

// Route to show the edit form page
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');

// Update the product
Route::put('/products/{product}', [ProductController::class, 'update'])->name('product.update');



// save the product
Route::post('/product/addProducts', [ProductController::class, 'store'])->name('product.store');


// Admin Logout Route
Route::post('/admin/logout', [AdminLoginController::class, 'destroy'])->name('admin.logout');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

