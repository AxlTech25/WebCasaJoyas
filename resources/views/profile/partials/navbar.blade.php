<nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background:#173A5E;">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2" href="./">
      <img src="../public/img/la_casa_de_las_joyas_exact.svg" alt="La Casa de las Joyas" height="28">
      <span class="fw-semibold">La Casa de las Joyas</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item"><a class="nav-link px-3 active" href="./">Inicio</a></li>
        <li class="nav-item"><a class="nav-link px-3" href="productos?coleccion=oro">Colecciones</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            Categoría
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('productos.index',['categoria'=>'collares']) }}">Collares</a></li>
            <li><a class="dropdown-item" href="{{ route('productos.index',['categoria'=>'pulseras']) }}">Pulseras</a></li>
            <li><a class="dropdown-item" href="{{ route('productos.index',['categoria'=>'anillos']) }}">Anillos</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link px-3" href="tiendas">Tiendas</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link px-3 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Más</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="nosotros">Nosotros</a></li>
            <li><a class="dropdown-item" href="contacto">Contacto</a></li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item me-2">
          @auth
            @if (Route::has('profile.edit'))
              <a class="nav-link" href="{{ route('profile.edit') }}"><i class="bi bi-person-circle fs-5"></i></a>
            @else
              <a class="nav-link" href="{{ route('login') }}"><i class="bi bi-person-circle fs-5"></i></a>
            @endif
          @else
            <a class="nav-link" href="{{ route('login') }}"><i class="bi bi-person fs-5"></i></a>
          @endauth
        </li>
        <li class="nav-item">
          <a class="nav-link position-relative" href="{{ route('carrito.index') }}">
            <i class="bi bi-bag fs-5"></i>
            @php $count = collect(session('cart',[]))->sum('qty'); @endphp
            @if($count)
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-light text-dark">{{ $count }}</span>
            @endif
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>