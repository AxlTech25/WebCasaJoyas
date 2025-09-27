@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="banner">
    <div class="banner-box">
        <p>Descubre nuestra</p>
        <h1>COLECCIÓN DE ORO</h1>
        <a href="/colecciones" class="btn btn-primary">Explorar la colección</a>
    </div>
</div>
<div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
    
    {{-- Indicadores (los puntos de abajo) --}}
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    {{-- Contenido de los Slides --}}
    <div class="carousel-inner">
        
        {{-- Slide 1 --}}
        <div class="carousel-item active" style="background-image: url('https://images.unsplash.com/photo-1611652033959-8c12f043f7db?q=80&w=2070&auto=format&fit=crop')">
            <div class="carousel-caption d-none d-md-block">
                <p>Descubre nuestra</p>
                <h1>Colección de Oro</h1>
                <a href="/colecciones" class="btn btn-primary">Explorar la colección</a>
            </div>
        </div>
        
        {{-- Slide 2 --}}
        <div class="carousel-item" style="background-image: url('https://images.unsplash.com/photo-1620656335293-b8f3629b3113?q=80&w=2070&auto=format&fit=crop')">
            <div class="carousel-caption d-none d-md-block">
                <p>Estilos únicos en</p>
                <h1>Plata Fina</h1>
                <a href="/colecciones" class="btn btn-primary">Ver más</a>
            </div>
        </div>

        {{-- Slide 3 --}}
        <div class="carousel-item" style="background-image: url('https://images.unsplash.com/photo-1599330283451-3e4b3bfa5e53?q=80&w=2070&auto=format&fit=crop')">
            <div class="carousel-caption d-none d-md-block">
                <p>Joyas para cada ocasión</p>
                <h1>Diseños Exclusivos</h1>
                <a href="/colecciones" class="btn btn-primary">Comprar ahora</a>
            </div>
        </div>

    </div>

    {{-- Controles (flechas de anterior/siguiente) --}}
    <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
@endsection
