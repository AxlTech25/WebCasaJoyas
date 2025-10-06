@extends('layouts.app')
@section('title','Inicio – La Casa de las Joyas')
@section('content')

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://images.unsplash.com/photo-1611107683227-e9060eccd846?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8am95YXMlMjBkZSUyMG9yb3xlbnwwfHwwfHx8MA%3D%3D" alt="Colección de oro">
      <div class="carousel-caption d-none d-md-block bg-white bg-opacity-75 rounded p-3">
        <h5>Descubre nuestra</h5>
        <h2 class="fw-bold text-dark">COLECCIÓN DE ORO</h2>
        <a href="{{ route('productos.index') }}" class="btn btn-hero mt-2">Explorar la colección</a>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://www.valoro.es/wp-content/uploads/2023/12/joya_plata.webp" alt="Brillo en plata">
      <div class="carousel-caption d-none d-md-block bg-white bg-opacity-75 rounded p-3">
        <h5>Nueva temporada</h5>
        <h2 class="fw-bold text-dark">BRILLO EN PLATA</h2>
        <a href="{{ route('productos.index') }}?coleccion=plata" class="btn btn-hero mt-2">Ver plata</a>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://www.karati.com/cdn/shop/articles/shutterstock_339969596-scaled.jpg?v=1740228325" alt="Piedras preciosas">
      <div class="carousel-caption d-none d-md-block bg-white bg-opacity-75 rounded p-3">
        <h5>Edición limitada</h5>
        <h2 class="fw-bold text-dark">PIEDRAS PRECIOSAS</h2>
        <a href="{{ route('productos.index') }}?coleccion=piedras" class="btn btn-hero mt-2">Explorar</a>
      </div>
    </div>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Siguiente</span>
  </button>
</div>


{{-- Sección de destacados debajo del hero --}}
<div class="container py-5">
  <h2 class="mb-3">Novedades</h2>
  <div class="row g-4">
    @foreach($destacados as $p)
      <div class="col-6 col-md-4 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
          @foreach($p->image_urls as $url)
  <img src="{{ $url }}" class="img-thumbnail" style="width:110px;height:110px;object-fit:cover;" alt="">
@endforeach
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{ $p->name }}</h5>
            <p class="text-muted mb-3">S/ {{ number_format($p->price,2) }}</p>
            <div class="mt-auto d-grid">
              <a href="{{ route('productos.show',$p->slug) }}" class="btn btn-outline-dark">Ver</a>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection