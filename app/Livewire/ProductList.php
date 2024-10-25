<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product; 

class ProductList extends Component
{
    public $products;

    public function mount()
    {
        // Carregar os produtos ao iniciar o componente
        $this->products = Product::all();
        
    }

    public function render()
    {
        return view('livewire.product-list');
    }
}






