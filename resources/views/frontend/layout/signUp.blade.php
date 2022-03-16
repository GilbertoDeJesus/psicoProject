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
    <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent mt-4">
        <div class="container">
          <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="javascript:;">
            <img src="{{ url('frontend/assets/img/logo_2020p.png') }}" class="navbar-brand-img h-100" alt="main_logo" style="max-height: 30px; filter: drop-shadow(2px 3px 3px black);">
          </a>
          <div class="px-1" id="navigation">
            <ul class="navbar-nav mx-auto"></ul>
            <ul class="navbar-nav">
              <li class="nav-item dropdown pe-2 d-flex align-items-center">
                <a href="javascript:;" class="btn btn-sm  bg-gradient-dark  btn-round mb-0 me-1">{{now()->isoFormat('DD/MM/YYYY') }}</a>
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
                            <h5>Registrar alumno</h5>
                        </div>
                        <div class="card-body mx-2">
                            <form role="form text-left" method="POST" action="{{ route('student.storeStudent') }}">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (isset($message))
                                    <div class="alert alert-danger">
                                        <ul>
                                        <li>{{$message}}</li>
                                        </ul>
                                    </div>
                                @endif
                                
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-12">
                                        <label>Nombre</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control " placeholder="Nombre" name="name"
                                                required>
                                        </div>
                                        
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12">
                                        <label>Apellido paterno</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Apellido paterno"
                                                name="family_name" required>
                                        </div>
                                       
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12">
                                        <label>Apellido materno</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Apellido materno"
                                                name="last_name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-4">
                                        <label>Edad</label>
                                        <div class="mb-3">
                                            <input type="number" class="form-control" placeholder="Edad" name="age"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8">
                                        <label>Email institucional</label>
                                        <div class="mb-3">
                                            <input type="email" class="form-control" placeholder="Email institucional"
                                                name="email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-12">
                                        <label>Teléfono</label>
                                        <div class="mb-3">
                                            <input type="tel" class="form-control" placeholder="Teléfono" name="phone"
                                            onkeypress="return [45, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57].includes(event.charCode);"
                                            pattern="[0-9]+" maxlength="10"  required>
                                        </div>
                                    
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12">
                                        <label>Teléfono de contacto</label>
                                        <div class="mb-3">
                                            <input type="tel" class="form-control" placeholder="Teléfono de contacto"
                                            {{-- Con esto solo tomamos en cuenta los números, no letras, no símbolos. --}}
                                            onkeypress="return [45, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57].includes(event.charCode);"
                                            pattern="[0-9]+" name="contact_phone" maxlength="10" required>
                                        </div>
                                        
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12">
                                        <label>Matrícula</label>
                                        <div class="mb-3">
                                            <input type="number" class="form-control" placeholder="Matrícula" name="matricula"
                                                required>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-8 col-lg-8 col-md-12">
                                        <label>Programa educativo</label>
                                        <div class="mb-3">
                                            <select type="select" id="p_id" name="p_id" class="form-control"
                                                required>
                                                <option value="1" selected>Seleccione su programa educativo</option>
                                                @foreach ($educativePrograms as $educativeProgram)  
                                                <option value="{{$educativeProgram->id}}">{{$educativeProgram->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12">
                                        <label>Cuatrimestre y grupo</label>
                                        <div class="mb-3">
                                            <select type="select" id="areaSelect" name="group_id" class="form-control"
                                                required>
                                                <option value="1" selected>Seleccione su cuatrimestre y grupo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit"
                                        class="btn bg-gradient-dark-green text-white w-100 my-4 mb-2">Registrarse</button>
                                </div>
                                <p class="text-sm mt-3 mb-0">¿Ya te registraste? <a href="javascript:;"
                                        class="text-dark font-weight-bolder icon-move-right" data-bs-toggle="modal"
                                        data-bs-target="#modal-form"> Inicia sesión</a></p>
                            </form>
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
            var p_id = document.getElementById('p_id').value ;
            //Vacia los datos del select 
            $('#areaSelect').find('option').remove();
            //Busqueda AJAX para rellenar los options correspondientes de cada programa educativo
            $.ajax({
                url: "{{route("student.getGroups")}}",
                type: 'post',
                data: { p_id: p_id},
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                dataType: 'json',
                    success: function (data) {
                        $.each(data,function(key, registro) {
                            $("#areaSelect").append('<option value='+registro.id+'>'+registro.name+'</option>');
                        });
                    }
            });
        });
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card card-plain">
                    <div class="card-header pb-0 text-center">
                        <h4 class="font-weight-bolder text-info text-gradient">Bienvenido de nuevo</h4>
                        <p class="mb-0 text-sm">Ingresa tu matricula y contraseña para iniciar sesión</p>
                    </div>
                    <div class="card-body">
                        <form role="form text-left" method="POST" action="{{ route('student.log-in') }}">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            @endif
                            <label>Matricula</label>
                            <div class="input-group mb-3">
                                <input type="number" name="matricula" class="form-control" placeholder="Matricula" aria-label="Email">
                            </div>
                            <label>Contraseña</label>
                            <div class="input-group mb-3">
                                <input type="password"  name="password" class="form-control" placeholder="Contraseña" aria-label="Password" autocomplete="false">
                            </div>
                            <div class="text-center">
                                <button type="submit"
                                    class="btn bg-gradient-dark-green btn-lg w-100 mt-4 mb-0 text-white">Iniciar
                                    sesión</button>
                            </div>
                        </form>
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