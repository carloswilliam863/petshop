<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Listar todos os clientes
    public function indexi()
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

        if ($request->wantsJson()) {
            // Retorna uma resposta em JSON se a solicitação é para API (ex: usando Insomnia)
            return response()->json(['message' => 'Cliente criado com sucesso!', 'cliente' => $cliente], 201);
        }
       

        return redirect()->route('clientes.index')->with('success', 'Cliente criado com sucesso!');
    }

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

    public function index()
    {
        $clientes = Cliente::all(); // Obtém todos os clientes
        return view('clientes.index', compact('clientes')); // Retorna a view com a lista de clientes
    }

    public function create()
{
    return view('clientes.create');
}


    
}
