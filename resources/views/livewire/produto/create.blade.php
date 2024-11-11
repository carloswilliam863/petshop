<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-800 leading-tight">
            {{ __('Criar Produtos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1 class="text-2xl font-semibold text-purple-800 mb-6">Criar Novo Produto</h1>
    
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                            @csrf
                            <div class="form-group">
                                <label for="nome" class="block text-lg text-gray-700">Nome</label>
                                <input type="text" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600" name="nome" id="nome" required>
                            </div>

                            <div class="form-group">
                                <label for="categoria" class="block text-lg text-gray-700">Categoria</label>
                                <input type="text" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600" name="categoria" id="categoria" required>
                            </div>

                            <div class="form-group">
                                <label for="preco" class="block text-lg text-gray-700">Preço</label>
                                <input type="number" step="0.01" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600" name="preco" id="preco" required>
                            </div>

                            <div class="form-group">
                                <label for="quantidadeEmEstoque" class="block text-lg text-gray-700">Quantidade em Estoque</label>
                                <input type="number" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600" name="quantidadeEmEstoque" id="quantidadeEmEstoque" required>
                            </div>

                            <div class="form-group">
                                <label for="marca" class="block text-lg text-gray-700">Marca</label>
                                <input type="text" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600" name="marca" id="marca" required>
                            </div>

                            <div class="form-group">
                                <label for="imagem" class="block text-lg text-gray-700">Imagem</label>
                                <input type="file" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600" name="imagem" id="imagem" accept="image/*">
                            </div>

                            <div class="text-center">
                                <button type="submit" class="px-6 py-3 bg-purple-600 text-white text-lg font-semibold rounded-lg hover:bg-purple-700 transition duration-300">
                                    Criar Produto
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
