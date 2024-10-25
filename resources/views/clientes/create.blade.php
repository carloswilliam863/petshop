@extends('layouts.app') <!-- Ou o layout que você estiver usando -->

@section('content')
    <h1>Adicionar Novo Cliente</h1>

    <!-- Exibição de erros de validação -->
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf

        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div>
            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" id="telefone" required>
        </div>

        <div>
            <label for="bairro">Bairro:</label>
            <input type="text" name="bairro" id="bairro">
        </div>

        <div>
            <label for="estado_civil">Estado Civil:</label>
            <input type="text" name="estado_civil" id="estado_civil">
        </div>

        <div>
            <label for="genero">Gênero:</label>
            <input type="text" name="genero" id="genero">
        </div>

        <div>
            <label for="pets">Quantidade de Pets:</label>
            <input type="number" name="pets" id="pets">
        </div>

        <button type="submit">Salvar Cliente</button>
    </form>
@endsection
