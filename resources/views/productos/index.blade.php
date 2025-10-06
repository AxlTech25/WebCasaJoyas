@extends('layouts.app')
@section('title', (request('categoria') ? ucfirst(request('categoria')).' – ' : '').'Tienda – La Casa de las Joyas')

@section('content')
@php
  $categoria = ucfirst(request('categoria', 'Tienda'));
@endphp

<div class="container py-4">
  {{-- Encabezado --}}
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 m-0 text-navy">{{ $categoria }}</h1>
    <form class="d-none d-md-flex" method="get">
      <input class="form-control me-2" type="search" name="q" value="{{ $q }}" placeholder="Buscar joyas…">
      @if (request('categoria'))
        <input type="hidden" name="categoria" value="{{ request('categoria') }}">
      @endif
      <button class="btn btn-outline-secondary">Buscar</button>
    </form>
  </div>

  {{-- GRID tipo catálogo (4 col) --}}
  <div class="row row-cols-2 row-cols-md-4 g-4 product-grid">
    @forelse($productos as $p)
      <div class="col">
        <a href="{{ route('productos.show',$p->slug) }}" class="text-decoration-none product-card d-block">
          <div class="product-media rounded">
            <img src="{{ $p->image_urls[0] ?? asset('img/placeholder.jpg') }}"
            alt="{{ $p->name }}"
            class="card-img-top"
            style="object-fit:cover;aspect-ratio:1/1;">
          </div>
          <div class="product-info mt-2">
            <h6 class="product-name mb-1">{{ $p->name }}</h6>
            @php
              $fmt = number_format($p->price, 2, '.', '');
              [$entero, $dec] = explode('.', $fmt);
            @endphp
            <div class="product-price">S/. {{ $entero }}<span class="decimals">.{{ $dec }}</span></div>
          </div>
        </a>
      </div>
    @empty
      <div class="col-12">
        <div class="alert alert-info">No encontramos productos en esta categoría.</div>
      </div>
    @endforelse
  </div>

  {{-- Paginación --}}
  <div class="mt-4 d-flex justify-content-center">
    {{ $productos->links() }}
  </div>
</div>
@endsection
