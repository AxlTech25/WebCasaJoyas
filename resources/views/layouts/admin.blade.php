<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title','Admin – La Casa de las Joyas')</title>
  @vite('resources/js/admin.js')
</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-gem"></i></div>
        <div class="sidebar-brand-text mx-3">LCJ Admin</div>
      </a>

      <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span>
        </a>
      </li>

      <hr class="sidebar-divider">
      <div class="sidebar-heading">Catálogo</div>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.productos.index') }}">
          <i class="fas fa-ring"></i><span>Productos</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.categorias.index') }}">
          <i class="fas fa-tags"></i><span>Categorías</span>
        </a>
      </li>

      <hr class="sidebar-divider">
      <div class="sidebar-heading">Comunicación</div>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.contactos.index') }}">
          <i class="fas fa-envelope"></i><span>Contactos</span>
        </a>
      </li>

      <hr class="sidebar-divider d-none d-md-block">
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}" target="_blank">
                <i class="fas fa-external-link-alt"></i> Ver tienda
              </a>
            </li>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name ?? 'Admin' }}</span>
                <i class="fas fa-user-circle fa-lg"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow">
                <a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Perfil</a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">@csrf
                  <button class="dropdown-item"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Salir</button>
                </form>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->

        <div class="container-fluid">
          @yield('content')
        </div>
      </div>

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>© {{ date('Y') }} La Casa de las Joyas</span>
          </div>
        </div>
      </footer>
    </div>
  </div>

  {{-- SB Admin 2 usa algunos IDs para toggles; su JS está en resources/js/admin.js --}}
</body>
</html>
