<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

/*
|--------------------------------------------------------------------------
| Rotas Públicas
|--------------------------------------------------------------------------
*/
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

/*
|--------------------------------------------------------------------------
| Autenticação (Apenas Visitantes)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

/*
|--------------------------------------------------------------------------
| Logout (Apenas Autenticados)
|--------------------------------------------------------------------------
*/
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

/*
|--------------------------------------------------------------------------
| Carrinho e Checkout (Apenas Autenticados)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/carrinho', [CartController::class, 'index'])->name('cart.index');
    Route::post('/carrinho/adicionar', [CartController::class, 'add'])->name('cart.add');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    Route::post('/cart/update/{productId}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');
});

/*
|--------------------------------------------------------------------------
| Área Administrativa (auth + is_admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', \App\Http\Middleware\IsAdmin::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/products', [ProductController::class, 'adminIndex'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});
