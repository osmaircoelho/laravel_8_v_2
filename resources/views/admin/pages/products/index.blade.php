@extends('layouts.app')

@section('title', 'Gestao de Produtos')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col">
                        <h2>Gestao de produtos <a href="{{route('products.create')}}" class="btn btn-sm btn-primary">Novo
                                Produto</a></h2>
                    </div>

                    <div class="col-md-3">
                        <h3>Total de Produtos: {{ $totalproducts}}</h3>
                    </div>

                    <div class="col-md-3">
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>
                </div>


                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Descrição Longa</th>
                        <th scope="col">Imagem</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->long_description }}</td>
                            <td>{{ $product->image }}</td>
                            <td>
                                <a href="{{ route('products.show', ['product' => $product->id] ) }}"
                                   class="btn btn-sm btn-primary  m-1">Ver</a>
                                <a href="{{ route('products.edit', ['product' => $product->id] ) }}"
                                   class="btn btn-sm btn-primary m-1">Editar</a>
                                <form style="display: inline"
                                      action="{{ route('products.destroy', ['product' => $product->id] ) }}"
                                      method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="container pagination justify-content-center">
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <style>
        .red {
            color: red;
            font-weight: bold;
        }
    </style>
@endpush
