<header class="topbar" data-navbarbg="skin5">
  <nav class="navbar top-navbar navbar-expand-md navbar-dark">
    <div class="navbar-header" data-logobg="skin5">
      <!-- ============================================================== -->
      <!-- Logo -->
      <!-- ============================================================== -->
      <a class="navbar-brand" href="<?= DOMINIO ?>home">
        <b class="logo-icon ps-1">
          <img src="http://<?= SITE_ROOT ?>/web-pages/assets/images/logo-icon.png" alt="homepage" class="light-logo" width="40" />
        </b>
        <span class="logo-text ms-2">
        <img src="http://<?= SITE_ROOT ?>/web-pages/assets/images/logo-text.png" alt="homepage" class="light-logo" width="220"/>
        </span>
        <!-- <img src="http://<?= SITE_ROOT ?>/web-pages/assets/images/logo.png" alt="homepage" class="mt-2 light-logo" width="220"/> -->
      </a>

      <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
    </div>
    <!-- ============================================================== -->
    <!-- End Logo -->
    <!-- ============================================================== -->
    <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
      <!-- ============================================================== -->
      <!-- toggle and nav items -->
      <!-- ============================================================== -->
      <ul class="navbar-nav float-start me-auto">
        <li class="nav-item d-none d-lg-block">
          <a id="left-menu" class="nav-link sidebartoggler waves-effect waves-light" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a>
        </li>
        <!-- ============================================================== -->
      </ul>
      <!-- ============================================================== -->
      <!-- Right side toggle and nav items -->
      <!-- ============================================================== -->
      <ul class="navbar-nav float-end">
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- ============================================================== --

              <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->
        <li class="nav-item dropdown">
          <a class="
                    nav-link
                    dropdown-toggle
                    text-muted
                    waves-effect waves-dark
                    pro-pic
                  " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="http://<?= SITE_ROOT ?>/web-pages/assets/images/user.png" alt="user" class="rounded-circle" width="30" height="30" />
          </a>
          <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="javascript:void(0)"><i class="mdi mdi-account me-1 ms-1"></i> Meu Perfil</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="javascript:void(0)"><i class="mdi mdi-settings me-1 ms-1"></i> Configurações</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?=DOMINIO?>index/logout/"><i class="fa fa-power-off me-1 ms-1"></i> Sair</a>
          </ul>
        </li>
        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->
      </ul>
    </div>
  </nav>
</header>

