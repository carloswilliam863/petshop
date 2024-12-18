<?php

namespace App\Http\Controllers;

use App\Models\PedidoEntrada;
use App\Models\Product;  
use App\Http\Resources\PedidoEntradaResource;
use Illuminate\Http\Request;

class PedidoEntradaController extends Controller
{
    public function store(Request $request)
    {
        // Validação dos dados de entrada
        $request->validate([
            'produto_id' => 'required|exists:products,id',
            'marca' => 'required|string',
            'quantidade' => 'required|integer|min:1',
        ]);

        // Cria a entrada de produto
        $pedidoEntrada = PedidoEntrada::create($request->all());

        // Atualiza o estoque do produto
        $produto = Product::findOrFail($request->produto_id);
        $produto->quantidadeEmEstoque += $request->quantidade; 
        $produto->save();

        //return new PedidoEntradaResource($pedidoEntrada);

        return redirect()->route('produtos')->with('success', 'Venda realizada com sucesso!');
    }

    public function show($id)
    {
        $pedidoEntrada = PedidoEntrada::findOrFail($id);
        return new PedidoEntradaResource($pedidoEntrada);
    }

    public function index()
    {
        return PedidoEntradaResource::collection(PedidoEntrada::all());
    }

    // Deletar um Pedido
    public function destroy($id)
        {
            PedidoEntrada::destroy($id);
            return response()->json(['message' => 'Produto deletado com sucesso'], 200);
        }

}
