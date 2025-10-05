@extends('layouts.app')
@section('title','Admin – Productos')
@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 m-0">Productos</h1>
    <a href="{{ route('admin.productos.create') }}" class="btn btn-dark">Nuevo producto</a>
  </div>
  @if(session('ok'))<div class="alert alert-success">{{ session('ok') }}</div>@endif
  <div class="table-responsive">
    <table class="table align-middle">
      <thead><tr><th>#</th><th>Nombre</th><th>Precio</th><th>Stock</th><th>Actualizado</th><th></th></tr></thead>
      <tbody>
        @foreach($items as $p)
        <tr>
          <td>{{ $p->id }}</td>
          <td>{{ $p->name }}</td>
          <td>S/ {{ number_format($p->price_cents/100,2) }}</td>
          <td>{{ $p->stock }}</td>
          <td>{{ $p->updated_at->diffForHumans() }}</td>
          <td class="text-end">
            <a href="{{ route('admin.productos.edit',$p) }}" class="btn btn-sm btn-outline-secondary">Editar</a>
            <form action="{{ route('admin.productos.destroy',$p) }}" method="post" class="d-inline" onsubmit="return confirm('¿Eliminar producto?')">@csrf @method('DELETE')
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
