@extends('layouts.app')

@section('title', 'Mostrando produto' . $product->name)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="mb-5">Dados do produto</h2>
                <table class="table table-hover">
                    <tbody>


                    <tr>
                        <th scope="row">#</th>
                        <td>{{ $product->id }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Produto</th>
                        <td>{{ $product->name  }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Descricao</th>
                        <td>{{ $product->description  }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Preco</th>
                        <td>{{ $product->price  }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Descricao Longa</th>
                        <td>{{ $product->long_description  }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Imagem</th>
                        <td>{{ $product->image  }}</td>
                    </tr>


                    </tbody>
                </table>
            </div>

            <div class="col-md-12">
                <a href="{{ route('products.index') }}" class="btn btn-sm btn-secondary">Voltar</a>
                <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="btn btn-sm btn-secondary">Editar</a>
                <form style="display: inline;" action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">deletar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
