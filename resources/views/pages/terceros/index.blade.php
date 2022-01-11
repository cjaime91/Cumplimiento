@extends("theme.layout")
@section('titulo')
    Terceros | Cumplimiento
@endsection


@section('styles')
    <style>
        [class*="widget-color-"]>.widget-header>.widget-toolbar>.nav-tabs>li>a {
            border-color: transparent;
            background-color: #2b7dbc;
            color: #FFF;
            margin-right: 1px;
            font-weight: bold;
        }

        .tab-content {
            border: 1px solid #c5d0dc;
            padding: 0px 12px;
            position: relative;
        }

    </style>
@endsection

@section('scriptsPlugins')

@endsection

@section('scripts')

@endsection


@section('contenido')
    <div class="main-content">
        <div class="col-xs-12 widget-container-col ui-sortable" id="widget-container-col-7">
            <div class="widget-box widget-color-dark ui-sortable-handle" id="widget-box-7">

                <div class="widget-header widget-header-small">
                    <h4 class="widget-title smaller">Terceros</h4>

                    <!-- #section:custom/widget-box.tabbed -->
                    <div class="widget-toolbar no-border">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active">
                                <a data-toggle="tab" href="#home" aria-expanded="false">Clientes/Proveedores</a>
                            </li>

                            <li class="">
                                <a data-toggle="tab" href="#profile" aria-expanded="false">Agentes</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /section:custom/widget-box.tabbed -->
                </div>

                <div class="widget-body">
                    <div class="widget-main padding-6">
                        <div class="tab-content">
                            <div id="home" class="tab-pane active">
                                <div class="row">
                                    <div class="widget-box widget-color-dark" id="widget-box-3">
                                        @include('pages.terceros.terceros')
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="widget-box widget-color-dark" id="widget-box-3">
                                        <table id="tabla_paises" class="table text-nowrap table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="center">
                                                        Razón Social
                                                    </th>
                                                    <th class="center">
                                                        Identificacion
                                                    </th>
                                                    <th class="center">
                                                        Fecha Constitucion
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

                            <div id="profile" class="tab-pane">
                                <div class="row">
                                    <div class="widget-box widget-color-dark" id="widget-box-3">
                                        @include('pages.terceros.agentes')
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="widget-box widget-color-dark" id="widget-box-3">
                                        <table id="tabla_paises" class="table text-nowrap table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="center">
                                                        Razón Social
                                                    </th>
                                                    <th class="center">
                                                        Identificacion
                                                    </th>
                                                    <th class="center">
                                                        Correo
                                                    </th>
                                                    <th class="center">
                                                        Direccion
                                                    </th>
                                                    <th class="center">
                                                        Telefono
                                                    </th>
                                                    <th class="center">
                                                        Ciudad
                                                    </th>
                                                    <th class="center">
                                                        Pais
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
    </div>
@endsection
