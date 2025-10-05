@extends('layouts.app')
@section('title','Editar categoría')
@section('content')
<div class="container py-4">
  <h1 class="h4 mb-3">Editar categoría</h1>
  @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
  <form method="post" action="{{ route('admin.categorias.update',$c) }}">@csrf @method('PUT')
    <div class="mb-3"><label class="form-label">Nombre</label><input name="name" class="form-control" value="{{ old('name',$c->name) }}" required></div>
    <div class="mb-3"><label class="form-label">Slug</label><input name="slug" class="form-control" value="{{ old('slug',$c->slug) }}" required></div>
    <div class="d-flex gap-2"><button class="btn btn-dark">Guardar</button><a href="{{ route('admin.categorias.index') }}" class="btn btn-outline-secondary">Cancelar</a></div>
  </form>
</div>
@endsection
