<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar Novo Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto p-6 bg-purple-100 rounded-lg shadow-lg">
    <h1 class="text-3xl font-semibold text-purple-700 mb-6">Adicionar Novo Cliente</h1>

    <form action="{{ route('cliente.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="nome" class="block text-sm font-medium text-purple-600">Nome:</label>
            <input type="text" name="nome" id="nome" required class="mt-2 p-3 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" />
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-purple-600">Email:</label>
            <input type="email" name="email" id="email" required class="mt-2 p-3 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" />
        </div>

        <div>
            <label for="telefone" class="block text-sm font-medium text-purple-600">Telefone:</label>
            <input type="text" name="telefone" id="telefone" required class="mt-2 p-3 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" />
        </div>

        <div>
            <label for="bairro" class="block text-sm font-medium text-purple-600">Bairro:</label>
            <input type="text" name="bairro" id="bairro" class="mt-2 p-3 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" />
        </div>

        <div>
            <label for="estado_civil" class="block text-sm font-medium text-purple-600">Estado Civil:</label>
            <input type="text" name="estado_civil" id="estado_civil" class="mt-2 p-3 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" />
        </div>

        <div>
            <label for="genero" class="block text-sm font-medium text-purple-600">Gênero:</label>
            <input type="text" name="genero" id="genero" class="mt-2 p-3 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" />
        </div>

        <div>
            <label for="pets" class="block text-sm font-medium text-purple-600">Quantidade de Pets:</label>
            <input type="number" name="pets" id="pets" class="mt-2 p-3 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" />
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full py-3 bg-purple-600 text-white text-lg font-semibold rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500">Salvar Cliente</button>
        </div>
    </form>
</div>

        </div>
    </div>

</div>


