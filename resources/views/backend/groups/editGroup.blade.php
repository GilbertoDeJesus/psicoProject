@extends('backend.layout.main')

@section('contenido')
    <div class="main-card mb-3 card">
        <div class="card-header bg-primary text-white">Editar información de grupo</div>
        <form action="{{ route('admin.groups.updateGroup', ['id' => 1]) }}" method="post" role="form">
            @method('PUT')
            @csrf
            <div class="card-body mx-2 my-2">
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="position-relative form-group">
                            <label for="name" class="">Nombre</label><input name="name" id="name"
                                placeholder="Nombre" type="text" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="position-relative form-group">
                            <label for="educational" class="">Programa educativo</label><select type="select"
                                id="educational" name="educational" class="custom-select" required>
                                <option value="">Tecnologias de la información</option>
                                <option>Enfermeria</option>
                                <option>Desarrollo de negocios</option>
                                <option>Mecatronica</option>
                                <option>Procesos industriales</option>
                                <option>Producción de alimentos</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('admin.groups') }}" class="btn btn-dark" data-dismiss="modal">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
@endsection

@section('js')
@endsection
