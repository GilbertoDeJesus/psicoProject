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
                <div>Información del alumno
                    <div class="page-title-subheading">A continuación se presenta toda la información del alumno
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5">
            <div class="card-shadow-primary profile-responsive card-border mb-3 card">
                <div class="dropdown-menu-header">
                    <div class="dropdown-menu-header-inner bg-primary">
                        <div class="menu-header-content btn-pane-right">
                            <div class="avatar-icon-wrapper mr-3 avatar-icon-xl">
                                <div class="avatar-icon rounded-circle">
                                    <img src="{{ url('backend/images/avatars/9.png') }}" alt="Avatar 5">
                                </div>
                            </div>
                            <div>
                                <h5 class="menu-header-title">{{Str::title($student->name)}} {{Str::title($student->family_name)}} {{Str::title($student->last_name)}}</h5>
                                <h6 class="menu-header-subtitle">{{$student->group->educativeProgram->name}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="p-0 list-group-item">
                        <div class="grid-menu grid-menu-2col">
                            <div class="no-gutters row">
                                <div class="col-sm-6">
                                    <div class="p-1">
                                        <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-primary {{$student->result->test_aprendizaje == 'Visual' ? '':'d-none'}}">{{--Quitar la clase d-none para que se muestre--}}
                                            <i class="pe-7s-look btn-icon-wrapper btn-icon-lg mb-3"> </i>Aprendizaje visual
                                        </button>
                                        <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-info {{$student->result->test_aprendizaje == 'Auditivo' ? '':'d-none'}}">
                                            <i class="pe-7s-volume1 btn-icon-wrapper btn-icon-lg mb-3"> </i>Aprendizaje Auditivo
                                        </button>
                                        <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-alternate {{$student->result->test_aprendizaje == 'Kinestésico' ? '':'d-none'}}">
                                            <i class="pe-7s-box2 btn-icon-wrapper btn-icon-lg mb-3"> </i>Aprendizaje Kinestésico
                                        </button>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="p-1">
                                        <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-success {{$student->result->test_status_academico == 'Verde' ? '':'d-none'}}">
                                            <i class="pe-7s-light btn-icon-wrapper btn-icon-lg mb-3"> </i>{{$student->result->test_status_academico == 'Verde' ? 'Foco Verde':''}}
                                        </button>
                                        <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-warning {{$student->result->test_status_academico == 'Amarillo' ? '':'d-none'}}">
                                            <i class="pe-7s-light btn-icon-wrapper btn-icon-lg mb-3"> </i>{{$student->result->test_status_academico == 'Amarillo' ? 'Foco Amarillo':''}}
                                        </button>
                                        <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-danger {{$student->result->test_status_academico == 'Rojo' ? '':'d-none'}}">
                                            <i class="pe-7s-light btn-icon-wrapper btn-icon-lg mb-3"> </i>{{$student->result->test_status_academico == 'Rojo' ? 'Foco Rojo':''}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="p-0 list-group-item">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="mb-0 table table-striped table-hover table-borderless mt-1">
                                    <thead>
                                        <tr>
                                            <th class="px-4">Carreras con afinidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="px-4">{{$student->result->educativeProgramTestOrientacional1->name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4">{{$student->result->educativeProgramTestOrientacional2->name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4">{{$student->result->educativeProgramTestOrientacional3->name}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-7">
            @if (session('status'))
                <div class="alert alert-success fade alert-dismissible show" role="alert">
                    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span></button>
                    {{ session('status') }}
                </div>
            @endif
            <div class="main-card mb-3 card card-shadow-primary">
                <div class="card-header bg-primary text-white">Información basica
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                                <label for="email" class="">Email institucional</label><input name="email"
                                    id="email" type="text" class="form-control" disabled
                                    value="{{$student->email}}" />
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="grupo" class="">Grupo</label><input name="grupo" id="grupo"
                                    type="text" class="form-control" disabled value="{{$student->group->name}}" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="matricula" class="">Matrícula</label><input name="matricula"
                                    id="matricula" type="text" class="form-control" disabled value="{{$student->matricula}}" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="edad" class="">Edad</label><input name="edad" id="edad"
                                    type="text" class="form-control" disabled value="{{$student->age}}" />
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="telefonoP" class="">Teléfono personal</label><input
                                    name="telefonoP" id="telefonoP" type="text" class="form-control" disabled
                                    value="{{$student->phone}}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="telefonoC" class="">Teléfono de contacto</label><input
                                    name="telefonoC" id="telefonoC" type="text" class="form-control" disabled
                                    value="{{$student->contact_phone}}" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-block text-center card-footer p-3">

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="conatiner card">
                <div class="card-header text-dark">
                    <div class="mx-auto">
                        Respuestas de cuestionarios
                    </div>
                </div>
                <div class="card-body">
                    <ul class="tabs-animated-shadow tabs-animated nav nav-justified tabs-rounded-lg">
                        <li class="nav-item">
                            <a role="tab" class="nav-link mb-0 active show" href="#estilo-aprendizaje" data-toggle="tab" aria-selected="true">
                                <span>Estilo de aprendizaje</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link mb-0" href="#orientacion-vocacional" data-toggle="tab" aria-selected="false">
                                <span>Orientación vocacional</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link mb-0" href="#trayectoria-academica" data-toggle="tab" aria-selected="false">
                                <span>Trayectoria académica</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane tabs-animation fade show active" id="estilo-aprendizaje" role="tabpanel">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="main-card my-3 card">
                                <div class="table-responsive pt-1">
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Pregunta</th>
                                                <th>Respuesta</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($learningTest as $question)
                                            <tr>
                                                <td class="text-center text-muted">#{{ $loop->iteration }}</td>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading">{{ $question->question }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @empty(!$answerLearningTest)
                                                        {{$answerLearningTest[$question->id]}}
                                                    @endempty
                                                </td>
                                               
                                            </tr>
                                            @empty
                                            <h5>No hay preguntas ni respuestas para este cuestionario</h5>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane tabs-animation fade" id="orientacion-vocacional" role="tabpanel">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="main-card my-3 card">
                                <div class="table-responsive pt-1">
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Pregunta</th>
                                                <th class="pr-3">Respuesta</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($vocationalTest as $question)
                                            <tr>
                                                <td class="text-center text-muted">#{{ $loop->iteration }}</td>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading">{{ $question->question }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @empty(!$answerVocationalTest)
                                                        {{$answerVocationalTest[$question->id]->answer == 1 ? "Sí": "No"}}
                                                    @endempty
                                                </td>   
                                            </tr>
                                            @empty
                                            <h5>No hay preguntas ni respuestas para este cuestionario</h5>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane tabs-animation fade" id="trayectoria-academica" role="tabpanel">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="main-card my-3 card">
                                <div class="table-responsive pt-1">
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Pregunta</th>
                                                <th>Respuesta</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($trayectoryTest as $question)
                                            <tr>
                                                <td class="text-center text-muted">#{{ $loop->iteration }}</td>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading">{{ $question->question }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @empty(!$answerTrayectoryTest)
                                                        @php                                                        
                                                            if (is_array($answerTrayectoryTest[$question->id])){
                                                                $answerTrayectoryTest[$question->id] = implode(", ",$answerTrayectoryTest[$question->id]);
                                                            }
                                                                                                        
                                                        @endphp
                                                        {{$answerTrayectoryTest[$question->id]}}
                                                    @endempty
                                                   
                                                </td>
                                            </tr>
                                            @empty
                                                <h5>No hay preguntas ni respuestas para este cuestionario</h5>
                                            @endforelse
                                            
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modals')
@endsection

@section('js')
<script>
    $(document).ready(function () {
    $('#example').DataTable({
        ajax: 'data/arrays.txt',
    });
});
</script>
@endsection
