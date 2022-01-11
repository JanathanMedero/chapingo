<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('head')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendors/iconly/bold.css') }}">

    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('dashboard/assets/images/favicon.svg') }}" type="image/x-icon">
    @stack('extra-css')
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="{{ route('admin') }}"><img src="{{ asset('dashboard/assets/images/logo/logo.png') }}" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Usuarios y roles</li>

                        <li class="sidebar-item {{ request()->is('admin') ? 'active' : '' }}">
                            <a href="{{ route('admin') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        @can('show users')
                        <li class="sidebar-item {{ request()->is('administrators') ? 'active' : '' }} {{ request()->is('editar-usuario/*/administrador') ? 'active' : '' }}">
                            <a href="{{ route('adminUser.index') }}" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i>
                                <span>Administradores</span>
                            </a>
                        </li>
                        @endcan

                        @can('show users')
                        <li class="sidebar-item {{ request()->is('users') ? 'active' : '' }} {{ request()->is('editar-usuario/*/moderador') ? 'active' : '' }}">
                            <a href="{{ route('users.index') }}" class='sidebar-link'>
                                <i class="bi bi-person-lines-fill"></i>
                                <span>Moderadores</span>
                            </a>
                        </li>
                        @endcan

                        @can('show redactors')
                        <li class="sidebar-item {{ request()->is('redactors') ? 'active' : '' }} {{ request()->is('editar-usuario/*/redactor') ? 'active' : '' }}">
                            <a href="{{ route('redactor.index') }}" class='sidebar-link'>
                                <i class="bi bi-pen-fill"></i>
                                <span>Redactores</span>
                            </a>
                        </li>
                        @endcan

                        <li class="sidebar-title">Personalización del sitio</li>

                        <li class="sidebar-item {{ request()->is('noticias') ? 'active' : '' }} {{ request()->is('nueva-noticia') ? 'active' : '' }}">
                            <a href="{{ route('notice.index') }}" class='sidebar-link'>
                                <i class="bi bi-megaphone-fill"></i>
                                <span>Noticias</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->is('carousel-principal/slider') ? 'active' : '' }}">
                            <a href="{{ route('slider.index') }}" class='sidebar-link'>
                                <i class="bi bi-images"></i>
                                <span>Carousel principal</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ request()->is('carreras') ? 'active' : '' }}">
                            <a href="{{ route('course.index') }}" class='sidebar-link'>
                                <i class="bi bi-signpost-2"></i>
                                <span>Carreras</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        @yield('content')
    </div>
    <script src="{{ asset('dashboard/assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('dashboard/assets/vendors/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/pages/dashboard.js') }}"></script>

    <script src="{{ asset('dashboard/assets/js/main.js') }}"></script>
    @stack('extra-js')
</body>

</html>