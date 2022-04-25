@extends('layouts.app')

@section('title', 'Mostrando post' . $post->title)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="mb-1">Post</h2>
                <table class="table table-hover">
                    <tbody>

                    <tr>
                        <th scope="row">#</th>
                        <td>{{ $post->id }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Titulo</th>
                        <td>{{ $post->title }} </td>
                    </tr>
                    <tr>
                        <th scope="row">Conteudo</th>
                        <td>{{ $post->content }} </td>
                    </tr>

                    <tr>
                        <th scope="row">Imagem</th>
                    </tr>
                    <tr>
                        <td>
                            @if($post->image)
                                <img src="{{ url("storage/{$post->image}") }}" alt="{{ $post->name }}"
                                     style="max-width: 300px;">
                        </td>
                        @else
                            <td>
                                Nenhuma imagem cadastrada
                            </td>
                        @endif
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-12">
                <a href="{{ route('posts.index') }}" class="btn btn-sm btn-secondary">Voltar</a>
                <a href="{{ route('posts.edit', $post->id) }}"
                   class="btn btn-sm btn-secondary">Editar</a>
                <form style="display: inline;" action="{{ route('posts.destroy', $post->id) }}"
                      method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">deletar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
