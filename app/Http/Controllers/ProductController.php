<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProductController extends Controller
{
    // Listar todos os produtos
    public function indexi()
    {


        // Obtém todos os produtos do banco de dados
        $produtos = Product::all();

        // Retorna os produtos usando o ProductResource para formatá-los
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

    $data = $request->all();

    // Verificar se há uma imagem no request
    if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            // Criar uma instância do Cloudinary

            $uploadedFileUrl = $cloudinary->upload($request->file('imagem')->getRealPath())->getSecureUrl();
            // Adicionar a URL da imagem ao array de dados do produto
            $data['imagem'] = $uploadedFileUrl;
       
    }

    // Criar o produto no banco de dados
    $product = Product::create($data);

    // Redirecionar para a página de listagem ou exibir mensagem de sucesso
    return redirect()->route('products.index')->with('success', 'Produto criado com sucesso!');
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
            'nome' => 'string|max:255',
            'categoria' => 'string|max:255',
            'preco' => 'numeric',
            'quantidadeEmEstoque' => 'integer',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
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
        return response()->json(null, 204);
    }

    // Atualizar o preço de um produto
    public function atualizarPreco(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->preco = $request->input('novoPreco');
        $product->save();
        return new ProductResource($product); 
    }

    public function index()
        {
            $products = Product::all(); // Substitua 'Product' pelo seu modelo de produto
            return view('livewire.product-list', compact('products'));
        }

        public function create()
    {
        return view('products.create'); // Certifique-se de que a view 'products.create' existe
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

    


