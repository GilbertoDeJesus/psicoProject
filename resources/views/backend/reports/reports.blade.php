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
                                        <option value="ti">Tecnologias de la información</option>
                                        <option>Enfermeria</option>
                                        <option>Desarrollo de negocios</option>
                                        <option>Mecatronica</option>
                                        <option>Procesos industriales</option>
                                        <option>Producción de alimentos</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="position-relative form-group">
                                    <label for="educational" class="">Grado y grupo</label><select type="select"
                                        id="educational" name="educational" class="custom-select" required>
                                        <option value="todos" selected>Todos</option>
                                        <option>1 A</option>
                                        <option>1 B</option>
                                        <option>1 C</option>
                                        <option>1 D</option>
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
    </div>
@endsection

@section('modals')
@endsection

@section('js')
    <script type="text/javascript" src="{{ url('backend/js/jquery.js') }}"></script>
@endsection
