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
                            <label for="email" class="">Correo electrónico</label><input value="{{$user->email}}" name="email" id="email"
                                placeholder="Correo electrónico" type="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="position-relative form-group">
                            <label for="roles" class="">Rol</label><select type="select"
                                id="roles" name="roles" class="custom-select" required onchange="ShowSelected();">
                                <option {{ $user->getRoleNames() == '["Admin"]' ? 'selected' : '' }} data-role="" value="Admin">Administrador</option>
                                <option {{ $user->getRoleNames() == '["Super-Admin"]' ? 'selected' : '' }} value="Super-Admin">Super Administrador</option>
                            </select>
                        </div>
                    </div>
                    @if($user->educativeProgram != null)
                    <div id="selectEducativeProgram" class="col-md-12">
                        <div class="position-relative form-group">
                            <label for="educative_program_id" class="">Programa educativo</label><select type="select"
                                id="educative_program_id" name="educative_program_id" class="custom-select" required>
                                @foreach ($educativePrograms as $ep)
                                <option {{ $user->educativeProgram->id == $ep->id ? 'selected' : '' }} value="{{$ep->id}}">{{$ep->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endif
                    @if($user->educativeProgram == null)
                    <div id="selectEducativeProgram" class="col-md-12" style="display: none">
                        <div class="position-relative form-group">
                            <label for="educative_program_id" class="">Programa educativo</label><select type="select"
                                id="educative_program_id" name="educative_program_id" class="custom-select" required>
                                <option value="null">null</option>
                                @foreach ($educativePrograms as $ep)
                                <option value="{{$ep->id}}">{{$ep->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endif
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
<script>
    function ShowSelected() {
        var roleSelected = document.getElementById("roles").value;
        educativeP = document.getElementById("selectEducativeProgram");
        educativeSelect = document.getElementById("educative_program_id");
        if(roleSelected == "Super-Admin"){
            educativeP.style.display = "none";
            var option = new Option("null", "null");
            educativeSelect.appendChild(option);
            educativeSelect.value = "null";
        }else{
            educativeP.style.display = "block";
            if(educativeSelect.options[educativeSelect.selectedIndex].text == "null"){
                educativeSelect.remove(educativeSelect.selectedIndex);
            }
        }
    }
</script>
@section('js')
@endsection
