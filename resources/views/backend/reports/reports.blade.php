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
                    <i class="pe-7s-print icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Reportes
                    <div class="page-title-subheading">En el siguiente filtro puede generar reportes descargables
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="conatiner card">
                <div class="card-header text-dark">
                    <div class="mx-auto">
                        Filtros de seleccion
                    </div>
                </div>
                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modals')
@endsection

@section('js')
@endsection
