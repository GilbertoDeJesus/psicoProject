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
    <link id="pagestyle" href="{{ url('frontend/assets/css/soft-ui-dashboard.css?v=1.0.3') }}" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">
    <nav
        class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent mt-4">
        <div class="container">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="javascript:;">
                <img src="{{ url('frontend/assets/img/logo_2020p.png') }}" class="navbar-brand-img h-100"
                    alt="main_logo" style="max-height: 30px; filter: drop-shadow(2px 3px 3px black);">
            </a>
            <div class="px-1" id="navigation">
                <ul class="navbar-nav mx-auto"></ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
                        <a href="javascript:;"
                            class="btn btn-sm  bg-gradient-dark  btn-round mb-0 me-1">{{ now()->isoFormat('DD/MM/YYYY') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <main class="main-content mt-0 ps">
        <div class="page-header min-vh-100"
            style="background-image: url({{ url('frontend/assets/img/curved-images/curved4.jpg') }});">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-md-7">
                        <div class="card">
                            <div class="card-header p-0 mx-auto position-relative z-index-1">
                                <a href="javascript:;" class="d-block">
                                  <img src="{{ url('backend/images/error403.png') }}" class="img-fluid border-radius-lg max-height-300">
                                </a>
                              </div>
                            <div class="card-body px-lg-6 py-lg-4 text-center">
                                <div class="text-center text-muted mb-4">
                                    <h2 class="h1">403</h2>
                                    <p class="text-lead h5">No autorizado.</p>
                                </div>
                                <div class="row gx-2 gx-sm-3">

                                    <div class="text-center">
                                        <p class="text-lead t">No cuentas con los permisos necesarios para realizar esta acción.
                                        </p>
                                    </div>
                                    <div class="text-center">
                                        <a href="{{ route('students.tests') }}" class="btn bg-gradient-dark btn-lg w-100 mt-4 text-white">Regresar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
        </div>
    </main>

    <!--   Core JS Files   -->
    <script src="{{ url('frontend/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ url('frontend/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ url('frontend/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ url('frontend/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
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
