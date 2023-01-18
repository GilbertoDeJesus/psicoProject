@extends('backend.layout.main')

@section('links')
    <link rel="stylesheet" href="{{ url('backend/css/datatable.css') }}">
@endsection

@section('css')
    <style>
        ::-webkit-file-upload-button {
            font: inherit;
            -webkit-appearance: button;
        }

        .form-group .file-upload-default {
            visibility: hidden;
            position: absolute;
        }

        .form-group .file-upload-info {
            background: transparent;
        }

    </style>
@endsection

@section('contenido')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Información del alumno
                    <div class="page-title-subheading">
                        <nav class="" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Aspirantes</a></li>
                                <li class="active breadcrumb-item" aria-current="page">Información</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5">
            <div class="card-shadow-primary profile-responsive card-border mb-3 card">
                <div class="dropdown-menu-header">
                    <div class="dropdown-menu-header-inner bg-primary">
                        <div class="menu-header-content btn-pane-right">
                            <div class="avatar-icon-wrapper mr-3 avatar-icon-xl">
                                <div class="avatar-icon rounded-circle">
                                    <img src="{{ url('backend/images/avatars/9.png') }}" alt="Avatar 5">
                                </div>
                            </div>
                            <div>
                                <h5 class="menu-header-title">{{Str::title($student->name)}} {{Str::title($student->family_name)}} {{Str::title($student->last_name)}}</h5>
                                <h6 class="menu-header-subtitle">{{$student->email}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="p-0 list-group-item">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="mb-0 table table-striped table-hover table-borderless mt-1">
                                    <thead>
                                        <tr>
                                            <th class="px-4">Carreras con afinidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($student->result->test_orientacional1_id !=  null)
                                            <tr>
                                                <td class="px-4">{{$student->result->educativeProgramTestOrientacional1->name}}</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4">{{$student->result->educativeProgramTestOrientacional2->name}}</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4">{{$student->result->educativeProgramTestOrientacional3->name}}</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td class="px-4">Aún no hay respuestas del alumno</td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-7">
            @if (session('status'))
                <div class="alert alert-success fade alert-dismissible show" role="alert">
                    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span></button>
                    {{ session('status') }}
                </div>
            @endif
            <div class="main-card mb-3 card card-shadow-primary">
                <div class="card-header bg-primary text-white">Información básica
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                                <label for="email" class="">Email</label><input name="email"
                                    id="email" type="text" class="form-control" disabled
                                    value="{{$student->email}}" />
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="edad" class="">Edad</label><input name="edad" id="edad"
                                    type="text" class="form-control" disabled value="{{$student->age}}" />
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="telefonoC" class="">Teléfono de contacto</label><input
                                    name="telefonoC" id="telefonoC" type="text" class="form-control" disabled
                                    value="{{$student->contact_phone}}" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-block text-center card-footer p-3">

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="conatiner card">
                <div class="card-header text-dark">
                    <div class="mx-auto">
                        Respuestas de cuestionarios
                    </div>
                </div>
                <div class="card-body">
                    <ul class="tabs-animated-shadow tabs-animated nav nav-justified tabs-rounded-lg">
                        <li class="nav-item">
                            <a role="tab" class="nav-link mb-0 active show" href="#orientacion-vocacional" data-toggle="tab" aria-selected="false">
                                <span>Orientación vocacional</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane tabs-animation fade show active" id="orientacion-vocacional" role="tabpanel">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="main-card my-3 card">
                                <div class="table-responsive pt-1">
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="vocacional">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Pregunta</th>
                                                <th class="pr-3">Respuesta</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($vocationalTest as $question)
                                            <tr>
                                                <td class="text-center text-muted">#{{ $loop->iteration }}</td>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading">{{ $question->question }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @empty(!$answerVocationalTest)
                                                        {{$answerVocationalTest[$question->id]->answer == 1 ? "Sí": "No"}}
                                                    @endempty
                                                </td>
                                            </tr>
                                            @empty
                                            <h5>No hay preguntas ni respuestas para este cuestionario</h5>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modals')
@endsection

@section('js')
<script type="text/javascript" src="{{ url('backend/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ url('backend/js/dataTable.min.js') }}"></script>
<script>
    var spanish= {
                    "processing": "Procesando...",
                    "lengthMenu": "Mostrar  _MENU_  registros",
                    "zeroRecords": "No se encontraron resultados",
                    "emptyTable": "Ningún dato disponible en esta tabla",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de MAX registros)",
                    "search": "Buscar: ",
                    "infoThousands": ",",
                    "loadingRecords": "Cargando...",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                }
    $(document).ready( function () {
        $('#aprendizaje').DataTable({
            "bAutoWidth": false,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'Todos'],
            ],
            ordering:  false,
            language: spanish,
            responsive: true
        });
        $('#vocacional').DataTable({
            "bAutoWidth": false,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'Todos'],
            ],
            ordering:  false,
            language: spanish,
            responsive: true
        });
        $('#trayectoria').DataTable({
            "bAutoWidth": false,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'Todos'],
            ],
            ordering:  false,
            language: spanish,
            responsive: true
        });
    } );
</script>
@endsection
