<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | E-Pemilu</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- Daterange picker -->
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- summernote -->
    <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <!-- Link CSS Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.2/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Script Select2 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.2/dist/js/select2.min.js"></script>



</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
    <a href="{{ route('admin.dashboard') }}" class="nav-link">Home</a>
</li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
                <!-- Logout -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link">
                <img src="{{ asset('assets/image/voting-box.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">E-PEMILU</span>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('assets/image/bussiness-man.png') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Home Menu -->
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Home</p>
                            </a>
                        </li>
                        
                        <!-- Daftar Pengguna Menu -->
<li class="nav-item">
    <a href="#" class="nav-link {{ Request::is('admin/pengguna*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>
            Daftar Pengguna
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: none;">
        <li class="nav-item">
            <a href="{{ route('admin.pengguna.kpps') }}" class="nav-link {{ Route::currentRouteName() == 'admin.pengguna.kpps' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Akun KPPS</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.pengguna.kpu') }}" class="nav-link {{ Route::currentRouteName() == 'admin.pengguna.kpu' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Akun KPU</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.pengguna.create') }}" class="nav-link {{ Route::currentRouteName() == 'admin.pengguna.create' ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Akun</p>
            </a>
        </li>
    </ul>
</li>

<!-- Daftar TPS Menu -->
<li class="nav-item">
    <a href="{{ route('admin.tps.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.tps.index' ? 'active' : '' }}">
        <i class="nav-icon fas fa-map-marker-alt"></i>
        <p>Daftar TPS</p>
    </a>
</li>

<!-- Manajemen Kandidat -->
<li class="nav-item">
    <a href="{{ route('admin.kaders.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.kaders.index' ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-tie"></i>
        <p>Manajemen Kandidat</p>
    </a>
</li>

<!-- Verifikasi Hasil Pemilu -->
<li class="nav-item">
    <a href="{{ route('verifikasi.hasil_pemilu.index') }}" class="nav-link {{ Route::currentRouteName() == 'verifikasi.hasil_pemilu.index' ? 'active' : '' }}">
        <i class="nav-icon fas fa-clipboard-check"></i>
        <p>Verifikasi Hasil Pemilu</p>
    </a>
</li>

<!-- Manajemen Data Pemilih -->
<li class="nav-item">
    <a href="{{ route('admin.pemilih.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.pemilih.index' ? 'active' : '' }}">
        <i class="nav-icon fas fa-users-cog"></i>
        <p>Manajemen Data Pemilih</p>
    </a>
</li>

<!-- Manajemen Daftar Hadir -->
<li class="nav-item">
    <a href="{{ route('admin.hadir.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.hadir.index' ? 'active' : '' }}">
        <i class="nav-icon fas fa-calendar-check"></i>
        <p>Manajemen Daftar Hadir</p>
    </a>
</li>

<!-- Laporan Rekapitulasi -->
<li class="nav-item">
    <a href="{{ route('admin.laporan.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.laporan.index' ? 'active' : '' }}">
        <i class="nav-icon fas fa-file-alt"></i>
        <p>Laporan Rekapitulasi</p>
    </a>
</li>

                    </ul>
                </nav>
            </div>
        </aside>
        <!-- /.sidebar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('header-title')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">@yield('breadcrumb')</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div><!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

        <!-- Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2024 <a href="#">E-Pemilu</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.1.0
            </div>
        </footer>
    </div><!-- ./wrapper -->

    

</body>

</html>