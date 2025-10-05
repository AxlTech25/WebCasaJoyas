@extends('layouts.app')
@section('title','Admin – Dashboard')
@section('content')
<div class="container py-4">
  <h1 class="h4 mb-4">Dashboard</h1>
  <div class="row g-3">
    <div class="col-md-4"><div class="card shadow-sm"><div class="card-body"><div class="text-muted">Productos</div><div class="h3">{{ $products }}</div></div></div></div>
    <div class="col-md-4"><div class="card shadow-sm"><div class="card-body"><div class="text-muted">Categorías</div><div class="h3">{{ $categories }}</div></div></div></div>
    <div class="col-md-4"><div class="card shadow-sm"><div class="card-body"><div class="text-muted">Contactos</div><div class="h3">{{ $contacts }}</div></div></div></div>
  </div>
</div>
@endsection
