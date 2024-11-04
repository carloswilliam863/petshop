<div>
    <h1 class="mb-4 text-xl font-bold">Lista de Clientes</h1>

    <table class="w-full border border-collapse table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">Nome</th>
                <th class="px-4 py-2 border">Email</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($clientes as $cliente)
        <tr>
            <td class="px-4 py-2 border">{{ $cliente->id }}</td>
            <td class="px-4 py-2 border">{{ $cliente->nome }}</td>
            <td class="px-4 py-2 border">{{ $cliente->email }}</td>
            <td class="px-4 py-2 border">
                <button wire:click="editCliente({{ $cliente->id }})" class="px-2 py-1 text-white bg-blue-500 rounded">Editar</button>
                <button wire:click="deleteCliente({{ $cliente->id }})" class="px-2 py-1 text-white bg-red-500 rounded">Excluir</button>
            </td>
        </tr>
    @endforeach
</tbody>



    </table>
</div>
