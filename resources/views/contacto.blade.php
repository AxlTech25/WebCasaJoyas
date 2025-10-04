@extends('layouts.app')
@section('title','Contacto – La Casa de las Joyas')

@section('content')
<div class="container py-5 text-center">

  <h2 class="fw-bold text-uppercase text-navy section-title">Envíanos tus comentarios</h2>
  <div class="divider mx-auto mb-3"></div>
  <p class="mx-auto lead-tight text-navy" style="max-width:760px;">
    Si tienes alguna duda o deseas compartir tu opinión sobre
    <strong>La Casa de las Joyas</strong>, rellena el siguiente formulario.
  </p>

  @if (session('ok'))
    <div class="alert alert-success mx-auto" style="max-width:560px;">
      {{ session('ok') }}
    </div>
  @endif

  @if ($errors->any())
    <div class="alert alert-danger mx-auto text-start" style="max-width:560px;">
      <ul class="mb-0">
        @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
      </ul>
    </div>
  @endif

  <form method="post" action="{{ route('contacto.send') }}" class="mx-auto contact-form">
    @csrf
    <input type="text" name="nombre" class="form-control contact-input" placeholder="Nombre"
           value="{{ old('nombre') }}" required>
    <input type="text" name="apellido" class="form-control contact-input" placeholder="Apellido"
           value="{{ old('apellido') }}">
    <input type="email" name="email" class="form-control contact-input" placeholder="Email"
           value="{{ old('email') }}" required>
    <textarea name="mensaje" rows="5" class="form-control contact-input"
              placeholder="Escribe tu mensaje aquí..." required>{{ old('mensaje') }}</textarea>

    <div class="text-end">
      <button class="btn btn-contact" type="submit">Enviar</button>
    </div>
  </form>

  <div class="mt-4 small text-navy">
    <div>Contacto prensa: envíanos tus consultas a <a href="mailto:prensa@casadelasjoyas.com">prensa@casadelasjoyas.com</a></div>
    <div>Contacto mayoristas: <a href="mailto:mayoristas@casadelasjoyas.com">mayoristas@casadelasjoyas.com</a></div>
  </div>

  <div class="d-flex justify-content-center gap-3 mt-4">
    <a class="text-dark" href="#" aria-label="Facebook"><i class="bi bi-facebook fs-5"></i></a>
    <a class="text-dark" href="#" aria-label="Instagram"><i class="bi bi-instagram fs-5"></i></a>
    <a class="text-dark" href="#" aria-label="Twitter"><i class="bi bi-twitter-x fs-5"></i></a>
  </div>

  <div class="fw-semibold mt-2">
    <a href="mailto:OficialCasadelasJoyas@casadelasjoyas.com" class="text-decoration-none">
      OficialCasadelasJoyas@casadelasjoyas.com
    </a>
  </div>
</div>
@endsection
