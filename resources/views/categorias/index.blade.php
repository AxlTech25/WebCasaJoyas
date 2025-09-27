@extends('layouts.app')

@section('title', 'Categorías')

@section('content')
<div class="container py-5">
    <h1>Categorías</h1>
    <a href="{{ route('categorias.create') }}" class="btn btn-primary">Nueva Categoría</a>
    <ul class="mt-3">
        @foreach ($categorias as $categoria)
            <li>{{ $categoria->nombre }}</li>
        @endforeach
    </ul>
</div>
@endsection
