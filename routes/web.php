<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController; // Importe o Controller

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

// Rota para a página inicial (cardápio)
Route::get('/', [ProductController::class, 'index'])->name('products.index');

// Rota para os detalhes de um produto (note que estamos passando o ID, mas o Laravel
// vai tentar resolver o modelo automaticamente se você passar um objeto Product real)
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');