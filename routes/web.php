<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('products', ProductController::class);
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products', [ProductController::class, 'create'])->name('products.create');
    Route::get('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');
});
Route::middleware('auth')->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('sales', SaleController::class);
    Route::get('/sales', [SaleController::class, 'update'])->name('sales.update');
    Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('products/{product}', 'ProductController@show')->name('products.show');
    Route::get('/products/{product}', [ProductController::class, 'show']);
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
});

require __DIR__.'/auth.php';
