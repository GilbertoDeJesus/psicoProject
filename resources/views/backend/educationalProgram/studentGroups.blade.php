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
                <div>Registro de alumnos
                    <div class="page-title-subheading">
                        <nav class="" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                                <li class="active breadcrumb-item" aria-current="page">Aspirantes</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="page-title-actions">

                <div class="search-wrapper active mx-auto">
                    @can('Buscar alumno avanzado')
                    <div class="input-holder mx-auto">
                        <form action="{{ route ('admin.educationalProgram.searchStudent', ['id' =>request()->id]) }}" method="get">
                            <input type="text" class="search-input" placeholder="Escribe para buscar" name="search" autocomplete="off" required minlength="2">
                            <input name="educative_program" value="{{request()->id}}" type="hidden">
                            <button class="search-icon" type="submit"><span></span></button>
                        </form>
                    </div>
                    @endcan
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-header bg-dark text-white">Lista de grupos</div>
                <div class="card-body px-4 py-3">
                    <div class="dropdown-menu dropdown-menu-inline">
                        <form action="{{ route('admin.educationalProgram.indexGroups',['id' => request()->id]) }}" method="get">
                            <label tabindex="0" class="dropdown-item rounded mb-2 py-2 px-3 @if (!request()->has('group') || request()->query('group') == 'todos')
                                active card-shadow-primary
                            @endif">
                                <input type="radio" class="d-none" name="group" value="todos" onchange='this.form.submit();'><i class="nav-link-icon pe-7s-drawer h4 mb-0 mr-2"></i><span>Todos</span>
                            </label>
                        </form>
                        <div class="divider"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            @if (session('status'))
                <div class="alert alert-success fade alert-dismissible show" role="alert">
                    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span></button>
                    {{ session('status') }}
                </div>
            @endif
            @if (session('alerta'))
                <div class="alert alert-primary fade alert-dismissible show" role="alert">
                    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span></button>
                    {{ session('alerta') }}
                </div>
            @endif
            <div class="main-card mb-3 card">
                <div class="card-header">Lista de alumnos
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th class="text-center">Edad</th>
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
                                <td>{{$student->email}}</td>
                                <td class="text-center">{{$student->age}}</td>
                                <td class="text-center">
                                    @can('Ver info de alumno avanzado')
                                    <a href="{{ route('admin.student.info', ['student' => $student->id]) }}" id="PopoverCustomT-1"
                                        class="btn btn-success btn-sm my-auto" data-toggle="tooltip" data-placement="top"
                                        title="Resultados">
                                        <span class="btn-icon-wrapper">
                                            <i class="fa fa-eye fa-w-20"></i>
                                        </span>
                                    </a>
                                    <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm" onclick="mostrarInfo(this)"
                                        data-toggle="modal" data-placement="top" title="Información" data-id = {{$student->id}}
                                        data-target="#exampleModal" >
                                        <span class="btn-icon-wrapper" data-toggle="tooltip" data-placement="top"
                                            title="Información basica">
                                            <i class="fa fa-id-card fa-w-20"></i>
                                        </span>
                                    </button>
                                    @endcan
                                </td>
                            </tr>
                            @empty
                            <h6>No hay almnos inscritos aquí</h6>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="d-block text-center card-footer">
                        {{ $students->withQueryString()->links('vendor.pagination.default') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modals')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-0">
                <div class="modal-header bg-primary mb-0" style="display: block;">
                    <div class="dropdown-menu-header my-0">
                        <div class="dropdown-menu-header-inner pb-2">
                            <div class="menu-header-content">
                                <div>
                                    <div href="javascript:void(0);"
                                        class="avatar-icon-wrapper btn-hover-shine avatar-icon-xl">
                                        <div class="avatar-icon rounded-2">
                                            <img src="{{ url('backend/images/avatars/8.png') }}" alt="Avatar 5">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <h5 class="menu-header-title mt-1"><span id="nameI">Jhon</span>&nbsp;<span
                                            id="familyI">Doe</span>&nbsp;<span id="lastNameI">Doe</span></h5>
                                    <h6 class="menu-header-subtitle"><span id="positionI">Aspirante</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body mx-2">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                                <label for="email" class="">Email </label><input name="email"
                                    id="emailI" type="text" class="form-control" disabled
                                    value="a3519110001@alumno.uttehuacan.edu.mx" />
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="edad" class="">Edad</label><input name="edad" id="edadI"
                                    type="text" class="form-control" disabled value="19" />
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="telefonoP" class="">Teléfono personal</label><input
                                    name="telefonoP" id="telefonoP" type="text" class="form-control" disabled
                                    value="2381234567" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script type="text/javascript" src="{{ url('backend/js/jquery.js') }}"></script>
<script>


    function mostrarInfo(btn){
        var id = $(btn).data('id')
        $(document).ready(function () {
                    $.ajax({
                    type: "GET",
                    url: "/admin/getStudent",
                    data: "id="+id+"&_token={{ csrf_token()}}",
                    success: function (data) {
                        info= JSON.parse(data);
                        console.log(info);
                        $("#nameI").text(info.name);
                        $("#familyI").text(info.family_name);
                        $("#lastNameI").text(info.last_name);
                        $("#emailI").val(info.email);
                        $("#edadI").val(info.age);
                        $("#telefonoP").val(info.phone);

                    },
                });
                });
    }


</script>




@endsection
