<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::post('/register', [\App\Http\Controllers\AuthController::class, 'registerPost'])->name('register');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'loginPost'])->name('login');

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/catalog', [\App\Http\Controllers\CatalogController::class, 'index'])->name('catalog');
Route::get('/product/{product}/show', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show');

Route::middleware(\App\Http\Middleware\AuthCheck::class)->group(function () {

    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart');
    Route::get('/cart/{product}/add', [\App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
    Route::get('/cart/{cart}/delete', [\App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('/order/add', [\App\Http\Controllers\OrderController::class, 'store'])->name('order.store');
    Route::get('/order', [\App\Http\Controllers\OrderController::class, 'index'])->name('order.index');
    Route::get('/order/{order}/products', [\App\Http\Controllers\OrderController::class, 'productsIndex'])->name('order.products.index');

    Route::middleware(\App\Http\Middleware\AdminCheck::class)->group(function () {
        Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin');

        Route::post('/category', [\App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
        Route::post('/product', [\App\Http\Controllers\ProductController::class, 'store'])->name('product.store');

        Route::get('/product/{product}/delete', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy');
        Route::get('/category/{category}/delete', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.destroy');

        Route::get('/category/{category}/edit', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
        Route::get('/product/{product}/edit', [\App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');

        Route::patch('/category/{category}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
        Route::patch('/product/{product}', [\App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
    });
});




