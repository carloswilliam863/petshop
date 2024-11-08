<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductEntryController;
use App\Http\Controllers\ProductExitController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\PedidoEntradaController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

// Rotas Públicas (Sem Autenticação)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/products/count-by-brand', [ProductController::class, 'countByMarca']);
Route::get('/products/count-by-category', [ProductController::class, 'countByCategory']);
Route::get('/products/top-quantities', [ProductController::class, 'topQuantities']);
Route::post('/upload', [ImageController::class, 'store']);




// Rotas Protegidas (Requer Autenticação via Sanctum)
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/validate-token', [AuthController::class, 'validateToken']);

    // Rotas para Usuários
    Route::get('/users', [AuthController::class, 'index']);
    Route::get('/users/{id}', [AuthController::class, 'show']);
    Route::put('/users/{id}', [AuthController::class, 'update']);
    Route::delete('/users/{id}', [AuthController::class, 'destroy']);

    // Rotas para Produtos
    Route::get('/products', [ProductController::class, 'indexi']);
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::match(['patch', 'put'], 'products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    Route::post('/products/{id}/update-price', [ProductController::class, 'atualizarPreco']);
   
    

    // Rotas para Clientes
    Route::get('/clients', [ClienteController::class, 'indexi']);
    Route::post('/clients', [ClienteController::class, 'store']);
    Route::get('/clients/{id}', [ClienteController::class, 'show']);
    Route::put('/clients/{id}', [ClienteController::class, 'update']);
    Route::delete('/clients/{id}', [ClienteController::class, 'destroy']);
   

    Route::post('/vendas', [VendaController::class, 'store']);
    Route::get('/vendas/{id}', [VendaController::class, 'show']);
    
    
    Route::get('/pedido-entradas', [PedidoEntradaController::class, 'index']);
    Route::post('/pedido-entradas', [PedidoEntradaController::class, 'store']);
    Route::get('/pedido-entradas/{id}', [PedidoEntradaController::class, 'show']);

});