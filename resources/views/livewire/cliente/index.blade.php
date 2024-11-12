<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto">
                        <h1 class="text-2xl font-bold mb-6 text-purple-700">Lista de Clientes</h1>

                         <!-- Botão para adicionar novo cliente -->
                            <div class="mb-4">
                                <a href="{{ route('cliente.create') }}" class="inline-block px-6 py-3 bg-purple-600 text-white font-semibold rounded-lg shadow-md hover:bg-purple-700 transition duration-200">Adicionar Novo Cliente</a>
                            </div>

                        @if (session('success'))
                            <div class="alert alert-success bg-purple-100 text-purple-800 px-6 py-3 rounded-md mb-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                                <thead class="bg-purple-100">
                                    <tr class="text-sm font-medium text-gray-600">
                                        <th class="px-6 py-3 border-b text-left">ID</th>
                                        <th class="px-6 py-3 border-b text-left">Nome</th>
                                        <th class="px-6 py-3 border-b text-left">Email</th>
                                        <th class="px-6 py-3 border-b text-left">Telefone</th>
                                        <th class="px-6 py-3 border-b text-left">Bairro</th>
                                        <th class="px-6 py-3 border-b text-left">Estado Civil</th>
                                        <th class="px-6 py-3 border-b text-left">Gênero</th>
                                        <th class="px-6 py-3 border-b text-left">Pets</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm text-gray-800">
                                    @foreach($clientes as $cliente)
                                        <tr class="hover:bg-purple-50 transition-colors">
                                            <td class="px-6 py-3 border-b">{{ $cliente->id }}</td>
                                            <td class="px-6 py-3 border-b">{{ $cliente->nome }}</td>
                                            <td class="px-6 py-3 border-b">{{ $cliente->email }}</td>
                                            <td class="px-6 py-3 border-b">{{ $cliente->telefone }}</td>
                                            <td class="px-6 py-3 border-b">{{ $cliente->bairro }}</td>
                                            <td class="px-6 py-3 border-b">{{ $cliente->estado_civil }}</td>
                                            <td class="px-6 py-3 border-b">{{ $cliente->genero }}</td>
                                            <td class="px-6 py-3 border-b">{{ $cliente->pets }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
