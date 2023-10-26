<header class="app-header"><a class="app-header__logo">Titulo</a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
      <!-- User Menu-->
      <li class="dropdown"><a class="app-nav__item" href="#" data-bs-toggle="dropdown" aria-label="Open Profile Menu"><i class="bi bi-person fs-4"></i> {{ Session::get('nome') }}</a>
        <ul class="dropdown-menu settings-menu dropdown-menu-right">
          <li><a class="dropdown-item" href="page-user.html"><i class="bi bi-person me-2 fs-5"></i> Perfil</a></li>
          <li><a class="dropdown-item" href="page-user.html"><i class="bi bi-key"></i> Alterar Senha</a></li>
          <li><a class="dropdown-item" href="{{ route('login.logout') }}"><i class="bi bi-box-arrow-right me-2 fs-5"></i> Sair</a></li>
        </ul>
      </li>
    </ul>
  </header>
