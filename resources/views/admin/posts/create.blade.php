@extends('layouts.app')

@section('title', 'Criar novo post')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Criar novo post</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('admin.posts._partial._form')
                    <div class="form-group mt-3">
                        <div class="justify-content-center">
                            <button type="submit" class="btn btn-primary form-control">Criar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
