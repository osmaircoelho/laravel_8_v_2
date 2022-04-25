@csrf
<div class="form-group">
    <label for="title">Titulo</label>
    <input type="text" class="form-control" id="title" name="title" autofocus placeholder="Digite o nome do post"
           value="{{ $post->title ?? old( 'title') }}" >
    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="content">Conteudo</label>
    <textarea class="form-control" id="content" name="content"
              placeholder="Entre com a contudo do post">{{ $post->content ?? old('content') }} </textarea>
    @error('content')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="image">Image</label>
    <input type="file" class="form-control" id="image" name="image" placeholder="Imagem do post"
           value="{{ $post->image ?? old('image') }}">

    @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
