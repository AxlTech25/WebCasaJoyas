@extends('layouts.app')
@section('title','Tu carrito – La Casa de las Joyas')
@section('content')
<div class="container">
<h1 class="h3 mb-3">Tu carrito</h1>
@if (!count($items))
<div class="alert alert-info">Tu carrito está vacío.</div>
@else
<div class="table-responsive">
<table class="table align-middle">
<thead><tr><th>Producto</th><th>Cant.</th><th>Subtotal</th><th></th></tr></thead>
<tbody>
@foreach($items as $it)
<tr>
<td class="d-flex align-items-center gap-3">
<img src="{{ $it['p']->images[0] ?? '/img/placeholder.jpg' }}" width="64" class="rounded" alt="">
<div>
<div class="fw-medium">{{ $it['p']->name }}</div>
<div class="text-muted">S/ {{ number_format($it['p']->price,2) }}</div>
</div>
</td>
<td>{{ $it['qty'] }}</td>
<td>S/ {{ number_format($it['sub'],2) }}</td>
<td>
<form method="post" action="{{ route('carrito.remove',$it['p']->id) }}">@csrf
<button class="btn btn-sm btn-outline-danger">Quitar</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
<div class="d-flex justify-content-end gap-3 mt-3">
<div class="h5 m-0">Total: <strong>S/ {{ number_format($total,2) }}</strong></div>
<a href="#" class="btn btn-dark disabled">Pagar (demo)</a>
</div>
@endif
</div>
@endsection