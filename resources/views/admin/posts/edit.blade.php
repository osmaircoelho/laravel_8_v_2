@extends('layouts.app')

@section('title', 'Editando novo post')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Editar Post {{ $post->id }}</h1>

                <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @include('admin.posts._partial._form')
                    <div class="form-group mt-3">
                        <div class="justify-content-center">
                            <button type="submit" class="btn btn-success form-control">Atualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

