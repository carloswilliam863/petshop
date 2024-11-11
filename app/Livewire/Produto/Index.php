<?php

namespace App\Livewire\Produto;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Index extends Component
{

    public Collection $products;

    public function mount()
    {
        // Carregar os produtos ao iniciar o componente
        $this->products = Product::all();
        
    }
    public function render()
    {
        return view('livewire.produto.index');
    }
}
