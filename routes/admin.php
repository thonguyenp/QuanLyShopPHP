<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    Route::middleware(['check.auth.admin'])->group(function() {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.showLoginForm');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
    });

    Route::middleware(['auth.custom'])->group(function() {
        Route::get('/dashboard', function() {
            return view('admin.pages.dashboard');
        })->name('admin.dashboard');
    });

    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::middleware(['permission:manage_users'])->group(function() {
        Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::post('/user/upgrade', [UserController::class, 'upgrade']);
        Route::post('/user/updateStatus', [UserController::class, 'updateStatus']);
    });
    Route::middleware(['permission:manage_categories'])->group(function() {
        Route::get('/categories/add', [CategoryController::class, 'showFormAddCategories'])->name('admin.category.addForm');
        Route::post('/categories/add', [CategoryController::class, 'addCategory'])->name('admin.category.add');
        Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
        Route::post('/categories/update', [CategoryController::class, 'updateCategory']);
        Route::post('categories/delete', [CategoryController::class, 'deleteCategory'])->name('admin.category.delete');
    });
    Route::middleware(['permission:manage_products'])->group(function() {
        Route::get('/product/add', [ProductController::class, 'showFormAddProducts'])->name('admin.product.addForm');
        Route::post('/product/add', [ProductController::class, 'addCategory'])->name('admin.product.add');
        Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
        Route::post('/products/update', [ProductController::class, 'updateCategory']);
        Route::post('products/delete', [ProductController::class, 'deleteCategory'])->name('admin.products.delete');
    });
});

?>