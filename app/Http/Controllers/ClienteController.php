<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Listar todos os clientes
    public function index()
    {
        return Cliente::all();
    }

    // Registrar um novo cliente
    public function store(Request $request)
    {

        
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email',
            'telefone' => 'required|string|max:15',
            'bairro' => 'string|nullable',
            'estado_civil' => 'string|nullable',
            'genero' => 'string|nullable',
            'pets' => 'integer|min:0|nullable'
        ]);

        $cliente = Cliente::create($request->all());
       

        return redirect()->route('clientes')->with('success', 'Cliente criado com sucesso!');
    }

    // Mostrar um cliente específico
    public function show($id)
    {
        return Cliente::findOrFail($id);
    }

    // Atualizar um cliente existente
    public function update(Request $request, $id)
    {

        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email',
            'telefone' => 'required|string|max:15',
            'bairro' => 'string|nullable',
            'estado_civil' => 'string|nullable',
            'genero' => 'string|nullable',
            'pets' => 'integer|min:0|nullable'
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return response()->json($cliente, 200);
    }

    // Deletar um cliente
    public function destroy($id)
    {
        Cliente::destroy($id);
        return response()->json(null, 204);
    }

    
}
