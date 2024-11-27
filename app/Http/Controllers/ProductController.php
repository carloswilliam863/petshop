<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Listar todos os produtos
    public function index()
    {
        $produtos = Product::all();

        return ProductResource::collection($produtos);
    }

    public function store(Request $request)
{
    $request->validate([
        'nome' => 'required|string|max:255',
        'categoria' => 'required|string|max:255',
        'preco' => 'required|numeric',
        'quantidadeEmEstoque' => 'required|integer',
        'marca' => 'required|string|max:255',
        'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validação da imagem
    ]);

    $data = $request->only(['nome', 'categoria', 'preco', 'quantidadeEmEstoque', 'marca']);


    if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            // Faz o upload do arquivo para o S3
            $path = Storage::disk('s3')->put('images', $request->file('imagem'));

            // Obtenha a URL do arquivo no S3
            $url = Storage::disk('s3')->url($path);


             $data['imagem'] = $url;
         
    }
    

    // Criar o produto no banco de dados
    $product = Product::create($data);
 
    return redirect()->route('produtos')->with('success', 'Produto criado com sucesso!');
    
}

    



    // Mostrar um produto específico
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    // Atualizar um produto existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'nullable|string|max:255',
            'categoria' => 'nullable|string|max:255',
            'preco' => 'nullable|numeric',
            'quantidadeEmEstoque' => 'nullable|integer',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'marca' => 'nullable|string|max:255',
        ]);

        $product = Product::findOrFail($id);
        $data = $request->all();

        // Salvar a imagem, se existir
        if ($request->hasFile('imagem')) {
            // Apagar a imagem antiga, se existir
            if ($product->imagem) {
                Storage::disk('public')->delete($product->imagem);
            }

            $imagePath = $request->file('imagem')->store('imagens_produtos', 'public');
            $data['imagem'] = $imagePath;
        }

        $product->update($data);

        return response()->json($product, 200);
    }


    // Deletar um produto
    public function destroy($id)
{
    Product::destroy($id);
    return response()->json(['message' => 'Produto deletado com sucesso'], 200);
}

    // Atualizar o preço de um produto
    public function atualizarPreco(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->preco = $request->input('novoPreco');
        $product->save();
        return new ProductResource($product); 
    }

    

    // Contar produtos da marca
    public function countByMarca()
    {
        $gatitosCount = Product::where('marca', 'Gatito')->count();
        $cachorritosCount = Product::where('marca', 'Cachorrito')->count();

        return response()->json([
            'gatitos' => $gatitosCount,
            'cachorritos' => $cachorritosCount,
        ]);
    }

    // Contar produtos por categoria
    public function countByCategory()
    {
        $categoriesCount = Product::select('categoria')
            ->selectRaw('count(*) as total')
            ->groupBy('categoria')
            ->get();

        return response()->json($categoriesCount);
    }


    public function topQuantities()
{
    // Buscar os 3 produtos com maior quantidade em estoque
    $produtos = Product::orderBy('quantidadeEmEstoque', 'desc')
        ->take(3) // Limitar a 3 produtos
        ->pluck('nome'); // Pegar apenas os nomes dos produtos

    // Retornar a resposta em formato JSON
    return response()->json(['produtos' => $produtos]);
}

}

    


