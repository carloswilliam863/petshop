<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-purple-800">
            {{ __('Produtos') }}
        </h2>
    </x-slot>

    <div class="py-12">
<<<<<<< HEAD
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-pink-500">
=======
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
>>>>>>> 2fe7042aa57d6d89d9e61c580c76690aa88acb29
                <div class="p-6 text-gray-900">

                    <div class="container">
                        <!-- Botão de Adicionar Produto no topo -->
                        <div class="mb-4">

<<<<<<< HEAD
                            <a href="{{ route('products.create') }}" class="px-6 py-3 bg-purple-900 text-white text-lg font-semibold rounded-lg hover:bg-purple-700 transition duration-300">
=======
                            <a href="{{ route('products.create') }}" class="px-6 py-3 text-lg font-semibold text-white transition duration-300 bg-purple-900 rounded-lg hover:bg-purple-700">

>>>>>>> 2fe7042aa57d6d89d9e61c580c76690aa88acb29

                                Adicionar Novo Produto
                            </a>
                        </div>

                        <!-- Conteúdo: Listagem de Produtos -->
                        <div class="mt-4 row">
                            @foreach($products as $product)
<<<<<<< HEAD
                                <div class="col-md-12 mb-4">

                                             <div class="card h-100 shadow-lg flex flex-row items-center p-4 rounded-lg" style="background-color: #6b46c1 !important;">
=======
                                <div class="mb-4 col-md-12">

                                             <div class="flex flex-row items-center p-4 rounded-lg shadow-lg card h-100" style="background-color: #6b46c1 !important;">
>>>>>>> 2fe7042aa57d6d89d9e61c580c76690aa88acb29

                                        
                                        <!-- Imagem do Produto -->
                                        <div class="flex-shrink-0" style="width: 80px; height: 80px;">

<<<<<<< HEAD
                                            <img src="{{ $product->imagem }}" alt="Imagem de {{ $product->nome }}" class="w-full h-full object-contain">
=======
                                            <img src="{{ $product->imagem }}" alt="Imagem de {{ $product->nome }}" class="object-contain w-full h-full">
>>>>>>> 2fe7042aa57d6d89d9e61c580c76690aa88acb29
                                        </div>

                                        <!-- Conteúdo do Produto -->
                                        <div class="text-white flex-grow-1">
                                            <h5 class="mb-1 text-lg font-semibold card-title">{{ $product->nome }}</h5>
                                            <p class="mb-1 card-text">Categoria: {{ $product->categoria }}</p>
                                            <p class="card-text">Marca: {{ $product->marca }}</p>
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
