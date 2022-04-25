@extends('layouts.app')

@section('title', 'Listagem de posts')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">

                    @if (session('message'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="col-md-4">
                        <h3>Listagem de posts <a href="{{route('posts.create')}}" class="btn btn-sm btn-primary">
                                Novo Post</a>
                        </h3>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('posts.search') }}" method="POST" class="navbar-search pull-left">
                            @csrf
                            <input type="text" name="search" placeholder="Titulo, Conteudo..." class="search-query"
                                   value="{{ $filters['search'] ?? ""}}">
                            <button type="submit" class="btn btn-sm btn-primary">Pesquisar</button>
                        </form>
                    </div>
                </div>
                <table class="table table-hover ">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Titulo</th>
                        <th>Conteudo</th>
                        <th>Image</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td scope="row">{{ $post->id  }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->content }}</td>
                                <td>
                                    @if($post->image)
                                        <img src="{{ url("storage/{$post->image}") }}" alt="{{ $post->title }}"
                                             style="max-width: 100px;">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('posts.show', $post->id ) }}"
                                       class="btn btn-sm btn-success m-1"><i class="bi bi-eye-fill"></i>
                                    </a>

                                    <a href="{{ route('posts.edit', $post->id ) }}"
                                       class="btn btn-sm btn-primary m-1 mb-2">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form class="m-1"
                                          style="display: inline"
                                          action="{{ route('posts.destroy', $post->id ) }}"
                                          method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i>
                                        </button>
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
                        @if(isset($filters))
                            {{ $posts->appends($filters)->links('pagination::bootstrap-4') }}
                        @else
                            {{ $posts->links('pagination::bootstrap-4') }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')

@endpush
