<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cliente;

class ClientList extends Component
{
    public $clientes;

    public function mount()
    {
        $this->loadClientes();
    }

    public function loadClientes()
    {
        $this->clientes = Cliente::all();
    }

    public function deleteCliente($id)
    {
        Cliente::find($id)->delete();
        $this->loadClientes(); // Recarregar a lista após a exclusão
    }

    public function render()
    {
        return view('livewire.client-list');
    }
}
