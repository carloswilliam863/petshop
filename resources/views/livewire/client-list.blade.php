<div>
    <h1 class="text-xl font-bold mb-4">Lista de Clientes</h1>

    <table class="table-auto w-full border-collapse border">
        <thead>
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Nome</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Ações</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($clientes as $cliente)
        <tr>
            <td class="border px-4 py-2">{{ $cliente->id }}</td>
            <td class="border px-4 py-2">{{ $cliente->nome }}</td>
            <td class="border px-4 py-2">{{ $cliente->email }}</td>
            <td class="border px-4 py-2">
                <button wire:click="editCliente({{ $cliente->id }})" class="bg-blue-500 text-white px-2 py-1 rounded">Editar</button>
                <button wire:click="deleteCliente({{ $cliente->id }})" class="bg-red-500 text-white px-2 py-1 rounded">Excluir</button>
            </td>
        </tr>
    @endforeach
</tbody>



    </table>
</div>
