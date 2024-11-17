<?php

use App\Http\Controllers\ClienteController;

use App\Http\Controllers\PedidoEntradaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VendaController;
use Illuminate\Support\Facades\Route;




Route::view('/', 'welcome');

//caso nao de certo o WELCOME, tirar os comentarios, para aparecer diretro a page de login
/*Route::get('/', function () {
    return redirect('login');
});*/

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    /*Route::view('clientelist', 'clientelist')
    ->middleware(['auth', 'verified'])
    ->name('clientelist');*/



Route::get('/vendas/create', App\Livewire\Venda\Create::class)-> name('vendas.create');    

Route::post('vendas', [VendaController::class, 'store'])->name('vendas.store');

Route::get('pedidos/create', App\Livewire\Pedido\Create::class)->name('pedidos.create');

Route::post('pedidos', [PedidoEntradaController::class, 'store'])->name('pedidos.store');


Route::get('/produtos', App\Livewire\Produto\Index::class)-> name('produtos');

Route::get('/produtos/create', App\Livewire\Produto\Create::class)->name('products.create');

Route::post('/produtos', [ProductController::class, 'store'])->name('products.store');

Route::get('/clientes',  App\Livewire\Cliente\Index::class)-> name('clientes');

Route::get('/clientes/create', App\Livewire\Cliente\Create::class)->name('cliente.create');

Route::post('/clientes', [ClienteController::class, 'store'])->name('cliente.store');  

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';




