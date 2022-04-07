@extends('frontend.layout.main')

@section('css')
    
@endsection

@section('contenido')
    <div class="page-header align-items-start min-vh-50 pt-5 pb-10 m-3 border-radius-lg"
        style="background-image: url('{{ url('frontend/assets/img/curved-images/curved5.jpg') }}');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 text-center mx-auto">
                    @if ($aprendizaje == 1 && $vocacional == 1 && $trayectoria == 1)
                        <h4 class="text-white mb-2 mt-7">¡Ya has contestado todos los cuestionarios!</h4>
                        <a href="{{ route('students.results') }}" type="button" class="btn bg-gradient-dark-green btn-lg w-100 mt-4 mb-5 text-white"
                        data-bs-dismiss="modal">Consulta tus resultados</a>
                    @else
                        <h4 class="text-white mb-2 mt-7">¡Bienvenido, {{ Str::title(Session::get('nameAlumno')) }}!</h4>
                        <p class="text-lead text-white mb-5">Puedes consultar tu contraseña en el botón con tu nombre
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
            <div class="col-md-4 mb-4">
                <div class="card card-pricing">
                    <div class="card-header bg-gradient-info text-center pt-4 pb-5 position-relative">
                        <div class="z-index-1 position-relative">
                            <h5 class="text-white">Estilo de aprendizaje</h5>
                            <h1 class="text-white mt-3 mb-1">
                                <i class="ni ni-ruler-pencil"></i>
                            </h1>
                            <h6 class="text-dark"><span class="badge bg-white text-dark">{{$aprendizaje == 1 ? 'Contestado' : 'Sin contestar'}}</span></h6>
                        </div>
                    </div>
                    <div class="position-relative mt-n5" style="height: 50px;">
                        <div class="position-absolute w-100">
                            <svg class="waves waves-sm" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none"
                                shape-rendering="auto">
                                <defs>
                                    <path id="card-wave"
                                        d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
                                </defs>
                                <g class="moving-waves">
                                    <use xlink:href="#card-wave" x="48" y="-1" fill="rgba(255,255,255,0.30"></use>
                                    <use xlink:href="#card-wave" x="48" y="3" fill="rgba(255,255,255,0.35)"></use>
                                    <use xlink:href="#card-wave" x="48" y="5" fill="rgba(255,255,255,0.25)"></use>
                                    <use xlink:href="#card-wave" x="48" y="8" fill="rgba(255,255,255,0.20)"></use>
                                    <use xlink:href="#card-wave" x="48" y="13" fill="rgba(255,255,255,0.15)"></use>
                                    <use xlink:href="#card-wave" x="48" y="16" fill="rgba(255,255,255,0.99)"></use>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <ul class="list-unstyled max-width-200 mx-auto">
                            <li>
                                <b>Cuestionario</b> de estilo de aprendizaje
                                <hr class="horizontal dark">
                            </li>
                        </ul>
                        <a href="{{ route('students.learnigStyle') }}" class="btn bg-gradient-dark w-100 mt-4 mb-0 {{$aprendizaje == 1 ? 'disabled' : ''}}">
                            Comenzar
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card card-pricing">
                    <div class="card-header bg-gradient-dark-green text-center pt-4 pb-5 position-relative">
                        <div class="z-index-1 position-relative">
                            <h5 class="text-white">Orientación vocacional</h5>
                            <h1 class="text-white mt-3 mb-1">
                                <i class="ni ni-briefcase-24"></i>
                            </h1>
                            <h6 class="text-dark"><span class="badge bg-white text-dark">{{$vocacional == 1 ? 'Contestado' : 'Sin contestar'}}</span></h6>
                        </div>
                    </div>
                    <div class="position-relative mt-n5" style="height: 50px;">
                        <div class="position-absolute w-100">
                            <svg class="waves waves-sm" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none"
                                shape-rendering="auto">
                                <defs>
                                    <path id="card-wave"
                                        d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
                                </defs>
                                <g class="moving-waves">
                                    <use xlink:href="#card-wave" x="48" y="-1" fill="rgba(255,255,255,0.30"></use>
                                    <use xlink:href="#card-wave" x="48" y="3" fill="rgba(255,255,255,0.35)"></use>
                                    <use xlink:href="#card-wave" x="48" y="5" fill="rgba(255,255,255,0.25)"></use>
                                    <use xlink:href="#card-wave" x="48" y="8" fill="rgba(255,255,255,0.20)"></use>
                                    <use xlink:href="#card-wave" x="48" y="13" fill="rgba(255,255,255,0.15)"></use>
                                    <use xlink:href="#card-wave" x="48" y="16" fill="rgba(255,255,255,0.99)"></use>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <ul class="list-unstyled max-width-200 mx-auto">
                            <li>
                                <b>Cuestionario</b> de orientación vocacional
                                <hr class="horizontal dark">
                            </li>
                        </ul>
                        @if( $aprendizaje == 1 )
                            <a href="{{ route('students.vocational') }}" class="btn bg-gradient-dark w-100 mt-4 mb-0 {{$vocacional == 1 ? 'disabled' : ''}}">
                                Comenzar
                            </a>
                        @else
                            <a href="javascript:;" class="btn bg-gradient-dark w-100 mt-4 mb-0" data-bs-toggle="modal"
                            data-bs-target="#modal-warning-1">
                                Comenzar
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card card-pricing">
                    <div class="card-header bg-gradient-dark text-center pt-4 pb-5 position-relative">
                        <div class="z-index-1 position-relative">
                            <h5 class="text-white">Trayectoria académica</h5>
                            <h1 class="text-white mt-3 mb-1">
                                <i class="ni ni-hat-3"></i>
                            </h1>
                            <h6 class="text-dark"><span class="badge bg-white text-dark">{{$trayectoria == 1 ? 'Contestado' : 'Sin contestar'}}</span></h6>
                        </div>
                    </div>
                    <div class="position-relative mt-n5" style="height: 50px;">
                        <div class="position-absolute w-100">
                            <svg class="waves waves-sm" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none"
                                shape-rendering="auto">
                                <defs>
                                    <path id="card-wave"
                                        d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
                                </defs>
                                <g class="moving-waves">
                                    <use xlink:href="#card-wave" x="48" y="-1" fill="rgba(255,255,255,0.30"></use>
                                    <use xlink:href="#card-wave" x="48" y="3" fill="rgba(255,255,255,0.35)"></use>
                                    <use xlink:href="#card-wave" x="48" y="5" fill="rgba(255,255,255,0.25)"></use>
                                    <use xlink:href="#card-wave" x="48" y="8" fill="rgba(255,255,255,0.20)"></use>
                                    <use xlink:href="#card-wave" x="48" y="13" fill="rgba(255,255,255,0.15)"></use>
                                    <use xlink:href="#card-wave" x="48" y="16" fill="rgba(255,255,255,0.99)"></use>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <ul class="list-unstyled max-width-200 mx-auto">
                            <li>
                                <b>Cuestionario</b> de trayectoria académica
                                <hr class="horizontal dark">
                            </li>
                        </ul>
                        @if ($vocacional == 1)
                            <a href="{{ route('students.trajectory') }}" class="btn bg-gradient-dark w-100 mt-4 mb-0 {{$trayectoria == 1 ? 'disabled' : ''}}">
                                Comenzar
                            </a>
                        @else
                            <a href="javascript:;" class="btn bg-gradient-dark w-100 mt-4 mb-0" data-bs-toggle="modal"
                            data-bs-target="#modal-warning-2">
                                Comenzar
                            </a>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
