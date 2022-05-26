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
                    <i class="pe-7s-print icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Reportes
                    <div class="page-title-subheading">En el siguiente filtro puede generar reportes descargables
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">       
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success fade alert-dismissible show" role="alert">
                    <button type="button" class="close" aria-label="Close"  data-dismiss="alert">
                        <span aria-hidden="true">&times;</span></button>
                    {{ session('status') }}
                </div>
             @endif
            <div class="conatiner card">
                <div class="card-header text-white bg-primary">
                    <div class="mx-auto">
                        Filtros de seleccion
                    </div>
                </div>
                <form action="{{ route('admin.reports.generate') }}" method="post">
                    @csrf
                    <div class="card-body px-4 py-4">
                        <div class="form-row">
                            <div class="col-md-6 col-lg-4">
                                <div class="position-relative form-group">
                                    <label for="test" class="">Cuestionario</label><select type="select"
                                        id="test" name="test" class="custom-select" required>
                                        <option value="todos" selected>Todos</option>
                                        <option value="aprendizaje">Estilo de aprendizaje</option>
                                        <option value="vocacional">Orientacion vocacional</option>
                                        <option value="trayectoria">Trayectoria academica</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="position-relative form-group">
                                    <label for="educational" class="">Programa educativo</label><select type="select"
                                        id="educational" name="educational" class="custom-select" required>
                                        <option value="todos" selected>Todos</option>
                                        <option value="1">Agricultura Sustentable y Protegida</option>
                                        <option value="2">Desarrollo de Negocios Área Mercadotecnia</option>
                                        <option value="3">Mecatronica Área Sistemas de Manufactura Flexible</option>
                                        <option value="4">Procesos Alimentarios</option>
                                        <option value="5">Procesos Industriales Área Automotriz</option>
                                        <option value="6">Tecnologías de la Información</option>
                                        <option value="7">Enfermería</option>
                                        <option value="8">Mantenimiento Industrial</option>
                                        <option value="9">Energias Renovables</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="position-relative form-group">
                                    <label for="educational" class="">Grado y grupo</label><select type="select"
                                        id="educational" name="grade" class="custom-select" required>
                                        <option value="todos" selected>Todos</option>
                                        <option value="A">1 A</option>
                                        <option value="B">1 B</option>
                                        <option value="C">1 C</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="inicio" class="">Fecha de incio</label><input
                                        name="inicio" id="inicio" type="text" class="form-control"
                                        data-toggle="datepicker" placeholder="dd/mm/aaaa" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="fin" class="">Fecha de fin</label><input
                                        name="fin" id="fin" type="text" class="form-control"
                                        data-toggle="datepicker" placeholder="dd/mm/aaaa" autocomplete="off"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-outline-primary ml-auto btn-lg">Generar reporte</button>
                    </div>
                </form>
               
               
            </div>
            
        </div>
        <div class="col-md-12 mt-5">
            <div class="conatiner card">
                <div class="card-body px-4 py-4">
                    <div class="row">
                        <div class="col-md-9 col-lg-9">
                            <label>Si desea eliminar los datos de TODOS los alumnos de clic en el botón</label>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <form action="{{ route('admin.deleteStudent') }}" method="delete"  >
                                @csrf
                                <button  id="PopoverCustomT-1" type="submit"
                                class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top"
                                title="Vaciar datos">
                                Eliminar alumnos
                                </button>
                            </form>
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
@endsection
