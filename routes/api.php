<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
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





// Rotas Protegidas (Requer Autenticação via Sanctum)
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/validate-token', [AuthController::class, 'validateToken']);

    // Rotas para Usuários
    Route::get('/users', [AuthController::class, 'index']);
    Route::delete('/users/{id}', [AuthController::class, 'destroy']);

    // Rotas para Produtos
    Route::get('/products', [ProductController::class, 'index']);
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::match(['patch', 'put'], 'products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    
   
    

    // Rotas para Clientes
    Route::get('/clientes', [ClienteController::class, 'index']);
    Route::post('/clientes', [ClienteController::class, 'store']);
    Route::get('/clientes/{id}', [ClienteController::class, 'show']);
    Route::match(['patch', 'put'], '/clientes/{id}' ,[ClienteController::class, 'update']);
    Route::delete('/clientes/{id}', [ClienteController::class, 'destroy']);
   

    Route::post('/vendas', [VendaController::class, 'store']);
    Route::get('/vendas/{id}', [VendaController::class, 'show']);
    Route::delete('/vendas/{id}', [VendaController::class, 'destroy']);
    
    
    Route::get('/pedido-entradas', [PedidoEntradaController::class, 'index']);
    Route::post('/pedido-entradas', [PedidoEntradaController::class, 'store']);
    Route::get('/pedido-entradas/{id}', [PedidoEntradaController::class, 'show']);


});




