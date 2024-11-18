<div>    
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-purple-800">
            {{ __('Produtos') }}
        </h2>   
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="container">
                        <!-- Botão de Adicionar Produto no topo -->
                        <div class="mb-4">

                            <a href="{{ route('products.create') }}" class="px-6 py-3 text-lg font-semibold text-white transition duration-300 bg-purple-900 rounded-lg hover:bg-purple-700">


                                Adicionar Novo Produto
                            </a>
                        </div>

                        <!-- Conteúdo: Listagem de Produtos -->
                        <div class="mt-4 row">
                            @foreach($products as $product)
                                <div class="mb-4 col-md-12">

                                             <div class="flex flex-row items-center p-4 rounded-lg shadow-lg card h-100" style="background-color: #6b46c1 !important;">

                                        
                                        <!-- Imagem do Produto -->
                                        <div class="flex-shrink-0" style="width: 80px; height: 80px;">

                                            <img src="{{ $product->imagem }}" alt="Imagem de {{ $product->nome }}" class="object-contain w-full h-full">
                                        </div>

                                        <!-- Conteúdo do Produto -->
                                        <div class="text-white flex-grow-1">
                                            <h5 class="mb-1 text-lg font-semibold card-title">{{ $product->nome }}</h5>
                                            <p class="mb-1 card-text">Categoria: {{ $product->categoria }}</p>
                                            <p class="card-text">Marca: {{ $product->marca }}</p>
                                            <p class="card-text">Preço: R$ {{ number_format($product->preco, 2, ',', '.') }}</p>
                                        </div>

                                        <!-- Quantidade em Estoque ao final do card -->
                                        <div class="text-2xl font-semibold text-right text-white ms-auto">
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
