@extends('backend.layout.main')

@section('contenido')
    <div class="main-card mb-3 card">
        <div class="card-header bg-primary text-white">Editar información de grupo</div>
        <form action="{{ route('admin.groups.updateGroup', ['id' => $group->id]) }}" method="post" role="form">
            @method('PUT')
            @csrf
            <div class="card-body mx-2 my-2">
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="position-relative form-group">
                            <label for="name" class="">Nombre</label><input value="{{$group->name}}" name="name" id="name"
                                placeholder="Nombre" type="text" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="position-relative form-group">
                            <label for="educative_program_id" class="">Programa educativo</label><select type="select"
                                id="educative_program_id" name="educative_program_id" class="custom-select" required>
                                @foreach($educativePrograms as $ep)
                                    <option {{ $group->educativeProgram->id == $ep->id ? 'selected' : '' }} value="{{$ep->id}}">{{$ep->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                @can('Editar grupo1',)
                <a href="{{ route('admin.groups') }}" class="btn btn-dark" data-dismiss="modal">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
                @endcan
            </div>
        </form>
    </div>
@endsection

@section('js')
@endsection
