@extends('layouts.app')
@section('title','Tiendas – La Casa de las Joyas')

@section('content')
<div class="container py-5 text-center">

  {{-- Dónde estamos --}}
  <h2 class="fw-bold text-uppercase text-navy">Dónde estamos</h2>
  <hr class="mx-auto" style="width:60px; border:2px solid var(--navy); opacity:.9;">
  <p class="mt-3 mx-auto" style="max-width:650px;">
    La joyería <strong>"La Casa de las Joyas"</strong> tiene su sede principal en la ciudad de 
    <strong>Huancayo</strong>, distrito de San Jerónimo, con una tienda física en 
    <strong>Jr. Ica 751</strong>.
  </p>

  {{-- Mapa --}}
  <div class="ratio ratio-16x9 mt-4 shadow-sm rounded overflow-hidden">
    <iframe
      src="https://maps.google.com/maps?q=Jr.%20Ica%20751%20Huancayo&z=16&output=embed"
      style="border:0;" allowfullscreen loading="lazy"
      referrerpolicy="no-referrer-when-downgrade">
    </iframe>
  </div>

  <div class="my-5"></div>

  {{-- Distribuidores --}}
  <h2 class="fw-bold text-uppercase text-navy">Distribuidores</h2>
  <hr class="mx-auto" style="width:60px; border:2px solid var(--navy); opacity:.9;">
  
  <div class="mt-4">
    <p class="mb-4">
      <strong>Joyas Fantasía</strong><br>
      CDMX, México
    </p>
    <p class="mb-4">
      <strong>Esmeralda Negra</strong><br>
      Bogotá, Colombia
    </p>
    <p class="mb-4">
      <strong>El Sueño de Pandora</strong><br>
      Buenos Aires, Argentina
    </p>
  </div>
</div>
@endsection
