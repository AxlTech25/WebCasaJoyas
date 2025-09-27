<!DOCTYPE html><html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'La Casa de las Joyas')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { font-family: Arial, sans-serif; }
        .navbar { background-color: #0d2b55; }
        .navbar-nav .nav-link { color: #fff !important; }
        .banner {
            background: url('/images/banner.jpg') no-repeat center center;
            background-size: cover;
            height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #000;
        }
        .banner-box {
            background: rgba(255, 255, 255, 0.7);
            padding: 20px 40px;
            border-radius: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand text-white" href="#">La Casa de las Joyas</a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                ☰
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="/colecciones">Colecciones</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="categoriaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categoría
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="categoriaDropdown">                            
                            <li><a class="dropdown-item" href="/categoria/collares">Collares</a></li>
                            <li><a class="dropdown-item" href="/categoria/pulseras">Pulseras</a></li>
                            <li><a class="dropdown-item" href="/categoria/anillos">Anillos</a></li>
                        </ul>
                    </li>
            <!--Para buscar de acuerdo a las categorias en la base de datos 
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="categoriaDropdown" role="button" data-bs-toggle="dropdown">
                            Categoría
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="categoriaDropdown">
                            @foreach(\App\Models\Categoria::all() as $cat)
                                <li><a class="dropdown-item" href="#">{{ $cat->nombre }}</a></li>
                            @endforeach
                        </ul>
                    </li>
            -->        
                    <li class="nav-item"><a class="nav-link" href="/tiendas">Tiendas</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="masDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Más
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="masDropdown">
                            <li><a class="dropdown-item" href="/acerca">Acerca de</a></li>
                            <li><a class="dropdown-item" href="/contacto">Contacto</a></li>
                            <li><a class="dropdown-item" href="/servicios">Servicios</a></li>
                        </ul>
                    </li>

                    <!-- Menú Usuario -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="usuarioDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="usuarioDropdown">
                        @auth
                            <li><a class="dropdown-item" href="/dashboard">Mi Cuenta</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Cerrar Sesión</button>
                                </form>
                            </li>
                        @else
                            <li><a class="dropdown-item" href="{{ route('login') }}">Iniciar Sesión</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">Registrarse</a></li>
                        @endauth
                    </ul>
                </li>
                    <!-- Carrito -->
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-bag"></i> 0</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Contenido -->
    <div>
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
