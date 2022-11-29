<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('frontend/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ url('frontend/assets/img/favicon.png') }}">
    <title>
        Registro de alumnos
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
    <section class="min-vh-100 mb-8">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('{{ url('frontend/assets/img/curved-images/curved14.jpg') }}');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">¡Bienvenido!</h1>
                        <p class="text-lead text-white">Ingresa tus datos para acceder a los cuestionarios.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                <div class="col-xl-7 col-lg-7 col-md-7 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center mt-1 pt-4">
                            <div class="nav-wrapper position-relative end-0">
                                <ul class="nav nav-pills nav-pills-dark-green nav-fill p-1" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#log-in"
                                            role="tab" aria-controls="preview" aria-selected="true">
                                            <i class="ni ni-key-25 text-sm me-2"></i> Iniciar sesión
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#sign-up"
                                            role="tab" aria-controls="code" aria-selected="false">
                                            <i class="ni ni-badge text-sm me-2"></i> Registrarse
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body mx-2">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="log-in" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <div class="card card-plain">
                                        <div class="card-header py-0 text-center">
                                            <h4 class="font-weight-bolder text-info text-gradient">Bienvenido de nuevo
                                            </h4>
                                            <p class="mb-0 text-sm">Ingresa tu matrícula y contraseña para iniciar
                                                sesión</p>
                                        </div>
                                        <div class="card-body">
                                            <form role="form text-left" method="POST"
                                                action="{{ route('student.log-in') }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-xl-10 col-lg-10 col-md-12 mx-auto">
                                                        @if ($errors->any())
                                                            @foreach ($errors->all() as $error)
                                                                <div class="alert alert-danger alert-dismissible fade show text-white"
                                                                    role="alert">
                                                                    <span class="alert-icon"><i
                                                                            class="ni ni-notification-70 me-1"></i></span>
                                                                    <span class="alert-text">{{ $error }}</span>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="alert" aria-label="Close">
                                                                        <span aria-hidden="true"><i
                                                                                class="ni ni-fat-remove me-1"></i></span>
                                                                    </button>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                        <label>Matrícula</label>
                                                        <div class="input-group mb-3">
                                                            <input type="number" name="matricula"
                                                                class="form-control" placeholder="Matricula"
                                                                aria-label="Email" required>
                                                        </div>
                                                        <label>Contraseña</label>
                                                        <div class="input-group mb-3">
                                                            <input type="password" name="password"
                                                                class="form-control" placeholder="Contraseña"
                                                                aria-label="Password" autocomplete="false" required>
                                                        </div>
                                                        <div class="text-center">
                                                            <button type="submit"
                                                                class="btn bg-gradient-dark-green btn-lg w-100 mt-4 mb-0 text-white">Iniciar
                                                                sesión</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                            <p class="text-sm mt-3 mb-0">Regístrate si aún no lo has hecho</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="sign-up" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <form role="form text-left" method="POST"
                                        action="{{ route('student.storeStudent') }}" id="studentRegister">
                                        @csrf
                                        @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <div class="alert alert-danger alert-dismissible fade show text-white"
                                                    role="alert">
                                                    <span class="alert-icon"><i
                                                            class="ni ni-notification-70 me-1"></i></span>
                                                    <span class="alert-text">{{ $error }}</span>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close">
                                                        <span aria-hidden="true"><i
                                                                class="ni ni-fat-remove me-1"></i></span>
                                                    </button>
                                                </div>
                                            @endforeach
                                        @endif
                                        @if (isset($message))
                                            <div class="alert alert-danger alert-dismissible fade show text-white"
                                                role="alert">
                                                <span class="alert-icon"><i
                                                        class="ni ni-notification-70 me-1"></i></span>
                                                <span class="alert-text">{{ $message }}</span>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true"><i
                                                            class="ni ni-fat-remove me-1"></i></span>
                                                </button>
                                            </div>
                                        @endif

                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4 col-md-12">
                                                <label>Nombre</label>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control " placeholder="Nombre"
                                                        name="name" required value="{{ old('name') }}">
                                                </div>

                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-12">
                                                <label>Apellido paterno</label>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control"
                                                        placeholder="Apellido paterno" name="family_name" required
                                                        value="{{ old('family_name') }}">
                                                </div>

                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-12">
                                                <label>Apellido materno</label>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control"
                                                        placeholder="Apellido materno" name="last_name" required
                                                        value="{{ old('last_name') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4 col-md-4">
                                                <label>Edad</label>
                                                <div class="mb-3">
                                                    <input type="number" class="form-control" placeholder="Edad"
                                                        name="age" required value="{{ old('age') }}">
                                                </div>
                                            </div>
                                            <div class="col-xl-8 col-lg-8 col-md-8">
                                                <label>Email institucional</label>
                                                <div class="mb-3">
                                                    <input type="email" class="form-control"
                                                        placeholder="Email institucional" name="email" required
                                                        value="{{ old('email') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4 col-md-12">
                                                <label>Teléfono</label>
                                                <div class="mb-3">
                                                    <input type="tel" class="form-control" placeholder="Teléfono"
                                                        name="phone"
                                                        onkeypress="return [45, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57].includes(event.charCode);"
                                                        pattern="[0-9]+" maxlength="10" value="{{ old('phone') }}"
                                                        required>
                                                </div>

                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-12">
                                                <label>Teléfono de contacto</label>
                                                <div class="mb-3">
                                                    <input type="tel" class="form-control"
                                                        placeholder="Teléfono de contacto" {{-- Con esto solo tomamos en cuenta los números, no letras, no símbolos. --}}
                                                        onkeypress="return [45, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57].includes(event.charCode);"
                                                        pattern="[0-9]+" name="contact_phone" maxlength="10" required
                                                        value="{{ old('contact_phone') }}">
                                                </div>

                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-12">
                                                <label>Matrícula</label>
                                                <div class="mb-3">
                                                    <input type="number" class="form-control"
                                                        placeholder="Matrícula" name="matricula" id="matricula"
                                                        value="{{ old('matricula') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-8 col-lg-8 col-md-12">
                                                <label>Programa educativo</label>
                                                <div class="mb-3">
                                                    <select type="select" id="p_id" name="p_id"
                                                        class="form-control" required>
                                                        <option value="0" selected>Seleccione su programa
                                                            educativo</option>
                                                        @foreach ($educativePrograms as $educativeProgram)
                                                            <option
                                                                {{ $educativeProgram->id == old('p_id') ? 'selected' : '' }}
                                                                value="{{ $educativeProgram->id }}">
                                                                {{ $educativeProgram->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-12">
                                                <label>Cuatrimestre y grupo</label>
                                                <div class="mb-3">
                                                    <select type="select" id="areaSelect" name="group_id"
                                                        class="form-control" required>
                                                        <option value="0" selected>Seleccione su cuatrimestre y
                                                            grupo</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="text-center">
                                        <button class="btn bg-gradient-dark-green text-white w-100 my-4 mb-2"
                                            data-bs-toggle="modal" data-bs-target="#modal-form"
                                            onclick="confirm();">Registrarse</button>
                                    </div>
                                    <p class="text-sm mt-3 mb-0">¿Ya te registraste? <span
                                            class="text-dark font-weight-bolder icon-move-right"> Inicia sesión</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--   Core JS Files   -->
    <script src="{{ url('frontend/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ url('frontend/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ url('frontend/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ url('frontend/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ url('frontend/testsAssets/js/jquery-3.2.1.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
        //Selecciona el programa educativo
        const selectElement = document.querySelector('#p_id');
        selectElement.addEventListener('change', (event) => {
            var p_id = document.getElementById('p_id').value;
            //Vacia los datos del select 
            $('#areaSelect').find('option').remove();
            //Busqueda AJAX para rellenar los options correspondientes de cada programa educativo
            $.ajax({
                url: "{{ route('student.getGroups') }}",
                type: 'post',
                data: {
                    p_id: p_id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function(data) {
                    $.each(data, function(key, registro) {
                        $("#areaSelect").append('<option value=' + registro.id + '>' + registro
                            .name + '</option>');
                    });
                }
            });
        });
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
        function register() {
            document.forms["studentRegister"].submit();
        };

        function confirm() {
            val = document.getElementById('studentRegister');
            if (val.reportValidity() && document.getElementById("p_id").value != "0" && document.getElementById(
                    "areaSelect").value != "0") {
                document.getElementById("acceptData").classList.remove("d-none");
                var nom = document.getElementsByName("name")[0].value;
                var apm = document.getElementsByName("family_name")[0].value;
                var app = document.getElementsByName("last_name")[0].value;
                var age = document.getElementsByName("age")[0].value;
                var mail = document.getElementsByName("email")[0].value;
                var phone = document.getElementsByName("phone")[0].value;
                var cphone = document.getElementsByName("contact_phone")[0].value;
                var matri = document.getElementById("matricula").value;
                var pedu = document.getElementsByName("p_id")[0];
                pedu = pedu.options[pedu.selectedIndex].innerText;
                var group = document.getElementsByName("group_id")[0];
                group = group.options[group.selectedIndex].innerText;
                document.getElementById("content_confirm").innerHTML =
                    "<div class='card'><div class='table-responsive'><table class='table table-striped table-hover align-items-center mb-0'><thead><tr><th class='text-uppercase text-dark text-xs font-weight-bolder opacity-7'>Dato</th><th class='text-uppercase text-dark text-xs font-weight-bolder opacity-7 ps-2'>Información</th></tr></thead>" +
                    "<tbody><tr><td><div class='d-flex px-2'><div class='my-auto'><h6 class='mb-0 text-xs'>Nombre</h6></div></div></td><td><p class='text-xs font-weight-bold mb-0'>" + nom + "&nbsp" + apm + "&nbsp" + app +
                    "</p></td></tr><tr><td><div class='d-flex px-2'><div class='my-auto'><h6 class='mb-0 text-xs'>Email</h6></div></div></td><td><p class='text-xs font-weight-bold mb-0'>" + mail +
                    "</p></td></tr><tr><td><div class='d-flex px-2'><div class='my-auto'><h6 class='mb-0 text-xs'>Carrera</h6></div></div></td><td><p class='text-xs font-weight-bold mb-0'>" + pedu +
                    "</p></td></tr><tr><td><div class='d-flex px-2'><div class='my-auto'><h6 class='mb-0 text-xs'>Grupo</h6></div></div></td><td><p class='text-xs font-weight-bold mb-0'>" + group +
                    "</p></td></tr><tr><td><div class='d-flex px-2'><div class='my-auto'><h6 class='mb-0 text-xs'>Matrícula</h6></div></div></td><td><p class='text-xs font-weight-bold mb-0'>" + matri +
                    "</p></td></tr><tr><td><div class='d-flex px-2'><div class='my-auto'><h6 class='mb-0 text-xs'>Télefono</h6></div></div></td><td><p class='text-xs font-weight-bold mb-0'>" + phone +
                    "</p></td></tr><tr><td><div class='d-flex px-2'><div class='my-auto'><h6 class='mb-0 text-xs'>Tél. Contacto</h6></div></div></td><td><p class='text-xs font-weight-bold mb-0'>" + cphone + "</p></td></tr></tbody></table></div></div>";
                document.getElementById("content_confirm").classList.add('text-center', 'mb-4');
            } else {
                document.getElementById("acceptData").classList.add("d-none");
                document.getElementById("content_confirm").classList.add('text-center', 'my-4');
                document.getElementById("content_confirm").innerHTML = "\ <strong>¡Hay campos sin rellenar!</strong>";
            }
        }
    </script>
</body>
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card card-plain">
                    <div class="card-header pb-0 text-center my-2">
                        <h4 class="font-weight-bolder text-warning text-gradient mb-4">¿Estás seguro de la información
                            que ingresaste?</h4>
                        <p class="mb-0 text-sm">Verifica que tu información sea la correcta</p>
                    </div>
                    <div class="card-body">
                        <div id="content_confirm"></div>

                        <div class="text-center">
                            <button class="btn bg-gradient-dark-green btn-lg w-100 mt-4 mb-0 text-white d-none"
                                onclick="register();" id="acceptData">Aceptar</button>
                        </div>
                    </div>
                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                        <p class="mb-0 text-sm mx-auto">
                            <button type="button" class="btn btn-link text-dark ml-auto mb-0"
                                data-bs-dismiss="modal">Cancelar</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</html>
