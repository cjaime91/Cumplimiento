@extends("theme.layout")
@section('titulo')
    Personas | Cumplimiento
@endsection

@section('styles')
    <style>
        .well {
            margin-bottom: 1px;
        }

    </style>
@endsection

@section('scriptsPlugins')

@endsection

@section('scripts')

@endsection

@section('contenido')
    <div class="col-xs-12 widget-container-col ui-sortable" id="widget-container-col-7">
        <div class="widget-box widget-color-dark ui-sortable-handle" id="widget-box-7">
            <div class="widget-header widget-header-small">
                <h4 class="widget-title smaller"><strong>Gestión de Personas</strong></h4>
            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <div class="row">
                        <div class="col-sm-11">
                            @include('pages.personas.form')
                        </div>
                        <div class="col-sm-1">
                            <button type="submit" class="col-sm-12 btn btn-app btn-xs btn-success pull-right">
                                <i class="ace-icon fa fa-check"></i>
                                <b>Crear</b>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="widget-body">
                            <div class="widget-main">
                                <div class="content">
                                    <table id="tabla_paises" class="table text-nowrap table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="center">
                                                    Nombre
                                                </th>
                                                <th class="center">
                                                    Identificacion
                                                </th>
                                                <th class="center">
                                                    Cargo
                                                </th>
                                                <th class="center">
                                                    Correo
                                                </th>
                                                <th class="center">
                                                    Dirección
                                                </th>
                                                <th class="center">
                                                    Telefono
                                                </th>
                                                <th class="center">

                                                </th>
                                            </tr>
                                        </thead>
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
