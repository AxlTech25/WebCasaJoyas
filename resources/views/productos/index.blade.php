@extends('layouts.app')

@section('title', 'Productos')

@section('content')
<div class="container py-5">
    <h1>Productos</h1>
    <a href="{{ route('productos.create') }}" class="btn btn-primary">Nuevo Producto</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->categoria->nombre }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->stock }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
