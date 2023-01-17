@extends('backend.layout.main')

@section('links')
    <link rel="stylesheet" href="{{ url('backend/css/clock.css') }}">
@endsection

@section('contenido')
    <div class="app-page-title">
        <div class="row">
            <div class="col-sm-6 col-md-8 col-xl-8">
                <div class="card mb-3 rounded-2 py-3 px-2 card-shadow-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-7">
                                <h4 class="text-bold text-dark">Bienvenid@, <span style="font-weight: 600;">{{ Str::limit(auth()->user()->name, 10, '.') }}</span>
                                </h4>
                                <p class="page-title-subheading mb-2">A continuación se presentan los informes de los alumnos
                                </p>
                                <p class="page-title-subheading">Registrados del día <span
                                        class="text-primary">{{ now()->format('d/m/Y') }}</span></p>
                            </div>
                            <div class="col-lg-5 pl-0">
                                <img src="{{ url('backend/images/inicio1.svg') }}" alt="inicio" class="w-100 my-auto">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-xl-4">
                <div class="card mb-3 rounded-2 py-3 card-shadow-primary card-btm-border border-primary">
                    <div class="card-body pb-2">
                        <div class="contenedor">
                            <div class="widget">
                                <div class="reloj">
                                    <p id="horas" class="horas" style="font-size: 4em;"></p>
                                    <p style="font-size: 4em;">:</p>
                                    <p id="minutos" class="minutos" style="font-size: 4em;"></p>
                                    <div class="cajaSegundos">
                                        <p id="ampm" class="ampm"></p>
                                    </div>
                                </div>
                                <div class="fecha">
                                    <p id="diaSemana" class="diaSemana"></p>
                                    <p id="dia" class="dia"></p>
                                    <p>de</p>
                                    <p id="mes" class="mes"></p>
                                    <p>del</p>
                                    <p id="anio" class="anio"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-premium-dark">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Estilo de aprendizaje</div>
                        <div class="widget-subheading">Cuestionarios respondidos</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-warning"><span>{{$aprendizaje}}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-grow-early">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Orientación Vocacional</div>
                        <div class="widget-subheading">Cuestionarios respondidos</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{$orientacion}}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-danger">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Trayectoria académica</div>
                        <div class="widget-subheading">Cuestionarios respondidos</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{$academico}}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-12 mb-3">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    Alumnos registrados hoy
                </div>
                @if (session('alerta'))
                <div class="alert alert-secondary fade alert-dismissible show" role="alert">
                    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span></button>
                    {{ session('alerta') }}
                </div>
                @endif
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                             <tr>
                                <td class="text-center text-muted">{{$student->id}}</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                        </div>
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">{{$student->name}}</div>
                                            <div class="widget-subheading opacity-7">{{$student->family_name}}
                                            </div>
                                        </div>
                                    </div>

                                </td>
                                <td class="text-center">
                                    {{$student->email}}
                                </td>
                                <td class="text-center">
                                    @canany(['Ver info alumno sencillo', 'Ver info de alumno avanzado'])
                                    <a href="{{ route('admin.student.info', ['student' => $student->id]) }}" id="PopoverCustomT-1"
                                        class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top"
                                        title="Detalles">
                                        Detalles
                                    </a>
                                    @endcanany
                                </td>
                            </tr>

                            @empty
                            <h6 class="text-center">No hay alumnos inscritos aquí</h6>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-block text-center card-footer">
                    <div class="container">
                        <div class="row">
                          <div class="col">
                            {{ $students->links('vendor.pagination.default') }}
                          </div>
                          <div class="col order-1">
                            <a href="{{route('admin')}}" class="mr-2 btn-icon btn-icon-only btn btn-outline-primary"><i
                                class="pe-7s-refresh-2 btn-icon-wrapper"> </i></a>
                          </div>
                          <div class="col order-5">

                        </div>
                        </div>
                      </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ url('backend/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ url('backend/js/reloj.js') }}"></script>
@endsection
