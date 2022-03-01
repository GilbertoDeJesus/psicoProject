@extends('frontend.layout.main')

@section('css')
    
@endsection

@section('contenido')

<div class="page-header align-items-start min-vh-100 bg-gradient-info pt-9">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center mx-auto">
                <h2 class="text-white mb-2">Tu estilo de aprendizaje es</h2>
            </div>
            {{-- Kinestésico --}}
            <div class="col-lg-12 mb-4 mt-5">{{-- Si el resultado es Kinestésico se muestra este --}}
                <div class="card rounded-circle max-width-200 min-height-200 mx-auto bg-transparent border-2 border-white">
                    <div class="text-center my-auto">
                        <h1 class="text-white my-auto">
                            <i class="ni ni-user-run"></i>
                        </h1>
                        <h4 class="text-white mb-0">Kinestésico</h4>
                    </div>
                </div>
            </div>
            {{-- Visual --}}
            <div class="col-lg-12 mb-4 mt-5 d-none"> {{-- Si el resultado es visual se muestra este --}}
                <div class="card rounded-circle max-width-200 min-height-200 mx-auto bg-transparent border-2 border-white">
                    <div class="text-center my-auto">
                        <h1 class="text-white my-auto">
                            <i class="icon-eye"></i>
                        </h1>
                        <h4 class="text-white mb-0">Visual</h4>
                    </div>
                </div>
            </div>
            {{-- Auditivo --}}
            <div class="col-lg-12 mb-4 mt-5 d-none"> {{-- Si el resultado es auditivo se muestra este --}}
                <div class="card rounded-circle max-width-200 min-height-200 mx-auto bg-transparent border-2 border-white">
                    <div class="text-center my-auto">
                        <h1 class="text-white my-auto">
                            <i class="icon-volume-high"></i>
                        </h1>
                        <h4 class="text-white mb-0">Auditivo</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 text-center mx-auto">
                <h4 class="text-white mb-2">Puedes pertenecer a estas tres carreras 
                    según tu cuestionario vocacional:</h4>
            </div>
            <div class="col-lg-12 mb-2 mt-5 mx-auto">
                <div class="row">
                    <div class="col-md-4 mb-1">
                        <div class="card card-pricing">
                            <div class="bg-gradient-dark-green text-center pt-4 pb-3 position-relative rounded-3">
                                <div class="z-index-1 position-relative">
                                    <h5 class="text-white">Enfermeria</h5>
                                    <h1 class="text-white mt-3 mb-0">
                                        <i class="ni ni-hat-3"></i>
                                    </h1>
                                    <h6 class="text-white">Opción 1</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-1">
                        <div class="card card-pricing">
                            <div class="bg-gradient-faded-white text-center pt-4 pb-3 position-relative rounded-3">
                                <div class="z-index-1 position-relative">
                                    <h5 class="text-dark">Tecnologias de la información</h5>
                                    <h1 class="text-dark mt-3 mb-0">
                                        <i class="ni ni-hat-3"></i>
                                    </h1>
                                    <h6 class="text-dark">Opción 2</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-1">
                        <div class="card card-pricing">
                            <div class="bg-gradient-dark text-center pt-4 pb-3 position-relative rounded-3">
                                <div class="z-index-1 position-relative">
                                    <h5 class="text-white">Mecatronica</h5>
                                    <h1 class="text-white mt-3 mb-0">
                                        <i class="ni ni-hat-3"></i>
                                    </h1>
                                    <h6 class="text-white">Opción 3</h6>
                                </div>
                            </div>
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
