@extends('layouts.app') <!-- Ou seu layout principal -->

@section('content')
<div class="container">
    <h1>Criar Novo Produto</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" required>
        </div>

        <div class="form-group">
            <label for="categoria">Categoria</label>
            <input type="text" class="form-control" name="categoria" id="categoria" required>
        </div>

        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="number" step="0.01" class="form-control" name="preco" id="preco" required>
        </div>

        <div class="form-group">
            <label for="quantidadeEmEstoque">Quantidade em Estoque</label>
            <input type="number" class="form-control" name="quantidadeEmEstoque" id="quantidadeEmEstoque" required>
        </div>

        <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" class="form-control" name="marca" id="marca" required>
        </div>

        <div class="form-group">
            <label for="imagem">Imagem</label>
            <input type="file" class="form-control" name="imagem" id="imagem" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Criar Produto</button>
    </form>
</div>
@endsection
