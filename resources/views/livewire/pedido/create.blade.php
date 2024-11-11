<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-800 leading-tight">
            {{ __('Pedidos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('pedidos.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Seleção do Produto -->
                        <div class="form-group">
                            <label for="produto" class="block text-lg text-gray-700">Produto</label>
                            <select name="produto_id" id="produto_id" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600" onchange="updateMarca()">
                                <option value="">Selecione um produto</option>
                                @foreach($produtos as $produto)
                                    <option value="{{ $produto->id }}" data-marca="{{ $produto->marca }}">{{ $produto->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Campo de Marca (Preenchido Automaticamente) -->
                        <div class="form-group">
                            <label for="marca" class="block text-lg text-gray-700">Marca</label>
                            <input type="text" id="marca" name="marca" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600" readonly>
                        </div>

                        <!-- Quantidade -->
                        <div class="form-group">
                            <label for="quantidade" class="block text-lg text-gray-700">Quantidade</label>
                            <input type="number" name="quantidade" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600" min="1" required>
                        </div>

                        <!-- Botão Confirmar -->
                        <div class="text-center">
                            <button type="submit" class="px-6 py-3 bg-purple-600 text-white text-lg font-semibold rounded-lg hover:bg-purple-700 transition duration-300">
                                Confirmar Pedido
                            </button>
                        </div>
                    </form>

                    <script>
                        function updateMarca() {
                            const produtoSelect = document.getElementById('produto_id');
                            const marcaInput = document.getElementById('marca');

                            // Obtém a marca do produto selecionado a partir do atributo data-marca
                            const selectedOption = produtoSelect.options[produtoSelect.selectedIndex];
                            const marca = selectedOption.getAttribute('data-marca');

                            // Atualiza o campo de marca
                            marcaInput.value = marca ? marca : '';
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
