<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-800 leading-tight">
            {{ __('Vendas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('vendas.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Seleção do Cliente -->
                        <div class="form-group">
                            <label for="cliente" class="block text-lg text-gray-700">Cliente</label>
                            <select name="cliente_id" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600">
                                <option value="">Selecione um cliente</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Produtos -->
                        <div id="products-container" class="space-y-4">
                            <div class="product-entry">
                                <label for="produto" class="block text-lg text-gray-700">Produto</label>
                                <select name="products[0][produto_id]" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600">
                                    <option value="">Selecione um produto</option>
                                    @foreach($produtos as $produto)
                                        <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                                    @endforeach
                                </select>

                                <label for="quantidade" class="block text-lg text-gray-700 mt-4">Quantidade</label>
                                <input type="number" name="products[0][quantidade]" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600" min="1">

                                <!-- Ícone de Remover Produto -->
                                <button type="button" class="btn btn-danger btn-sm text-white bg-red-500 hover:bg-red-600 rounded-lg mt-4" onclick="removeProduct(this)">
                                    Remover
                                </button>
                            </div>
                        </div>

                        <!-- Botão para Adicionar Mais Produtos -->
                        <button type="button" class="px-6 py-3 bg-purple-600 text-white text-lg font-semibold rounded-lg hover:bg-purple-700 transition duration-300" onclick="addProduct()">
                            Adicionar Produto
                        </button>

                        <!-- Botão Confirmar -->
                        <div class="text-center mt-6">
                            <button type="submit" class="px-6 py-3 bg-purple-900 text-white text-lg font-semibold rounded-lg hover:bg-green-700 transition duration-300">
                                Confirmar Venda
                            </button>
                        </div>
                    </form>

                    <script>
                        let productIndex = 1;

                        function addProduct() {
                            const container = document.getElementById('products-container');
                            const productEntry = document.createElement('div');
                            productEntry.classList.add('product-entry', 'space-y-4');
                            productEntry.innerHTML = `
                                <label for="produto" class="block text-lg text-gray-700">Produto</label>
                                <select name="products[${productIndex}][produto_id]" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600">
                                    <option value="">Selecione um produto</option>
                                    @foreach($produtos as $produto)
                                        <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                                    @endforeach
                                </select>

                                <label for="quantidade" class="block text-lg text-gray-700 mt-4">Quantidade</label>
                                <input type="number" name="products[${productIndex}][quantidade]" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600" min="1">

                                <!-- Ícone de Remover Produto -->
                                <button type="button" class="btn btn-danger btn-sm text-white bg-red-500 hover:bg-red-600 rounded-lg mt-4" onclick="removeProduct(this)">
                                    Remover
                                </button>
                            `;
                            container.appendChild(productEntry);
                            productIndex++;
                        }

                        function removeProduct(button) {
                            // Remove o elemento do produto
                            button.parentElement.remove();
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
