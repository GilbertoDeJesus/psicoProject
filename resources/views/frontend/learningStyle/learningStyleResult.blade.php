@extends('frontend.layout.main')

@section('css')
    <style>
        ::-webkit-scrollbar {
            width: 8px;
            /* Tamaño del scroll en vertical */
            height: 8px;
            /* Tamaño del scroll en horizontal */

            /* Ocultar scroll */
        }

        ::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.4);
            /* color of the tracking area */
        }

        ::-webkit-scrollbar-thumb {
            background: #fff;
            border-radius: 4px;
        }

        /* Cambiamos el fondo y agregamos una sombra cuando esté en hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #ccc;
            box-shadow: 0 0 2px 1px rgba(0, 0, 0, 0.2);
        }

        /* Cambiamos el fondo cuando esté en active */
        ::-webkit-scrollbar-thumb:active {
            background-color: #b3b3b3;
        }

        .icon-xl i {
            top: -15% !important;
            font-size: 4.75rem !important;
        }
    </style>
@endsection

@section('contenido')
    <div class="page-header min-vh-100"
        style="background-image: url({{ url('frontend/assets/img/curved-images/curved17.png') }});">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center mx-auto">
                    <h4 class="text-white mb-2 mt-7">¡Estos son tus resultados, {{ Str::title(Session::get('nameAlumno')) }}!</h4>
                    <p class="text-lead text-white mb-5">Para finalizar cierra tu sesión dando click en el botón con tu nombre
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12 mb-2 mt-4 mx-auto">
                    <div class="card-group">
                        <div class="card move-on-hover mx-2 rounded-3 mb-4">
                            <div class="card-body px-lg-5 py-lg-5 text-center">
                                <div class="info mb-4">
                                    <div class="icon icon-xl rounded-circle bg-gradient-dark">
                                        <i class="ni ni-hat-3 text-success text-gradient"></i>
                                    </div>
                                </div>
                                <div class="text-center text-muted text-dark-green text-gradient mx-2">
                                    <h4>{{ $careerResults1->name }}</h4>
                                </div>
                            </div>
                            <div class="card-footer text-center bg-gradient-dark-green">
                                <p class="text-lighter text-white t h5 ">Opción 1</p>
                            </div>
                        </div>
                        <div class="card move-on-hover mx-2 rounded-3 mb-4">
                            <div class="card-body px-lg-5 py-lg-5 text-center">
                                <div class="info mb-4">
                                    <div class="icon icon-xl rounded-circle bg-gradient-dark">
                                        <i class="ni ni-hat-3 text-success text-gradient"></i>
                                    </div>
                                </div>
                                <div class="text-center text-muted text-dark-green text-gradient mx-2">
                                    <h4>{{ $careerResults2->name }}</h4>
                                </div>
                            </div>
                            <div class="card-footer text-center bg-gradient-dark-green">
                                <p class="text-lighter text-white t h5 ">Opción 2</p>
                            </div>
                        </div>
                        <div class="card move-on-hover mx-2 rounded-3 mb-4">
                            <div class="card-body px-lg-5 py-lg-5 text-center">
                                <div class="info mb-4">
                                    <div class="icon icon-xl rounded-circle bg-gradient-dark">
                                        <i class="ni ni-hat-3 text-success text-gradient"></i>
                                    </div>
                                </div>
                                <div class="text-center text-muted text-dark-green text-gradient mx-2">
                                    <h4>{{ $careerResults3->name }}</h4>
                                </div>
                            </div>
                            <div class="card-footer text-center bg-gradient-dark-green">
                                <p class="text-lighter text-white t h5 ">Opción 3</p>
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
@endsection

@section('js')
@endsection
