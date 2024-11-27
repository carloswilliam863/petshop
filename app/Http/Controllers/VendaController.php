<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\Cliente;
use App\Models\Product; 
use App\Http\Resources\VendaResource;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function store(Request $request)
{
    // Validação básica dos dados recebidos
    $request->validate([
        'cliente_id' => 'required|exists:clientes,id',
        'products' => 'required|array',
        'products.*.produto_id' => 'required|exists:products,id',
        'products.*.quantidade' => 'required|integer|min:1',
    ]);

    // Cria a venda
    $venda = Venda::create([
        'cliente_id' => $request->cliente_id,
        'total_vendido' => 0,  
    ]);

    $totalVendido = 0;

    // Adiciona os produtos à venda e atualiza o estoque
    foreach ($request->products as $produto) {
        $produtoData = Product::find($produto['produto_id']);
        $precoUnitario = $produtoData->preco; 

        // Atualiza a quantidade em estoque
        if ($produtoData->quantidadeEmEstoque >= $produto['quantidade']) {
            $produtoData->quantidadeEmEstoque -= $produto['quantidade'];
            $produtoData->save(); 

            // Adiciona o produto à venda
            $venda->products()->attach($produto['produto_id'], [
                'quantidade' => $produto['quantidade'],
                'preco_unitario' => $precoUnitario,
            ]);

            // Calcula o total vendido
            $totalVendido += $produto['quantidade'] * $precoUnitario;
        } else {
            return response()->json(['message' => 'Estoque insuficiente para o produto ' . $produtoData->nome], 400);
        }
    }

    // Atualiza o total vendido
    $venda->update(['total_vendido' => $totalVendido]);

    //return new VendaResource($venda->load('cliente', 'products'));
    return redirect()->route('produtos')->with('success', 'Venda realizada com sucesso!');

}

    // Exibir uma venda específica
    public function show($id)
    {
        $venda = Venda::with('cliente', 'products')->findOrFail($id);
        return new VendaResource($venda);
    }


 public function create()
    {
        $clientes = Cliente::all();
        $produtos = Product::all();

        return view('vendas.create', compact('clientes', 'produtos'));
    }

    // Deletar uma venda
    public function destroy($id)
{
    Venda::destroy($id);
    return response()->json(['message' => 'Produto deletado com sucesso'], 200);
}


}


