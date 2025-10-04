@extends('layouts.app')
@section('title','Nosotros – La Casa de las Joyas')

@section('content')
<div class="container py-5 text-center">

  {{-- Título + divisor --}}
  <h2 class="fw-bold text-uppercase text-navy section-title">Quiénes somos</h2>
  <div class="divider mx-auto mb-3"></div>

  {{-- Texto descriptivo --}}
  <p class="mx-auto lead-tight text-navy" style="max-width: 820px;">
    La empresa joyera <strong>“La Casa de las Joyas”</strong> es una organización dedicada a la
    creación, reparación y venta de joyas en oro y plata de la más alta calidad. Con una larga
    tradición en la industria, nos destacamos por el compromiso con la excelencia en cada uno de
    nuestros procesos. Nuestra misión es brindar a nuestros clientes joyas únicas y elegantes, que
    perduren en el tiempo y se conviertan en piezas de valor sentimental y económico. Para lograrlo,
    gestionamos con esmero tanto la fabricación y venta como el proceso de reparación de las mismas.
  </p>

  {{-- Galería 2 columnas --}}
  <div class="row g-4 mt-4 justify-content-center">
    <div class="col-11 col-md-6 col-lg-5">
      <img src="/img/nosotros-1.jpg" alt="Taller de joyería"
           class="img-fluid rounded shadow-sm w-100">
    </div>
    <div class="col-11 col-md-6 col-lg-5">
      <img src="/img/nosotros-2.jpg" alt="Equipo de La Casa de las Joyas"
           class="img-fluid rounded shadow-sm w-100">
    </div>
  </div>

  <div class="my-5"></div>

  {{-- Valores de la marca --}}
  <h3 class="fw-bold text-uppercase text-navy section-title">Nuestros valores</h3>
  <div class="divider mx-auto mb-5"></div>

  <div class="row g-4">
    <div class="col-md-4">
      <div class="card h-100 border-0 shadow-sm">
        <div class="card-body text-center">
          <i class="bi bi-gem fs-1 text-navy mb-3"></i>
          <h5 class="fw-bold text-navy">Calidad</h5>
          <p class="small text-muted">
            Trabajamos con los más altos estándares para ofrecer joyas de primera calidad que
            perduran con el tiempo.
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card h-100 border-0 shadow-sm">
        <div class="card-body text-center">
          <i class="bi bi-shield-check fs-1 text-navy mb-3"></i>
          <h5 class="fw-bold text-navy">Confianza</h5>
          <p class="small text-muted">
            Forjamos relaciones duraderas con nuestros clientes basadas en transparencia y seguridad.
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card h-100 border-0 shadow-sm">
        <div class="card-body text-center">
          <i class="bi bi-heart fs-1 text-navy mb-3"></i>
          <h5 class="fw-bold text-navy">Garantía</h5>
          <p class="small text-muted">
            Respaldamos cada pieza con garantía de satisfacción y soporte especializado en reparaciones.
          </p>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
