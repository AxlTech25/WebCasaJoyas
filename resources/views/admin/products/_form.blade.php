@csrf
<div class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Nombre</label>
    <input name="name" class="form-control" value="{{ old('name', $p->name ?? '') }}" required>
  </div>
  <div class="col-md-6">
    <label class="form-label">Slug</label>
    <input name="slug" class="form-control" value="{{ old('slug', $p->slug ?? '') }}" required>
  </div>
  <div class="col-md-4">
    <label class="form-label">Precio (S/)</label>
    <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', isset($p)? $p->price_cents/100 : '') }}" required>
  </div>
  <div class="col-md-4">
    <label class="form-label">Stock</label>
    <input type="number" name="stock" class="form-control" value="{{ old('stock', $p->stock ?? 0) }}">
  </div>
  <div class="col-md-4">
    <label class="form-label">Categorías</label>
    <select name="categories[]" class="form-select" multiple>
      @foreach($cats as $c)
        <option value="{{ $c->id }}" @selected( isset($p) && $p->categories->pluck('id')->contains($c->id) )>{{ $c->name }}</option>
      @endforeach
    </select>
    <small class="text-muted">Ctrl/Cmd + click para varias.</small>
  </div>
  <div class="col-12">
    <label class="form-label">Descripción</label>
    <textarea name="description" rows="4" class="form-control">{{ old('description', $p->description ?? '') }}</textarea>
  </div>
  <div class="col-12">
    <label class="form-label">Imágenes (puedes subir varias)</label>
    <input type="file" name="images[]" class="form-control" multiple accept="image/*">
    @if(isset($p) && $p->images)
      <div class="d-flex flex-wrap gap-2 mt-2">
        @foreach($p->images as $img)
          <img src="{{ $img }}" class="rounded" style="width:90px;height:90px;object-fit:cover;">
        @endforeach
      </div>
    @endif
  </div>
</div>
<div class="mt-3 d-flex gap-2">
  <button class="btn btn-dark">Guardar</button>
  <a href="{{ route('admin.productos.index') }}" class="btn btn-outline-secondary">Cancelar</a>
</div>
