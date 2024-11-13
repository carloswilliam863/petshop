<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-800 leading-tight">
            {{ __('Produtos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="container">
                        <!-- Botão de Adicionar Produto no topo -->
                        <div class="mb-4">
<<<<<<< HEAD
                            <a href="{{ route('products.create') }}" class="px-6 py-3 bg-purple-900 text-white text-lg font-semibold rounded-lg hover:bg-purple-700 transition duration-300">
=======
                            <a href="{{ route('products.create') }}" class="px-6 py-3 bg-purple-600 text-white text-lg font-semibold rounded-lg hover:bg-purple-700 transition duration-300">
>>>>>>> 3cff1ebb66d103ec980f4f636cc22d5338b2061d
                                Adicionar Novo Produto
                            </a>
                        </div>

                        <!-- Conteúdo: Listagem de Produtos -->
                        <div class="row mt-4">
                            @foreach($products as $product)
                                <div class="col-md-12 mb-4">
<<<<<<< HEAD
                                             <div class="card h-100 shadow-lg flex flex-row items-center p-4 rounded-lg" style="background-color: #6b46c1 !important;">

                                        
                                        <!-- Imagem do Produto -->
                                        <div class="flex-shrink-0" style="width: 80px; height: 80px;">
=======
                                    <div class="card h-100 shadow-lg flex flex-row items-center p-4 rounded-lg bg-gradient-to-r from-purple-700 via-purple-600 to-purple-500">
                                        
                                        <!-- Imagem do Produto -->
                                        <div class="flex-shrink-0" style="width: 80px; height: 80px; background-color: #f3f3f3;">
>>>>>>> 3cff1ebb66d103ec980f4f636cc22d5338b2061d
                                            <img src="{{ $product->imagem }}" alt="Imagem de {{ $product->nome }}" class="w-full h-full object-contain">
                                        </div>

                                        <!-- Conteúdo do Produto -->
                                        <div class="flex-grow-1 text-white">
                                            <h5 class="card-title text-lg font-semibold mb-1">{{ $product->nome }}</h5>
                                            <p class="card-text mb-1">Categoria: {{ $product->categoria }}</p>
                                            <p class="card-text">Marca: {{ $product->marca }}</p>
                                        </div>

                                        <!-- Quantidade em Estoque ao final do card -->
                                        <div class="ms-auto text-white font-semibold text-2xl text-right">
                                            <span>{{ $product->quantidadeEmEstoque }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
