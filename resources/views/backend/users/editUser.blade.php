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
    <div class="main-card mb-3 card">
        <div class="card-header bg-primary text-white">Editar información de usuario</div>
        <form action="{{ route('admin.users.updateUser', ['id' => $user->id]) }}" method="post" role="form">
            @method('PUT')
            @csrf
            <div class="card-body mx-2 my-2">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="name" class="">Nombre</label><input value="{{$user->name}}" name="name" id="name"
                                placeholder="Nombre" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="lastname" class="">Apellidos</label><input value="{{$user->lastname}}" name="lastname" id="lastname"
                                placeholder="Apellidos" type="text" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="position-relative form-group">
                            <label for="email" class="">Correo electronico</label><input value="{{$user->email}}" name="email" id="email"
                                placeholder="Correo electronico" type="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="position-relative form-group">
                            <label for="educative_program_id" class="">Programa educativo</label><select type="select"
                                id="educative_program_id" name="educative_program_id" class="custom-select" required>
                                @foreach($educativePrograms as $ep)
                                <option {{ $user->educativeProgram->id == $ep->id ? 'selected' : '' }} value="{{$ep->id}}">{{$ep->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="employee_key" class="">Clave de trabajador</label><input value="{{$user->employee_key}}" name="employee_key" id="employee_key"
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
            @can('Editar administrador1',)
            <div class="modal-footer">
                <a href="{{ route('admin.users') }}" class="btn btn-dark" data-dismiss="modal">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            @endcan
        </form>
    </div>
@endsection

@section('js')
@endsection
