<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('frontend/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ url('frontend/assets/img/favicon.png') }}">
    <title>
        Universidad Tecnologica de Tehuacan
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ url('frontend/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ url('frontend/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ url('frontend/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="{{ url('frontend/testsAssets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('frontend/testsAssets/css/menu.css') }}" rel="stylesheet">
    <link href="{{ url('frontend/testsAssets/css/style.css') }}" rel="stylesheet">
    <link href="{{ url('frontend/testsAssets/css/vendors.css') }}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    @yield('css')
    <link href="{{ url('frontend/assets/css/soft-ui-dashboard.css?v=1.0.3') }}" rel="stylesheet" />
    <!-- MODERNIZR MENU -->
    <script src="{{ url('frontend/testsAssets/js/modernizr.js') }}"></script>

</head>

<body class="{{ Route::is('students.tests') ? 'bg-gradient-light' : '' }}">
    @if (!Route::is('students.results', 'students.advancedStoreTrajectoryTest.results'))
        <div class="container position-sticky z-index-sticky top-0">
            <!-- Navbar -->
            @include('frontend.layout.topMenu')
            <!-- End Navbar -->
        </div>
    @endif
    <main class="main-content  mt-0">
        <section class="min-vh-100 mb-8">
            @yield('contenido')
        </section>
    </main>
    @include('frontend.layout.modals')
    <!--   Core JS Files   -->
    <script src="{{ url('frontend/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ url('frontend/assets/js/core/bootstrap.min.js') }}"></script>

    @yield('js')

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
