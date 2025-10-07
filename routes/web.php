<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
// Gunakan namespace yang konsisten untuk Controller Admin
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminOrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route Publik (bisa diakses siapa saja)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produk/{product}', [HomeController::class, 'show'])->name('product.show');

// Route yang hanya bisa diakses setelah login (umum untuk semua role)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Grup Route KHUSUS ADMIN
Route::middleware(['auth','role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard Admin
Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    // Manajemen Produk
    Route::resource('products', ProductController::class);

    // Manajemen Pesanan
    Route::resource('orders', AdminOrderController::class)->only(['index', 'update']);
});

// Grup Route KHUSUS CUSTOMER
Route::middleware(['auth','role:customer'])->group(function () {
    Route::get('/dashboard', [CustomerController::class, 'dashboard'])->name('dashboard'); // <-- Tambahkan ini
    Route::get('/checkout/{product}', [HomeController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [HomeController::class, 'placeOrder'])->name('checkout.place');
    Route::get('/my-orders', [HomeController::class, 'orderHistory'])->name('orders.history');
});

// Auth routes (login, register, dll)
require __DIR__.'/auth.php';
