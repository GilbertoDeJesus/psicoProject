@extends('backend.layout.main')

@section('contenido')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger fade alert-dismissible show" role="alert">
            <button type="button" class="close" aria-label="Close"  data-dismiss="alert">
                <span aria-hidden="true">&times;</span></button>
            {{ $error }}
        </div>
        @endforeach
    @endif
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-add-user icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Registro de usuarios
                    <div class="page-title-subheading">
                        <nav class="" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                                <li class="active breadcrumb-item" aria-current="page">Usuarios</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                @can('Buscar administrador')
                <div class="search-wrapper active mx-auto">
                    <div class="input-holder mx-auto">
                        <form action="{{ route('admin.users.search') }}" method="get">
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
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success fade alert-dismissible show" role="alert">
                    <button type="button" class="close" aria-label="Close"  data-dismiss="alert">
                        <span aria-hidden="true">&times;</span></button>
                    {{ session('status') }}
                </div>
            @endif
            <div class="main-card mb-3 card">
                <div class="card-header">Lista de usuarios
                    <div class="btn-actions-pane-right">
                        @can('Agregar admnistrador',)
                        <div role="group" class="btn-group">
                            <button class="btn btn-primary mr-2" data-toggle="modal" data-target=".bd-example-modal-lg">
                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                    <i class="fa fa-plus fa-w-20"></i>
                                </span>
                                Agregar
                            </button>
                        </div>
                        @endcan
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Nombre</th>
                                <th>Programa educativo</th>
                                <th class="text-center">Creación</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td class="text-center text-muted">#{{$user->id}}</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img width="40" class="rounded-circle"
                                                        src="{{ url('backend/images/avatars/6.png') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">{{$user->name}}</div>
                                                <div class="widget-subheading opacity-7">{{$user->email}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$user->educativeProgram->name}}</td>
                                <td class="text-center">{{$user->created_at->diffForHumans()}}</td>
                                <td class="text-center">
                                    @can('Editar administrador',)
                                    <a href="{{ route('admin.users.editUser', ['user'=>$user->id]) }}" id="PopoverCustomT-1" class="btn btn-success btn-sm my-auto"
                                        data-toggle="tooltip" data-placement="top" title="Editar">
                                        <span class="btn-icon-wrapper">
                                            <i class="fa fa-edit fa-w-20"></i>
                                        </span>
                                    </a>
                                    @endcan
                                    @can('Eliminar administrador')
                                    <a href="javascript:; type="button" id="PopoverCustomT-1" class="btn btn-danger btn-delete btn-sm"
                                    data-id="{{$user->id}}" data-toggle="modal" data-placement="top" title="Eliminar"
                                    data-target="#exampleModal">
                                    <span class="btn-icon-wrapper">
                                        <i class="fa fa-trash fa-w-20"></i>
                                    </span>
                                </a>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-block text-center card-footer">                  
                        {{ $users->links('vendor.pagination.default') }}   
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modals')
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border-0">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title menu-header-title text-white" id="exampleModalLongTitle">Agregar nuevo usuario</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.users.storeUser') }}" method="post" role="form">
                    @csrf
                    <div class="modal-body mx-2 my-2">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Nombre</label><input name="name" id="name"
                                        placeholder="Nombre" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="lastname" class="">Apellidos</label><input name="lastname" id="lastname"
                                        placeholder="Apellidos" type="text" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="email" class="">Correo electrónico</label><input name="email" id="email"
                                        placeholder="Correo electrónico" type="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="educative_program_id" class="">Programa educativo</label><select type="select"
                                        id="educative_program_id" name="educative_program_id" class="custom-select" required>
                                        @foreach ($educativePrograms as $ep)
                                        <option value="{{$ep->id}}">{{$ep->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="roles" class="">Rol</label><select type="select"
                                        id="roles" name="roles" class="custom-select" required>
                                        <option value="Admin">Tutor</option>
                                        <option value="Super-Admin">Administrador</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="employee_key" class="">Clave de trabajador</label><input name="employee_key" id="employee_key"
                                        placeholder="Clave de trabajador" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="password" class="">Contraseña</label><input name="password" id="password"
                                        placeholder="Contraseña" type="text" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                <form id="formDelete" action="{{ route('admin.users.deleteUser', ['id' => 0]) }}" method="post" 
                data-action="{{ route('admin.users.deleteUser', ['id' => 0]) }}">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body text-center">
                        <div class="font-icon-lg my-3"><i class="fa fa-times-circle fa-8x icon-gradient bg-love-kiss"
                                aria-hidden="true"></i></div>
                        <h4 class="mb-3">¿Realmente quieres eliminar a este usuario?</h4>
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
    document.querySelectorAll(".btn-delete").forEach(link => link.addEventListener('click', function() {
        id = link.getAttribute("data-id");
        form = document.getElementById('formDelete');
        action = form.getAttribute('data-action').slice(0, -1);
        action += id;
        form.setAttribute('action', action);
    }));
</script>
@endsection
