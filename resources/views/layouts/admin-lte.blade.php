<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>{{$title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="AdminLTE | Dashboard v2">
    <meta name="author" content="ColorlibHQ">
    <meta name="description"
          content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS.">
    <meta name="keywords"
          content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard">
    <!--end::Primary Meta Tags--><!--begin::Fonts-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
          integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous"><!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css"
          integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous">
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css"
          integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous">
    <!--end::Third Party Plugin(Bootstrap Icons)--><!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
          integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous">
    <!-- Scripts -->

    @vite(['resources/css/app.scss', 'resources/js/app.js'])

</head>

<body class="layout-fixed sidebar-expand-lg sidebar-mini  bg-body-tertiary">

<div class="app-wrapper">

    <!--begin::Header-->
    <nav class="app-header navbar navbar-expand bg-body">

        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i
                                class="bi bi-list"></i> </a></li>
            </ul>
            <!--begin::End Navbar Links-->
            <ul class="navbar-nav ms-auto"> <!--begin::Navbar Search-->

                <li class="nav-item">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <button
                                    class="btn btn-link nav-link py-2 px-0 px-lg-2 dropdown-toggle d-flex align-items-center"
                                    id="bd-theme"
                                    type="button"
                                    aria-expanded="false"
                                    data-bs-toggle="dropdown"
                                    data-bs-display="static"
                            >
                              <span class="theme-icon-active">
                                <i class="my-1"></i>
                              </span>
                                <span class="d-lg-none ms-2" id="bd-theme-text">Toggle theme</span>
                            </button>
                            <ul
                                    class="dropdown-menu dropdown-menu-end"
                                    aria-labelledby="bd-theme-text"
                                    style="--bs-dropdown-min-width: 8rem;"
                            >
                                <li>
                                    <button
                                            type="button"
                                            class="dropdown-item d-flex align-items-center active"
                                            data-bs-theme-value="light"
                                            aria-pressed="false"
                                    >
                                        <i class="bi bi-sun-fill me-2"></i>
                                        Light
                                        <i class="bi bi-check-lg ms-auto d-none"></i>
                                    </button>
                                </li>
                                <li>
                                    <button
                                            type="button"
                                            class="dropdown-item d-flex align-items-center"
                                            data-bs-theme-value="dark"
                                            aria-pressed="false"
                                    >
                                        <i class="bi bi-moon-fill me-2"></i>
                                        Dark
                                        <i class="bi bi-check-lg ms-auto d-none"></i>
                                    </button>
                                </li>
                                <li>
                                    <button
                                            type="button"
                                            class="dropdown-item d-flex align-items-center"
                                            data-bs-theme-value="auto"
                                            aria-pressed="true"
                                    >
                                        <i class="bi bi-circle-fill-half-stroke me-2"></i>
                                        Auto
                                        <i class="bi bi-check-lg ms-auto d-none"></i>
                                    </button>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!--begin::Fullscreen Toggle-->

                <li class="nav-item"><a class="nav-link" href="#" data-lte-toggle="fullscreen"> <i
                                data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i> <i
                                data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none;"></i> </a>
                </li>

                <!--end::Fullscreen Toggle-->

                <!--begin::User Menu Dropdown-->
                <livewire:layout.profile-dropdown />
                <!--end::User Menu Dropdown-->

            </ul>

        </div>
    </nav>
    <!--end::Header-->


    <!--begin::Sidebar-->
    <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->

        <div class="sidebar-brand d-none d-md-flex align-items-center">
            <a href="/" class="brand-link">
                <img src="/img/logo.png" alt="logo"
                     class="brand-image opacity-75 shadow">
                <span class="brand-text fw-light">MegaLearn</span>
            </a>
        </div>

        <div class="sidebar-wrapper">
            @php
                $menu =[
            [
                        'label' => 'Dashboard',
                        'icon' => 'bi bi-speedometer',
                        'items'=>[
                            [
                                'label' => '1',
                                'url' => 'dashboard',
                                'icon' => 'bi bi-circle'
                            ],
                            [
                                'label' => '2',

                                'icon' => 'bi bi-circle',
                                 'items'=>[
                                    [
                                        'label' => '2.1',
                                        'url' => 'dashboard2',
                                        'icon' => 'bi bi-circle'
                                    ],
                                    [
                                        'label' => '2.2',
                                        'url' => 'dashboard3',
                                        'icon' => 'bi bi-circle'
                                    ]
                                ]
                            ]
                        ]
                    ],
                ];
            @endphp
            <livewire:layout.left-menu :menu="$menu"/>
        </div>

    </aside>
    <!--end::Sidebar-->


    <main class="app-main"> <!--begin::App Content Header-->
        <div class="app-content-header"> <!--begin::Container-->
            <div class="container-fluid"> <!--begin::Row-->
                <div class="row">

                    <div class="col-sm-6">
                        <h3 class="mb-0">{{$title}}</h3>
                    </div>

                    <div class="col-sm-6">
                        <x-breadcrumbs :items="$breadcrumbs??[]"/>
                    </div>
                </div> <!--end::Row-->
            </div> <!--end::Container-->
        </div>
        <div class="app-content"> <!--begin::Container-->
            <div class="container-fluid">

                {{ $slot??''}}
                @yield('slot')

            </div>
        </div>
    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js"
        integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script>
<!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script>
<!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->


<script>

</script>

</body>
</html>