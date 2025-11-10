<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Clients\AccountController;
use App\Http\Controllers\Clients\AuthController;
use App\Http\Controllers\Clients\ForgotPasswordController;
use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\Clients\ProductController;
use App\Http\Controllers\Clients\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
->name('home');

Route::get('/404', function () {
    return view('clients.pages.404');
});

Route::get('/about', function () {
    return view('clients.pages.about');
})->name('about');

Route::get('/contact', function () {
    return view('clients.pages.contact');
})->name('contact');

Route::middleware('guest')->group(function(){
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('post-register');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('post-login');
    Route::get('/forget-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forget-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');

    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.update');

});

Route::get('/activate/{token}', [AuthController::class, 'activate'])->name('activate');

Route::middleware(['auth.custom'])->group(function(){
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::prefix('account')->group(function(){
        Route::get('/', [AccountController::class, 'index'])->name('account');
        Route::put('/', [AccountController::class, 'update'])->name('account.update');
        Route::post('/change-pasword', [AccountController::class, 'changePassword'])->name('account.change-pasword');
        // 2 nút hành động phần address
        Route::post('/addresses', [AccountController::class, 'addAddress'])->name('account.address.add');
        Route::put('/addresses/{id}', [AccountController::class, 'updatePrimaryAddress'])->name('account.address.update');
        Route::delete('/addresses/{id}', [AccountController::class, 'deleteAddress'])->name('account.address.delete');
    });

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::get('/checkout/get-address', [CheckoutController::class, 'getAddress'])->name('checkout.get-addres');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/filter', [ProductController::class, 'filter'])->name('products.filter');

// Detailed product
Route::get('/products/{slug}', [ProductController::class, 'detail'])->name('products.detail');

// Handle Cart
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'removeFromMiniCart'])->name('cart.remove');
Route::get('/mini-cart', [CartController::class, 'loadMiniCart'])->name('cart.mini');

// Handle Page Cart
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.index');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove-cart', [CartController::class, 'removeCartItem'])->name('cart.remove');

