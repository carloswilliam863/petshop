<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Product;
use Livewire\Component;


class Vendas extends Component
{
    public $clientes;
    public $produtos;
    public $productList = [];

    public function mount()
    {
        $this->clientes = Cliente::all();
        $this->produtos = Produto::all();
        $this->productList[] = ['produto_id' => null, 'quantidade' => 1]; // Inicializa com um produto
    }

    public function addProduct()
    {
        $this->productList[] = ['produto_id' => null, 'quantidade' => 1];
    }

    public function removeProduct($index)
    {
        unset($this->productList[$index]);
        $this->productList = array_values($this->productList); // Reindexar
    }

    public function render()
    {
        return view('livewire.vendas');
    }
}
