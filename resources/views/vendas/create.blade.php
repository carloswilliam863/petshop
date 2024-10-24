@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Vendas</h1>

        <!-- Seleção do Cliente -->
        <div>
            <label for="cliente">Cliente</label>
            <select id="cliente" name="cliente_id" class="form-control">
                <option value="">Selecione um cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
            </select>
        </div>

        <!-- Produtos -->
        <div id="produtos-container">
            <div class="produto-card" style="margin-top: 20px;">
                <label for="produto">Produto(s)</label>
                <select name="products[0][produto_id]" class="form-control">
                    <option value="">Selecione um produto</option>
                    @foreach($produtos as $produto)
                        <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                    @endforeach
                </select>

                <label for="quantidade">Quantidade</label>
                <input type="number" name="products[0][quantidade]" value="1" class="form-control" min="1" style="width: 100px;">

                <button type="button" class="btn btn-danger remove-produto" style="margin-top: 10px;">Remover</button>
            </div>
        </div>

        <!-- Botão para Adicionar Produtos -->
        <button type="button" id="add-produto-btn" class="btn btn-primary" style="margin-top: 20px;">Adicionar Produto</button>

        <!-- Botão Confirmar -->
        <form action="{{ route('vendas.store') }}" method="POST" style="margin-top: 20px;">
            @csrf
            <input type="hidden" id="cliente_id" name="cliente_id">
            <div id="produtos-form"></div>
            <button type="submit" class="btn btn-success">Confirmar</button>
        </form>
    </div>

    <script>
        // Variável para controle do índice dos produtos
        let produtoIndex = 1;

        // Função para adicionar um novo card de produto
        document.getElementById('add-produto-btn').addEventListener('click', function () {
            const produtosContainer = document.getElementById('produtos-container');
            const newProduto = document.createElement('div');
            newProduto.classList.add('produto-card');
            newProduto.style.marginTop = '20px';
            newProduto.innerHTML = `
                <label for="produto">Produto(s)</label>
                <select name="products[${produtoIndex}][produto_id]" class="form-control">
                    <option value="">Selecione um produto</option>
                    @foreach($produtos as $produto)
                        <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                    @endforeach
                </select>

                <label for="quantidade">Quantidade</label>
                <input type="number" name="products[${produtoIndex}][quantidade]" value="1" class="form-control" min="1" style="width: 100px;">

                <button type="button" class="btn btn-danger remove-produto" style="margin-top: 10px;">Remover</button>
            `;
            produtosContainer.appendChild(newProduto);

            produtoIndex++;
        });

        // Função para remover um card de produto
        document.addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('remove-produto')) {
                e.target.closest('.produto-card').remove();
            }
        });

        // Submeter formulário com cliente_id
        document.querySelector('form').addEventListener('submit', function (e) {
            const clienteId = document.getElementById('cliente').value;
            document.getElementById('cliente_id').value = clienteId;
        });
    </script>
@endsection
