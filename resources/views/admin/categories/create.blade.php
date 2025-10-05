@extends('layouts.admin')
@section('title','Nueva categoría')
@section('content')
<div class="container py-4">
  <h1 class="h4 mb-3">Nueva categoría</h1>
  @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
  <form method="post" action="{{ route('admin.categorias.store') }}">
    @csrf
    <div class="mb-3"><label class="form-label">Nombre</label><input name="name" class="form-control" required></div>
    <div class="mb-3"><label class="form-label">Slug</label><input name="slug" class="form-control" required></div>
    <div class="d-flex gap-2"><button class="btn btn-dark">Guardar</button><a href="{{ route('admin.categorias.index') }}" class="btn btn-outline-secondary">Cancelar</a></div>
  </form>
</div>
@endsection
