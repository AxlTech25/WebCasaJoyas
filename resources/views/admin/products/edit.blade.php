@extends('layouts.admin')

@section('title','Editar producto')

@section('content')
<div class="container py-4">
  <h1 class="h4 mb-4">Editar producto</h1>

  <form method="POST" action="{{ route('admin.productos.update',$p) }}" enctype="multipart/form-data" class="card card-body">
    @csrf
    @method('PUT')

    {{-- ejemplo de campos, adapta a los tuyos --}}
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label">Nombre</label>
        <input type="text" name="name" class="form-control" value="{{ old('name',$p->name) }}">
      </div>
      <div class="col-md-6">
        <label class="form-label">Slug</label>
        <input type="text" name="slug" class="form-control" value="{{ old('slug',$p->slug) }}">
      </div>
      <div class="col-md-3">
        <label class="form-label">Precio (S/)</label>
        <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $p->price_cents/100) }}">
      </div>
      <div class="col-md-3">
        <label class="form-label">Stock</label>
        <input type="number" name="stock" class="form-control" value="{{ old('stock', $p->stock) }}">
      </div>
      <div class="col-12">
        <label class="form-label">Descripción</label>
        <textarea name="description" class="form-control" rows="4">{{ old('description',$p->description) }}</textarea>
      </div>
    </div>

    <div class="mt-4">
      <label class="form-label">Imágenes (puedes subir varias)</label>
      <input type="file" name="images[]" class="form-control" multiple>
    </div>

    {{-- Miniaturas existentes + check para eliminar --}}
    @if(!empty($p->images))
      <div class="d-flex gap-3 flex-wrap mt-3">
        @foreach($p->image_urls as $url)
          <div class="text-center">
            <img src="{{ $url }}" class="img-thumbnail mb-1"
                style="width:110px;height:110px;object-fit:cover;" alt="">
            <div class="form-check">
              {{-- Usa el índice del array como valor --}}
              <input class="form-check-input" type="checkbox"
                    name="remove_images[]" id="rm{{ $loop->index }}"
                    value="{{ $loop->index }}">
              <label class="form-check-label small" for="rm{{ $loop->index }}">
                Eliminar
              </label>
            </div>
          </div>
        @endforeach
      </div>
    @endif

    <div class="mt-4">
      <button class="btn btn-primary">Guardar</button>
      <a href="{{ route('admin.productos.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    </div>
  </form>
</div>
@endsection
