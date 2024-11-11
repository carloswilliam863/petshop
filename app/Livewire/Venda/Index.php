<?php

namespace App\Livewire\Venda;

use App\Models\Cliente;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Index extends Component
{

    public Collection $clientes;
    public Collection $products;


    public function mount()
    {
        $this->clientes = Cliente::all();
        $this->produtos = Product::all();
    }
    public function render()
    {
        return view('livewire.venda.index');
    }
}
