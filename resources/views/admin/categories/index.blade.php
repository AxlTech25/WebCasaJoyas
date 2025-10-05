@extends('layouts.app')
@section('title','Admin – Categorías')
@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 m-0">Categorías</h1>
    <a href="{{ route('admin.categorias.create') }}" class="btn btn-dark">Nueva categoría</a>
  </div>
  @if(session('ok'))<div class="alert alert-success">{{ session('ok') }}</div>@endif
  <div class="table-responsive">
    <table class="table align-middle">
      <thead><tr><th>#</th><th>Nombre</th><th>Slug</th><th></th></tr></thead>
      <tbody>
        @foreach($items as $c)
        <tr>
          <td>{{ $c->id }}</td>
          <td>{{ $c->name }}</td>
          <td>{{ $c->slug }}</td>
          <td class="text-end">
            <a href="{{ route('admin.categorias.edit',$c) }}" class="btn btn-sm btn-outline-secondary">Editar</a>
            <form action="{{ route('admin.categorias.destroy',$c) }}" method="post" class="d-inline" onsubmit="return confirm('¿Eliminar categoría?')">@csrf @method('DELETE')
              <button class="btn btn-sm btn-outline-danger">Eliminar</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="mt-3">{{ $items->links() }}</div>
</div>
@endsection
