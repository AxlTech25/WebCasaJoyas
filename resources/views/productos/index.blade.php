@extends('layouts.app')
@section('title','Tienda – La Casa de las Joyas')
@section('content')
<div class="container">
<div class="d-flex justify-content-between align-items-center mb-3">
<h1 class="h3 m-0">Tienda</h1>
<form class="d-flex" method="get">
<input class="form-control me-2" type="search" name="q" value="{{ $q }}" placeholder="Buscar joyas…">
<button class="btn btn-outline-secondary">Buscar</button>
</form>
</div>


<div class="row g-4">
@foreach($productos as $p)
<div class="col-6 col-md-3">
<div class="card h-100">
<img src="{{ $p->images[0] ?? '/img/placeholder.jpg' }}" class="card-img-top" alt="{{ $p->name }}">
<div class="card-body d-flex flex-column">
<h5 class="card-title">{{ $p->name }}</h5>
<p class="text-muted">S/ {{ number_format($p->price,2) }}</p>
<form action="{{ route('carrito.add',$p->id) }}" method="post" class="mt-auto">@csrf
<button class="btn btn-brand w-100">Añadir al carrito</button>
</form>
</div>
</div>
</div>
@endforeach
</div>


<div class="mt-4">{{ $productos->links() }}</div>
</div>
@endsection