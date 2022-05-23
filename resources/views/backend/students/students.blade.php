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
                    <div class="page-title-subheading">A continuación se presentan todos los alumnos registrados
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                @can('Buscar alumno sencillo')
                <div class="search-wrapper active mx-auto">
                    <div class="input-holder mx-auto">
                        <form action="{{ route('admin.students.search') }}" method="get">
                            <input type="text" class="search-input" placeholder="Escribe para buscar" name="search" autocomplete="off" required minlength="2">
                            <button class="search-icon" type="submit"><span></span></button>
                        </form>
                        
                    </div>
                </div>
                @endcan
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-header bg-dark text-white">Lista de grupos</div>
                <div class="card-body px-4 py-3">
                    <div class="dropdown-menu dropdown-menu-inline">
                        <form action="{{ route('admin.students') }}" method="get">
                            <label tabindex="0" class="dropdown-item rounded mb-2 py-2 px-3 {{ request()->group == 'todos' ? 'active card-shadow-primary' : '' }}">
                                <input type="radio" class="d-none" name="group" value="todos" onchange='this.form.submit();'><i class="nav-link-icon pe-7s-drawer h4 mb-0 mr-2"></i><span>Todos</span>
                            </label>
                            @forelse ($groups as $group)
                                <label tabindex="0" class="dropdown-item rounded mb-2 py-2 px-3 {{ request()->group == $group->id  ? 'active card-shadow-primary' : '' }}">
                                    <input type="radio" class="d-none" name="group" value="{{$group->id}}" onchange='this.form.submit();'><i class="nav-link-icon pe-7s-folder h4 mb-0 mr-2"></i><span>{{$group->name}}</span>
                                </label>
                            
                            @empty
                                
                            @endforelse
                          
                            {{-- <label tabindex="0" class="dropdown-item rounded mb-2 py-2 px-3 {{ request()->group == '1a'  ? 'active card-shadow-primary' : '' }}">
                                <input type="radio" class="d-none" name="group" value="1a" onchange='this.form.submit();'><i class="nav-link-icon pe-7s-folder h4 mb-0 mr-2"></i><span>1A</span>
                            </label>
                            <label tabindex="0" class="dropdown-item rounded mb-2 py-2 px-3 {{ request()->group == '1b'  ? 'active card-shadow-primary' : '' }}">
                                <input type="radio" class="d-none" name="group" value="1b" onchange='this.form.submit();'><i class="nav-link-icon pe-7s-folder h4 mb-0 mr-2"></i><span>1B</span>
                            </label>
                            <label tabindex="0" class="dropdown-item rounded mb-2 py-2 px-3 {{ request()->group == '2a'  ? 'active card-shadow-primary' : '' }}">
                                <input type="radio" class="d-none" name="group" value="2a" onchange='this.form.submit();'><i class="nav-link-icon pe-7s-folder h4 mb-0 mr-2"></i><span>2A</span>
                            </label>
                            <label tabindex="0" class="dropdown-item rounded mb-2 py-2 px-3 {{ request()->group == '2b'  ? 'active card-shadow-primary' : '' }}">
                                <input type="radio" class="d-none" name="group" value="2b" onchange='this.form.submit();'><i class="nav-link-icon pe-7s-folder h4 mb-0 mr-2"></i><span>2B</span>
                            </label>
                            <label tabindex="0" class="dropdown-item rounded mb-2 py-2 px-3 {{ request()->group == '3a'  ? 'active card-shadow-primary' : '' }}">
                                <input type="radio" class="d-none" name="group" value="3a" onchange='this.form.submit();'><i class="nav-link-icon pe-7s-folder h4 mb-0 mr-2"></i><span>3A</span>
                            </label>
                            <label tabindex="0" class="dropdown-item rounded mb-2 py-2 px-3 {{ request()->group == '3b'  ? 'active card-shadow-primary' : '' }}">
                                <input type="radio" class="d-none" name="group" value="3b" onchange='this.form.submit();'><i class="nav-link-icon pe-7s-folder h4 mb-0 mr-2"></i><span>3B</span>
                            </label>
                            <label tabindex="0" class="dropdown-item rounded mb-2 py-2 px-3 {{ request()->group == '4a'  ? 'active card-shadow-primary' : '' }}">
                                <input type="radio" class="d-none" name="group" value="4a" onchange='this.form.submit();'><i class="nav-link-icon pe-7s-folder h4 mb-0 mr-2"></i><span>4A</span>
                            </label>
                            <label tabindex="0" class="dropdown-item rounded mb-2 py-2 px-3 {{ request()->group == '4b'  ? 'active card-shadow-primary' : '' }}">
                                <input type="radio" class="d-none" name="group" value="4b" onchange='this.form.submit();'><i class="nav-link-icon pe-7s-folder h4 mb-0 mr-2"></i><span>4B</span>
                            </label> --}}
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
            <div class="main-card mb-3 card">
                <div class="card-header">Lista de alumnos
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
                            @forelse ($students as $item)
                            @php
                                $program = $item->name;
                            @endphp
                            @forelse ($item->students as $student)
                             <tr>
                                <td class="text-center text-muted">{{$student->id}}</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                        </div>
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">{{$student->name, $student->family_name}}</div>
                                            <div class="widget-subheading opacity-7">Web Developer
                                            </div>
                                        </div>
                                    </div>

                                </td>
                                <td>{{$program}}</td>
                                <td class="text-center">{{$student->matricula}}</td>
                                <td class="text-center">
                                    {{$student->group->name}}
                                </td>
                                <td class="text-center">
                                    @can('Ver info alumno sencillo')
                                    <a href="{{ route('admin.student.info', ['student' => $student->id]) }}" id="PopoverCustomT-1"
                                        class="btn btn-success btn-sm my-auto" data-toggle="tooltip" data-placement="top"
                                        title="Resultados">
                                        <span class="btn-icon-wrapper">
                                            <i class="fa fa-eye fa-w-20"></i>
                                        </span>
                                    </a>
                                    <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm"
                                        data-toggle="modal" data-placement="top" title="Información"
                                        data-target="#exampleModal">
                                        <span class="btn-icon-wrapper" data-toggle="tooltip" data-placement="top"
                                            title="Información basica">
                                            <i class="fa fa-id-card fa-w-20"></i>
                                        </span>
                                    </button>
                                    @endcan
                                </td>
                            </tr>
                                
                            @empty
                                
                            @endforelse
                           
                           
                            
                            @empty
                            <h6>No hay almnos inscritos aquí</h6>
                            @endforelse
                           
                        </tbody>
                    </table>
                </div>
                <div class="d-block text-center card-footer">                  
                        {{ $students->links('vendor.pagination.default') }}   
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
                                            id="lastNameI">Doe</span>&nbsp;<span id="familyI">Doe</span></h5>
                                    <h6 class="menu-header-subtitle"><span id="positionI">Desarrollo y gestión de
                                            software</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body mx-2">
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
                                <label for="telefonoP" class="">Teléfono personal</label><input
                                    name="telefonoP" id="telefonoP" type="text" class="form-control" disabled
                                    value="2381234567" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="telefonoC" class="">Teléfono de contacto</label><input
                                    name="telefonoC" id="telefonoC" type="text" class="form-control" disabled
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
    {{-- <script type="text/javascript" src="{{ url('frontend/js/jquery.js') }}"></script>
<script>
    (function($) {
    'use strict';
    $(function() {
      $('.file-upload-browse').on('click', function() {
        var file = $(this).parent().parent().parent().find('.file-upload-default');
        file.trigger('click');
      });
      $('.file-upload-default').on('change', function() {
        $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
      });
    });
  })(jQuery);
</script> --}}
@endsection
