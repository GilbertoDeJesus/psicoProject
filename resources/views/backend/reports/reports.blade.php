@extends('backend.layout.main')
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
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
                    <div class="page-title-subheading">
                        <nav class="" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                                <li class="active breadcrumb-item" aria-current="page">Reportes</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success fade alert-dismissible show" role="alert">
                    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span></button>
                    {{ session('status') }}
                </div>
            @endif
            @if (session('alert'))
                <div class="alert alert-danger fade alert-dismissible show" role="alert">
                    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span></button>
                    {{ session('alert') }}
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
                                        @forelse ($tests as $test)
                                         <option value="{{$test->clave}}">{{$test->name}}</option>
                                        @empty
                                         <option value="0">No hay más opciones</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="position-relative form-group">
                                    <label for="educational" class="">Programa educativo</label><select
                                        type="select" id="educational" name="educational" class="custom-select" required>
                                        <option value="" selected disabled>Selecciona una opción</option>
                                        <option value="todos" >Todos</option>
                                        @forelse ($educativePrograms as $educativeProgram)
                                            <option value="{{$educativeProgram->id}}">{{$educativeProgram->name}}</option>
                                        @empty
                                            <option value="0">No hay opciones</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="position-relative form-group">
                                    <label for="grade" class="">Grado y grupo</label><select
                                        type="select" id="grade" name="grade" class="custom-select" required>
                                        <option value="" selected disabled>Selecciona una opción</option>
                                        {{-- <option value="todos" selected>Todos</option>
                                        <option value="A">1 A</option>
                                        <option value="B">1 B</option>
                                        <option value="C">1 C</option> --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="inicio" class="">Fecha de incio</label><input name="inicio" required
                                        id="inicio" type="text" class="form-control" data-toggle="datepicker"
                                        placeholder="dd/mm/aaaa" autocomplete="off" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="fin" class="">Fecha de fin</label><input name="fin" id="fin" required
                                        type="text" class="form-control" data-toggle="datepicker" placeholder="dd/mm/aaaa"
                                        autocomplete="off" />
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card px-4 py-4 widget-content border-danger card-shadow-danger">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="widget-heading text-danger h5">Vaciar registros</div>
                                <div class="text-dark">Si desea eliminar los datos de TODOS los alumnos de clic en el botón</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-danger"> <button id="PopoverCustomT-1" class="btn btn-danger btn-delete btn-sm ml-auto" data-toggle="modal" data-placement="top" title="Eliminar" data-target="#exampleModal">
                                    <span data-toggle="tooltip" data-placement="top" title="Vaciar datos">Eliminar alumnos</span>
                                </button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modals')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formDelete" action="{{ route('admin.deleteStudent') }}" method="post">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body text-center">
                        <div class="font-icon-lg my-3"><i class="fa fa-times-circle fa-8x icon-gradient bg-love-kiss"
                                aria-hidden="true"></i></div>
                        <h4 class="mb-3">¿Realmente quieres vaciar los registros?</h4>
                        <h6>¡Este proceso no se puede deshacer!</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
     //Selecciona el programa educativo
     const selectElement = document.querySelector('#educational');
        selectElement.addEventListener('change', (event) => {
            var p_id = document.getElementById('educational').value;
            //Vacia los datos del select 
            $('#grade').find('option').remove();
            if(p_id == "todos"){
                console.log(p_id);
                $("#grade").append('<option value="todos">Todos</option>');
            }else{
               //Busqueda AJAX para rellenar los options correspondientes de cada programa educativo
                $.ajax({
                url: "{{ route('student.getGroups') }}",
                type: 'post',
                data: {
                    p_id: p_id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function(data) {
                    $.each(data, function(key, registro) {
                        $("#grade").append('<option value=' + registro.id + '>' + registro
                            .name + '</option>');
                    });
                }
            });
            }
           
        });
</script>
    <script type="text/javascript" src="{{ url('backend/js/jquery.js') }}"></script>
@endsection
