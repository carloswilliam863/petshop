<?php

namespace App\Livewire\Venda;

use App\Models\Cliente;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Create extends Component
{


    public Collection $clientes;
    public Collection $produtos;


    public function mount()
    {
        $this->clientes = Cliente::all();
        $this->produtos = Product::all();
    }    
    
    public function render()
    {
        return view('livewire.venda.create');
    }
}
