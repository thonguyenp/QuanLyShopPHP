<?php

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
