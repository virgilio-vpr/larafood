@include('admin.includes.alerts')

<div class="form-group">
    <label>Título:</label>
    <input type="text" name="title" class="form-control" placeholder="Título:" value="{{ $product->title ?? old('title') }}">
</div>

<div class="form-group">
    <label>Preço:</label>

    @if(isset($product->price))
        @php $product->price = number_format($product->price, 2, ',', '.') @endphp
    @endif

    <input type="text" name="price" class="form-control" placeholder="Preço:" value="{{ $product->price ??  old('price') }}">
</div>

<div class="form-group">
    <label>Imagem:</label>
    <input type="file" name="image" class="form-control">
</div>

<div class="form-group">
    <label>Descrição:</label>
    <textarea name="description" cols="30" rows="5" class="form-control">{{ $product->description ?? old('description') }}</textarea>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>