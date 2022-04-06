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
    <div class="page-header align-items-start min-vh-100 bg-gradient-info pt-6"
        style="background-image: url({{ url('frontend/assets/img/curved-images/curved5.jpg') }});">
        {{-- <span class="mask bg-gradient-dark opacity-7"></span> --}}
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center mx-auto">
                    <div class="row">
                        <div class="col-lg-5 mx-auto">
                            <div class="card card-pricing rounded-2">
                                <div class="text-center position-relative">
                                    <div class="z-index-1 position-relative">
                                        <h3 class="text-dark text-gradient my-3">Tu estilo de aprendizaje es</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($learningResult == 'Kinestésico')
                    {{-- Kinestésico --}}
                    <div class="col-lg-12 mb-5 mt-5">{{-- Si el resultado es Kinestésico se muestra este --}}
                        <div
                            class="card rounded-circle max-width-200 min-height-200 mx-auto bg-transparent border-2 border-white">
                            <div class="text-center my-auto">
                                <h1 class="text-white my-auto">
                                    <i class="ni ni-user-run"></i>
                                </h1>
                                <h4 class="text-white mb-0">Kinestésico</h4>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($learningResult == 'Visual')
                    {{-- Visual --}}
                    <div class="col-lg-12 mb-5 mt-5"> {{-- Si el resultado es visual se muestra este --}}
                        <div
                            class="card rounded-circle max-width-200 min-height-200 mx-auto bg-transparent border-2 border-white">
                            <div class="text-center my-auto">
                                <h1 class="text-white my-auto">
                                    <i class="icon-eye"></i>
                                </h1>
                                <h4 class="text-white mb-0">Visual</h4>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($learningResult == 'Auditivo')
                    {{-- Auditivo --}}
                    <div class="col-lg-12 mb-5 mt-5"> {{-- Si el resultado es auditivo se muestra este --}}
                        <div
                            class="card rounded-circle max-width-200 min-height-200 mx-auto bg-transparent border-2 border-white">
                            <div class="text-center my-auto">
                                <h1 class="text-white my-auto">
                                    <i class="icon-volume-high"></i>
                                </h1>
                                <h4 class="text-white mb-0">Auditivo</h4>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="col-lg-12 text-center mx-auto">
                    <h4 class="text-white mb-2">Puedes pertenecer a estas tres carreras
                        según tu cuestionario vocacional:</h4>
                </div>
                <div class="col-lg-12 mb-2 mt-5 mx-auto">
                    <div class="card-group">
                        <div class="card move-on-hover mx-2 rounded-3">
                            <div class="card-body pt-4 pb-2 text-center">
                                <div class="bg-gradient-dark-green text-center pt-4 pb-3 px-2 position-relative rounded-3">
                                    <div class="z-index-1 position-relative">
                                        <h1 class="mt-3 mb-0">
                                            <i class="ni ni-hat-3 text-dark text-gradient"></i>
                                        </h1>
                                        <h4 class="text-white">{{ $careerResults1->name }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <h5 class="pb-0 text-dark text-gradient">Opción 1</h5>
                            </div>
                        </div>
                        <div class="card move-on-hover mx-2 rounded-3">
                            <div class="card-body pt-4 pb-2 text-center">
                                <div class="bg-gradient-dark-green text-center pt-4 pb-3 px-2 position-relative rounded-3">
                                    <div class="z-index-1 position-relative">
                                        <h1 class="mt-3 mb-0">
                                            <i class="ni ni-hat-3 text-dark text-gradient"></i>
                                        </h1>
                                        <h4 class="text-white">{{ $careerResults2->name }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <h5 class="pb-0 text-dark text-gradient">Opción 2</h5>
                            </div>
                        </div>
                        <div class="card move-on-hover mx-2 rounded-3">
                            <div class="card-body pt-4 pb-2 text-center">
                                <div class="bg-gradient-dark-green text-center pt-4 pb-3 px-2 position-relative rounded-3">
                                    <div class="z-index-1 position-relative">
                                        <h1 class="mt-3 mb-0">
                                            <i class="ni ni-hat-3 text-dark text-gradient"></i>
                                        </h1>
                                        <h4 class="text-white">{{ $careerResults3->name }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <h5 class="pb-0 text-dark text-gradient">Opción 3</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 text-center mx-auto mb-4">
                    <a href="{{ route('students.tests') }}" class="btn bg-gradient-dark btn-lg mt-6 mb-0">
                        Aceptar
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
