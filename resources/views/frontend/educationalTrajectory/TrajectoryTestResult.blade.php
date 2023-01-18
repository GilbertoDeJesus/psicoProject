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
    </style>
@endsection

@section('contenido')
    <main class="main-content mt-0 ps">
        <div>
            <section class="min-vh-100 d-flex align-items-center">
                <div class="container">
                    @if ($status == 1)
                        <div class="row mt-lg-0 mt-8">
                            <div class="col-lg-5 my-auto">
                                <h1 class="display-1 text-bolder text-gradient text-success fadeIn1 fadeInBottom mt-5">Oops!
                                </h1>
                                <h2 class="fadeIn3 fadeInBottom opacity-8">{{Session::get('nameAlumno')}}</h2>
                                <p class="lead opacity-6 fadeIn2 fadeInBottom">Has alcanzado el maximo de respuestas para este cuestionario.</p>
                                <a class="btn bg-gradient-warning mt-4 fadeIn2 fadeInBottom" href="{{ route('student.log-out') }}">Salir</a>
                            </div>
                            <div class="col-lg-7 my-auto">
                                <img class="w-100 fadeIn1 fadeInBottom" src="{{ url('frontend/assets/img/finalized.svg') }}"
                                    alt="500-error">
                            </div>
                        </div>
                    @else
                        <div class="row mt-lg-0 mt-8">
                            <div class="col-lg-5 my-auto">
                                <h1 class="display-1 text-bolder text-gradient text-dark-green fadeIn1 fadeInBottom mt-5">Gracias!
                                </h1>
                                <h2 class="fadeIn3 fadeInBottom opacity-8">{{Session::get('nameAlumno')}}</h2>
                                <p class="lead opacity-6 fadeIn2 fadeInBottom">Se han enviado tus respuestas y has finalizado el cuestionario.</p>
                                <a class="btn bg-gradient-dark-green text-white mt-4 fadeIn2 fadeInBottom" href="{{ route('student.log-out') }}">Salir</a>
                            </div>
                            <div class="col-lg-7 my-auto">
                                <img class="w-100 fadeIn1 fadeInBottom" src="{{ url('frontend/assets/img/finalized_1.svg') }}"
                                    alt="500-error">
                            </div>
                        </div>
                    @endif
                </div>
            </section>
        </div>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
        </div>
    </main>
@endsection

@section('js')
@endsection
