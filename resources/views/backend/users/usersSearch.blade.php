@extends('backend.layout.main')

@section('contenido')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-search icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Resultados para {{Str::limit($search, 25)}}
                    <div class="page-title-subheading">
                        <nav class="" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Usuarios</a></li>
                                <li class="active breadcrumb-item" aria-current="page">Busqueda</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                @can('Buscar administrador',)
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
                            @foreach($searchs as $user)
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
                                    <a href="{{ route('admin.users.editUser', ['user'=> $user->id]) }}" id="PopoverCustomT-1" class="btn btn-success btn-sm my-auto"
                                        data-toggle="tooltip" data-placement="top" title="Editar">
                                        <span class="btn-icon-wrapper">
                                            <i class="fa fa-edit fa-w-20"></i>
                                        </span>
                                    </a>
                                    <a href="javascript:; type="button" id="PopoverCustomT-1" class="btn btn-danger btn-delete btn-sm"
                                        data-id="{{$user->id}}" data-toggle="modal" data-placement="top" title="Eliminar"
                                        data-target="#exampleModal">
                                        <span class="btn-icon-wrapper">
                                            <i class="fa fa-trash fa-w-20"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-block text-center card-footer">                  
                        {{ $searchs->withQueryString()->links('vendor.pagination.default') }}   
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
