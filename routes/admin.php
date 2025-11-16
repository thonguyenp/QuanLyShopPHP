<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ManufacturerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Models\Manufacturer;
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
        Route::post('/categories/delete', [CategoryController::class, 'deleteCategory'])->name('admin.category.delete');
    });
    Route::middleware(['permission:manage_manufacturers'])->group(function() {
        Route::get('/manufacturer/add', [ManufacturerController::class, 'showFormAddManufacturers'])->name('admin.manufacturer.addForm');
        Route::post('/manufacturer/add', [ManufacturerController::class, 'addManufacturers'])->name('admin.manufacturer.add');
        Route::get('/manufacturers', [ManufacturerController::class, 'index'])->name('admin.manufacturers.index');
        Route::post('/manufacturers/update', [ManufacturerController::class, 'updateManufacturer']);
        Route::post('/manufacturers/delete', [ManufacturerController::class, 'deleteManufacturer'])->name('admin.manufacturers.delete');

    });
    Route::middleware(['permission:manage_products'])->group(function() {
        Route::get('/product/add', [ProductController::class, 'showFormAddProducts'])->name('admin.product.addForm');
        Route::post('/product/add', [ProductController::class, 'addProduct'])->name('admin.product.add');
        Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
        Route::post('/products/update', [ProductController::class, 'updateProduct']);
        Route::post('/products/delete', [ProductController::class, 'deleteProduct'])->name('admin.products.delete');
    });
    Route::middleware(['permission:manage_orders'])->group(function() {
        Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
        Route::post('/orders/confirm', [OrderController::class, 'confirmOrder'])->name('admin.orders.confirm');
        Route::get('/order-detail/{id}', [OrderController::class, 'showOrderDetail'])->name('admin.order-detail');
        Route::post('/order-detail/send-invoice', [OrderController::class, 'sendMailInvoice']);
    });

});

?>