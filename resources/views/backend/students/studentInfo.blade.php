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
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success fade alert-dismissible show" role="alert">
                    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span></button>
                    {{ session('status') }}
                </div>
            @endif
            <div class="main-card mb-3 card">
                <div class="card-header">Jhon Doe
                </div>

                <div class="d-block text-center card-footer">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('modals')

@endsection

@section('js')

@endsection
