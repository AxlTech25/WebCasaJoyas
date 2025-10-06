@extends('layouts.app')
@section('title', $p->name . ' – La Casa de las Joyas')
@section('content')
<div class="container">
<div class="row g-4">
<div class="col-md-6">
<img src="{{ $p->images[0] ?? '/img/placeholder.jpg' }}" class="img-fluid rounded" alt="{{ $p->name }}">
</div>
<div class="col-md-6">
<h1 class="h3">{{ $p->name }}</h1>
<p class="text-muted">S/ {{ number_format($p->price,2) }}</p>
<p>{{ $p->description }}</p>
<form action="{{ route('carrito.add',$p->id) }}" method="post" class="d-flex gap-2">@csrf
<input type="number" name="qty" min="1" value="1" class="form-control" style="max-width:120px">
<button class="btn btn-brand">Añadir al carrito</button>
</form>
</div>
</div>
</div>
@endsection