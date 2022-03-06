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
                                <h4 class="text-bold text-dark">Bienvenido, <span style="font-weight: 600;">Jhon Doe</span>
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
                        <div class="widget-numbers text-warning"><span>1896</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-grow-early">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Orientacion Vocacional</div>
                        <div class="widget-subheading">Cuestionarios respondidos</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>568</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-danger">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Trayectoria academica</div>
                        <div class="widget-subheading">Cuestionarios respondidos</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>46</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="main-card mb-3 card">
                <div class="card-header">Alumnos registrados hoy
                    <div class="btn-actions-pane-right">
                        <div role="group" class="btn-group-sm btn-group">
                            <button class="active btn btn-focus">Ver todo</button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Nombre</th>
                                <th>Programa educativo</th>
                                <th class="text-center">Matrícula</th>
                                <th class="text-center">Grupo</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center text-muted">#345</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">John Doe</div>
                                                <div class="widget-subheading opacity-7">Web Developer
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>Desarrollo y gestión de software</td>
                                <td class="text-center">3519110001</td>
                                <td class="text-center">
                                    <div class="badge badge-success">8° A</div>
                                </td>
                                <td class="text-center">
                                    <button type="button" id="PopoverCustomT-1"
                                        class="btn btn-primary btn-sm">Detalles</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center text-muted">#347</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">Ruben Tillman</div>
                                                <div class="widget-subheading opacity-7">Etiam sit amet
                                                    orci eget</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>Desarrollo y gestión de software</td>
                                <td class="text-center">3519110001</td>
                                <td class="text-center">
                                    <div class="badge badge-success">5° A</div>
                                </td>
                                <td class="text-center">
                                    <button type="button" id="PopoverCustomT-2"
                                        class="btn btn-primary btn-sm">Detalles</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center text-muted">#321</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">Elliot Huber</div>
                                                <div class="widget-subheading opacity-7">Lorem ipsum
                                                    dolor sic</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>Desarrollo y gestión de software</td>
                                <td class="text-center">3519110001</td>
                                <td class="text-center">
                                    <div class="badge badge-success">3° A</div>
                                </td>
                                <td class="text-center">
                                    <button type="button" id="PopoverCustomT-3"
                                        class="btn btn-primary btn-sm">Detalles</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center text-muted">#55</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">Vinnie Wagstaff</div>
                                                <div class="widget-subheading opacity-7">UI Designer
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>Desarrollo y gestión de software</td>
                                <td class="text-center">3519110001</td>
                                <td class="text-center">
                                    <div class="badge badge-success">1° B</div>
                                </td>
                                <td class="text-center">
                                    <button type="button" id="PopoverCustomT-4"
                                        class="btn btn-primary btn-sm">Detalles</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-block text-center card-footer">
                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-primary"><i
                            class="pe-7s-refresh-2 btn-icon-wrapper"> </i></button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ url('backend/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ url('backend/js/reloj.js') }}"></script>
@endsection
