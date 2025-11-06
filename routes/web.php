<?php

use App\Http\Controllers\Clients\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('clients.pages.home');
})->name('home');

Route::get('/404', function () {
    return view('clients.pages.404');
});

Route::get('/about', function () {
    return view('clients.pages.about');
})->name('about');

Route::get('/contact', function () {
    return view('clients.pages.contact');
})->name('contact');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('post-register');

Route::get('/activate/{token}', [AuthController::class, 'activate'])->name('activate');
