@extends('backend.layout.main')

@section('contenido')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-car icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Bienvenido Jhon Doe
                    <div class="page-title-subheading">A continuación se presentan los informes de las entradas y salidas del
                        personal
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
                        <div class="widget-heading">Total de entradas</div>
                        <div class="widget-subheading">Entradas del día {{ now()->format('d/m/Y') }}</div>
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
                        <div class="widget-heading">Entradas a tiempo</div>
                        <div class="widget-subheading">Total de entradas tempranas</div>
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
                        <div class="widget-heading">Retardos</div>
                        <div class="widget-subheading">Total de entradas tarde</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>46</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Entradas registradas hoy
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
                                <th class="text-center">Hora de entrada</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center text-muted">#345</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img width="40" class="rounded-circle"
                                                        src="{{ url('backend/images/avatars/4.jpg') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">John Doe</div>
                                                <div class="widget-subheading opacity-7">Web Developer
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">06:01 p.m.</td>
                                <td class="text-center">
                                    <div class="badge badge-success">A tiempo</div>
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
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img width="40" class="rounded-circle"
                                                        src="{{ url('backend/images/avatars/3.jpg') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">Ruben Tillman</div>
                                                <div class="widget-subheading opacity-7">Etiam sit amet
                                                    orci eget</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">06:20 p.m.</td>
                                <td class="text-center">
                                    <div class="badge badge-success">A tiempo</div>
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
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img width="40" class="rounded-circle"
                                                        src="{{ url('backend/images/avatars/2.jpg') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">Elliot Huber</div>
                                                <div class="widget-subheading opacity-7">Lorem ipsum
                                                    dolor sic</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">06:32 p.m.</td>
                                <td class="text-center">
                                    <div class="badge badge-danger">Tarde</div>
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
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img width="40" class="rounded-circle"
                                                        src="{{ url('backend/images/avatars/1.jpg') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">Vinnie Wagstaff</div>
                                                <div class="widget-subheading opacity-7">UI Designer
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">06:25 p.m.</td>
                                <td class="text-center">
                                    <div class="badge badge-success">A tiempo</div>
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
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="card-shadow-danger mb-3 widget-chart widget-chart2 text-left card">
                <div class="widget-content">
                    <div class="widget-content-outer">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left pr-2 fsize-1">
                                <div class="widget-numbers mt-0 fsize-3 text-danger">11%</div>
                            </div>
                            <div class="widget-content-right w-100">
                                <div class="progress-bar-xs progress">
                                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="11"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 11%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left fsize-1">
                            <div class="text-muted opacity-6">Entradas tarde</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card-shadow-success mb-3 widget-chart widget-chart2 text-left card">
                <div class="widget-content">
                    <div class="widget-content-outer">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left pr-2 fsize-1">
                                <div class="widget-numbers mt-0 fsize-3 text-success">84%</div>
                            </div>
                            <div class="widget-content-right w-100">
                                <div class="progress-bar-xs progress">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="84"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 84%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left fsize-1">
                            <div class="text-muted opacity-6">Entradas a tiempo</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card-shadow-warning mb-3 widget-chart widget-chart2 text-left card">
                <div class="widget-content">
                    <div class="widget-content-outer">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left pr-2 fsize-1">
                                <div class="widget-numbers mt-0 fsize-3 text-warning">5%</div>
                            </div>
                            <div class="widget-content-right w-100">
                                <div class="progress-bar-xs progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="5"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 5%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left fsize-1">
                            <div class="text-muted opacity-6">Empleados faltantes</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card-shadow-info mb-3 widget-chart widget-chart2 text-left card">
                <div class="widget-content">
                    <div class="widget-content-outer">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left pr-2 fsize-1">
                                <div class="widget-numbers mt-0 fsize-3 text-info">95%</div>
                            </div>
                            <div class="widget-content-right w-100">
                                <div class="progress-bar-xs progress">
                                    <div class="progress-bar bg-info" role="progressbar" aria-valuenow="95"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 95%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left fsize-1">
                            <div class="text-muted opacity-6">Total de aistencia</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
