@extends('layouts.app')

@section('title', 'Create new Product')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Create new Product</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" autofocus placeholder="Enter name"
                               value="{{ old('name') }}" >
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description"
                                  placeholder="Enter description">{{ old('description') }} </textarea>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Enter price"
                               value="{{ old('price') }}"  >
                        @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image" placeholder="Enter image"
                               value="{{ old('image') }}">
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" id="category_id" name="category_id" >
                              @foreach ($categories as $category)
                                  <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                              @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <div class="justify-content-center">
                            <button type="submit" class="btn btn-primary form-control">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
