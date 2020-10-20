<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v3.2.0
* @link https://coreui.io
* Copyright (c) 2020 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>CoreUI Free Bootstrap Admin Template</title>
    <link rel="apple-touch-icon" sizes="57x57" href="/modules/factory/coreui/dist/assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/modules/factory/coreui/dist/assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/modules/factory/coreui/dist/assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/modules/factory/coreui/dist/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/modules/factory/coreui/dist/assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/modules/factory/coreui/dist/assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/modules/factory/coreui/dist/assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/modules/factory/coreui/dist/assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/modules/factory/coreui/dist/assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/modules/factory/coreui/dist/assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/modules/factory/coreui/dist/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/modules/factory/coreui/dist/assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/modules/factory/coreui/dist/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/modules/factory/coreui/dist/assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Main styles for this application-->
    <link href="/modules/factory/coreui/dist/css/style.css" rel="stylesheet">

<!-- Depois mudar isto de CDN para local -->
<link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/all.min.css">

    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        // Shared ID
        gtag('config', 'UA-118965717-3');
        // Bootstrap ID
        gtag('config', 'UA-118965717-5');
    </script>
    <link href="/modules/factory/coreui/dist/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
    @livewireStyles
    <style>
        .pagination{margin-bottom: 0px;}
    </style>
</head>

<body class="c-app">
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
        <div class="c-sidebar-brand d-lg-down-none">
            <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="/modules/factory/coreui/dist/assets/brand/coreui.svg#full"></use>
            </svg>
            <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
                <use xlink:href="/modules/factory/coreui/dist/assets/brand/coreui.svg#signet"></use>
            </svg>
        </div>
        <ul class="c-sidebar-nav">
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('dashboard') }}">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="/modules/factory/coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
                    </svg> Dashboard
                </a>
            </li>
            <li class="c-sidebar-nav-title">Menu</li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('commands.index') }}">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="/modules/factory/coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-clipboard"></use>
                    </svg> Comandos
                </a>
            </li>
            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="/modules/factory/coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-tags"></use>
                    </svg> Referências</a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('references.index') }}"><span class="c-sidebar-nav-icon"></span> Listar</a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('reference_categories.index') }}"><span class="c-sidebar-nav-icon"></span> Categorias</a></li>
                </ul>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('fabrics.index') }}">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="/modules/factory/coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-layers"></use>
                    </svg> Tecidos
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('shapes.index') }}">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="/modules/factory/coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-vector"></use>
                    </svg> Moldes
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('colors.index') }}">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="/modules/factory/coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-color-palette"></use>
                    </svg> Cores
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('collections.index') }}">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="/modules/factory/coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                    </svg> Coleções
                </a>
            </li>
        </ul>
        <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
    </div>
    <div class="c-wrapper c-fixed-components">
        <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
            <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
                <svg class="c-icon c-icon-lg">
                    <use xlink:href="/modules/factory/coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
                </svg>
            </button><a class="c-header-brand d-lg-none" href="#">
                <svg width="118" height="46" alt="CoreUI Logo">
                    <use xlink:href="/modules/factory/coreui/dist/assets/brand/coreui.svg#full"></use>
                </svg></a>
            <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
                <svg class="c-icon c-icon-lg">
                    <use xlink:href="/modules/factory/coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
                </svg>
            </button>
            <ul class="c-header-nav ml-auto mr-4">

                <li class="c-header-nav-item dropdown">
                    <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <div class="c-avatar"><img class="c-avatar-img" src="/modules/factory/coreui/dist/assets/img/avatars/6.jpg" alt="user@email.com"></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right pt-0">

                        <div class="dropdown-header bg-light py-2"><strong>Perfil</strong></div>
                        <a class="dropdown-item" href="{{ route('users.edit') }}">
                            <svg class="c-icon mr-2">
                                <use xlink:href="/modules/factory/coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                            </svg> Atualizar
                        </a>
                        <div class="dropdown-header bg-light py-2"><strong>Opções</strong></div>
                        {{ Form::open(['route' => 'logout']) }}
                        @csrf
                        {{ Form::button('<svg class="c-icon mr-2">
                                <use xlink:href="/modules/factory/coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                            </svg> Logout', ['type' => 'submit', 'class' => 'dropdown-item']) }}
                        {{ Form::close() }}

                    </div>
                </li>
            </ul>
        </header>
        <div class="c-body">
            <main class="c-main">
                <div class="container">
                    <div class="fade-in">
                        <livewire:alert-component>
                        @yield('content')

                    </div>
                </div>
            </main>
            <footer class="c-footer">
                <div><a href="https://coreui.io">CoreUI</a> © 2020 creativeLabs.</div>
                <div class="ml-auto">Powered by&nbsp;<a href="https://coreui.io/">CoreUI</a></div>
            </footer>
        </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="/modules/factory/coreui/dist/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <!--[if IE]><!-->
    <script src="/modules/factory/coreui/dist/vendors/@coreui/icons/js/svgxuse.min.js"></script>
    <!--<![endif]-->
    <!-- Plugins and scripts required by this view-->
    <script src="/modules/factory/coreui/dist/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
    <script src="/modules/factory/coreui/dist/vendors/@coreui/utils/js/coreui-utils.js"></script>
     @livewireScripts
     @stack('scripts')
</body>

</html>