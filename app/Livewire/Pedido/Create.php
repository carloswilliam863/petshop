<?php

namespace App\Livewire\Pedido;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class Create extends Component
{


    public Collection $produtos;


    public function mount()
    {
        $this->produtos = Product::all();
    }    

    public function render()
    {
        return view('livewire.pedido.create');
    }
}
