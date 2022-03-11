@extends('backend.layout.main')

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
                    <div class="page-title-subheading">A continuación se presenta toda la información del alumno
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
                                <h5 class="menu-header-title">Bryce Cordova</h5>
                                <h6 class="menu-header-subtitle">Implementation Specialist</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="p-0 list-group-item">
                        <div class="grid-menu grid-menu-2col">
                            <div class="no-gutters row">
                                <div class="col-sm-6">
                                    <div class="p-1">
                                        <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-primary d-none">{{--Quitar la clase d-none para que se muestre--}}
                                            <i class="pe-7s-look btn-icon-wrapper btn-icon-lg mb-3"> </i>Aprendizaje visual
                                        </button>
                                        <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-info">
                                            <i class="pe-7s-volume1 btn-icon-wrapper btn-icon-lg mb-3"> </i>Aprendizaje Auditivo
                                        </button>
                                        <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-alternate d-none">
                                            <i class="pe-7s-box2 btn-icon-wrapper btn-icon-lg mb-3"> </i>Aprendizaje Kinestesico
                                        </button>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="p-1">
                                        <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-success">
                                            <i class="pe-7s-light btn-icon-wrapper btn-icon-lg mb-3"> </i>Foco verde
                                        </button>
                                        <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-warning d-none">
                                            <i class="pe-7s-light btn-icon-wrapper btn-icon-lg mb-3"> </i>Foco amarillo
                                        </button>
                                        <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-danger d-none">
                                            <i class="pe-7s-light btn-icon-wrapper btn-icon-lg mb-3"> </i>Foco rojo
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
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
                                        <tr>
                                            <td class="px-4">Tecnologias de la informacion</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4">Enfermeria</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4">Procesos industriales</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-7">
            @if (session('status'))
                <div class="alert alert-success fade alert-dismissible show" role="alert">
                    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span></button>
                    {{ session('status') }}
                </div>
            @endif
            <div class="main-card mb-3 card">
                <div class="card-header bg-primary text-white">Información basica
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                                <label for="email" class="">Email institucional</label><input name="email"
                                    id="email" type="text" class="form-control" disabled
                                    value="a3519110001@alumno.uttehuacan.edu.mx" />
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="grupo" class="">Grupo</label><input name="grupo" id="grupo"
                                    type="text" class="form-control" disabled value="4 A" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="matricula" class="">Matrícula</label><input name="matricula"
                                    id="matricula" type="text" class="form-control" disabled value="3519110001" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="edad" class="">Edad</label><input name="edad" id="edad"
                                    type="text" class="form-control" disabled value="19" />
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="telefonoP" class="">Telefono personal</label><input
                                    name="telefonoP" id="telefonoP" type="text" class="form-control" disabled
                                    value="2381234567" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="telefonoC" class="">Telefono de contacto</label><input
                                    name="telefonoC" id="telefonoC" type="text" class="form-control" disabled
                                    value="2381234567" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-block text-center card-footer p-3">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('modals')
@endsection

@section('js')
@endsection
