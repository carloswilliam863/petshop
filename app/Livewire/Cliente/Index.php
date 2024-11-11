<?php

namespace App\Livewire\Cliente;

use Livewire\Component;
use App\Models\Cliente;
use Illuminate\Database\Eloquent\Collection;

class Index extends Component
{

    
    public Collection $clientes;

    public function mount()
    {
        $this->clientes = Cliente::all();
    }
    public function render()
    {
        return view('livewire.cliente.index');
    }
}
