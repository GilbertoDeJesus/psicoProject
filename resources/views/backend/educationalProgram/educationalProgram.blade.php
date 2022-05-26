@extends('backend.layout.main')

@section('contenido')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-portfolio icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Programas educativos
                    <div class="page-title-subheading">A continuación se presentan todos los programas activos
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                @can('Buscar programa educativo',)
                <div class="search-wrapper active mx-auto">
                    <div class="input-holder mx-auto">
                        <form action="{{ route('admin.educationalProgram.search') }}" method="get">
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
                    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span></button>
                    {{ session('status') }}
                </div>
            @endif
            <div class="main-card mb-3 card">
                <div class="card-header">Lista de programas educativos
                    <div class="btn-actions-pane-right">
                        <div role="group" class="btn-group">
                            @can('Agregar programa educativo',)
                            <button class="btn btn-primary mr-2" data-toggle="modal" data-target=".bd-example-modal-lg">
                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                    <i class="fa fa-plus fa-w-20"></i>
                                </span>
                                Agregar
                            </button>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Nombre</th>
                                <th class="text-center">Creación</th>
                                <th class="text-center">Alumnos</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($educativePrograms as $ep)
                            <tr>
                                <td class="text-center text-muted">#{{$ep->id}}</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">{{$ep->name}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">{{$ep->created_at->diffForHumans()}}</td>
                                @can('Ver alumnos avanzado',)
                                <td class="text-center">
                                    <a href="{{ route('admin.educationalProgram.indexGroups', ['id' => $ep->id]) }}" id="PopoverCustomT-1"
                                        class="btn btn-warning btn-sm my-auto" data-toggle="tooltip" data-placement="top"
                                        title="Ver lista de alumnos">
                                        <span class="btn-icon-wrapper">
                                            <i class="fa fa-users fa-w-20"></i>
                                        </span>
                                    </a>
                                </td>
                                @endcan
                                <td class="text-center">
                                    @can('Editar programas educativo',)
                                    <a href="javascript:;" id="PopoverCustomT-1" class="btn btn-success btn-update btn-sm my-auto" 
                                    data-name="{{$ep->name}}" data-id="{{$ep->id}}" data-toggle="modal" data-placement="top" title="Editar" data-target="#editModal">
                                        <span class="btn-icon-wrapper" data-toggle="tooltip" data-placement="top"
                                            title="Editar">
                                            <i class="fa fa-edit fa-w-20"></i>
                                        </span>
                                    </a>
                                    @endcan
                                    @can('Eliminar programa educativo',)
                                    <a href="javascript:;" id="PopoverCustomT-1" class="btn btn-danger btn-delete btn-sm"
                                    data-id="{{$ep->id}}" data-toggle="modal" data-placement="top" title="Eliminar"
                                        data-target="#deleteModal">
                                        <span class="btn-icon-wrapper" data-toggle="tooltip" data-placement="top"
                                            title="Eliminar">
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
                        {{ $educativePrograms->links('vendor.pagination.default') }}   
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
                    <h5 class="modal-title menu-header-title text-white" id="exampleModalLongTitle">Agregar nuevo programa
                        educativo
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.educationalProgram.storeProgram') }}" method="post" role="form">
                    @csrf
                    <div class="modal-body mx-2 my-2">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Nombre</label><input name="name" id="name"
                                        placeholder="Nombre" type="text" class="form-control" required>
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

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border-0">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title menu-header-title text-white" id="exampleModalLongTitle">Editar programa
                        educativo
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @can('Editar programas educativo1',)
                <form id="formUpdate" action="{{ route('admin.educationalProgram.updateProgram', ['id' => 0]) }}" method="post" role="form"
                    data-action="{{ route('admin.educationalProgram.updateProgram', ['id' => 0]) }}">
                        @method('PUT')
                        @csrf
                        <div class="modal-body mx-2 my-2">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <label for="name" class="">Nombre</label><input id="inputName" value="" name="name" id="name"
                                            placeholder="Nombre" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                @endcan
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formDelete" action="{{ route('admin.educationalProgram.deleteProgram', ['id' => 0]) }}" method="post"
                    data-action="{{ route('admin.educationalProgram.deleteProgram', ['id' => 0]) }}">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body text-center">
                        <div class="font-icon-lg my-3"><i class="fa fa-times-circle fa-8x icon-gradient bg-love-kiss"
                                aria-hidden="true"></i></div>
                        <h4 class="mb-3">¿Realmente quieres eliminar este programa?</h4>
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
<script>
    document.querySelectorAll(".btn-update").forEach(link => link.addEventListener('click', function() {
        id = link.getAttribute("data-id");
        name = link.getAttribute("data-name");
        form = document.getElementById('formUpdate');
        input = document.getElementById('inputName');
        action = form.getAttribute('data-action').slice(0, -1);
        action += id;
        form.setAttribute('action', action);
        input.setAttribute('value', name);
    }));
</script>
@endsection
