@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Conteúdo: Listagem de Produtos -->
    <div class="row mt-4">
        @foreach($products as $product)
            <div class="col-md-12 mb-4">
                <div class="card h-100 shadow d-flex flex-row align-items-center p-2" style="background-color: #c19cc1;">
                    <!-- Imagem do Produto à Esquerda -->
                    <div class="flex-shrink-0" style="margin-right: 15px;">
                    <img src="{{ Storage::disk('s3')->url('images/' . $product->imagem) }}" class="img-fluid" alt="Imagem do produto" style="width: 50px; height: 50px;">


                    </div>

                    <!-- Conteúdo do Produto -->
                    <div class="flex-grow-1" style="color: white;">
                        <h5 class="card-title mb-1">{{ $product->nome }}</h5>
                        <p class="card-text mb-0">Categoria: {{ $product->categoria }}</p>
                        <p class="card-text">Marca: {{ $product->marca }}</p>
                    </div>

                
                    <!-- Quantidade em Estoque ao final do card -->
                    <div class="ms-auto" style="color: white; font-size: 1.5em; text-align: right;">
                        <span class="font-weight-bold">{{ $product->quantidadeEmEstoque }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

      <!-- Botão de Adicionar Produto -->
      <div class="text-center mt-4">
        <a href="{{ route('products.create') }}" class="btn btn-primary">Adicionar Novo Produto</a>
    </div>
</div>
@endsection
