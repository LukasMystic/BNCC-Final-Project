<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ToyController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

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

// Routes managed by AppController
Route::controller(AppController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', 'login')->name('login');
        Route::get('register', 'register')->name('register');
        Route::post('login', 'userLogin')->name('user.login');
        Route::post('register', 'userRegister')->name('user.register');
    });

    Route::middleware('auth')->group(function () {
        Route::post('logout', 'logout')->name('logout');

        Route::middleware('admin')->group(function () {
            Route::get('admin', 'filter')->name('admin.home');
            Route::get('admin/filter/{category}', 'filter')->name('admin.filter');
            Route::get('admin/toys/search', [ToyController::class, 'adminSearch'])->name('admin.toys.search');
        });
    });

    Route::get('/', 'index')->name('home');
    Route::get('search', 'search')->name('home.search');
    Route::get('menu', 'menu')->name('menu');
    Route::get('about', 'about')->name('about');
    Route::get('/menu/filter/{category}', 'menuFilter')->name('menu.filter');
});

// toys routes with prefix
Route::prefix('toys')->controller(ToyController::class)->group(function () {
    Route::get('create', 'create')->name('toys.create');
    Route::post('store', 'store')->name('toys.store');
    Route::get('edit/{toys}', 'edit')->name('toys.edit');
    Route::post('update/{toys}', 'update')->name('toys.update');
    Route::delete('delete/{toys}', 'delete')->name('toys.delete');
    Route::get('detail/{toys}', 'detail')->name('toys.detail');
    Route::get('order/{toys}', 'order')->name('toys.order');
    Route::delete('order/delete/{id}', 'deleteOrder')->name('toys.order.delete');
});

// Invoice routes for authenticated users
Route::controller(InvoiceController::class)->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('invoice', 'index')->name('invoice');
    });
});

Route::patch('/toys/order/update/{id}', [ToyController::class, 'updateOrder'])->name('toys.order.update');

Route::controller(CheckoutController::class)->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('checkout', 'index')->name('checkout.index');
        Route::post('checkout', 'store')->name('checkout.store');
        
    });
});

// Cart routes
Route::controller(CartController::class)->group(function () {
    Route::get('/cart/buy-now/{toys}', 'buyNow')->name('cart.buyNow');
    Route::get('/cart/restore', 'restore')->name('cart.restore');
    
});
