@extends("theme.layout")
@section('titulo')
    Terceros | Cumplimiento
@endsection


@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/js/datatables/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/js/datatables/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/datatables/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.gritter.css') }}" />
    <style>
        [class*="widget-color-"]>.widget-header>.widget-toolbar>.nav-tabs>li>a {
            border-color: transparent;
            background-color: #2b7dbc;
            color: #FFF;
            margin-right: 1px;
            font-weight: bold;
        }

        .dataTables_wrapper .row:first-child {
            padding-top: 10px;
            padding-bottom: 0px;
            background-color: #eff3f800;
        }

        .dataTables_wrapper .row:last-child {
            border-bottom: 0px solid #e0e0e000;
            padding-top: 5px;
            padding-bottom: 0px;
            background-color: #e0e0e000;
        }

        .btn-group:first-child {
            margin-left: 0;
            float: right;
        }

        .tab-content {
            border: 1px solid #c5d0dc;
            padding: 0px 12px;
            position: relative;
        }

        .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody {
            overflow-y: scroll !important;
        }

        .dataTables_scrollBody::-webkit-scrollbar-track {
            background-color: #F5F5F5;
            border-radius: 10px;
        }

        .dataTables_scrollBody::-webkit-scrollbar {
            width: 6px;
            background-color: #F5F5F5;
        }

        .dataTables_scrollBody::-webkit-scrollbar-thumb {
            background-color: rgb(82, 82, 82);
            border-radius: 10px;
        }

        .form-group select,
        .form-group textarea,
        .form-group input[type="text"],
        .form-group input[type="password"],
        .form-group input[type="datetime"],
        .form-group input[type="datetime-local"],
        .form-group input[type="date"],
        .form-group input[type="month"],
        .form-group input[type="time"],
        .form-group input[type="week"],
        .form-group input[type="number"],
        .form-group input[type="email"],
        .form-group input[type="url"],
        .form-group input[type="search"],
        .form-group input[type="tel"],
        .form-group input[type="color"] {
            background: #FFF;
            border: 1px solid #aaa;
            border-radius: 4px;
        }

        .controles-tercero {
            display: inline-block;
            padding: 0 10px;
            line-height: 37px;
            float: center;
            position: relative;
        }

        .widget-toolbar-p {
            display: inline-block;
            line-height: 37px;
            float: left;
            position: relative;
        }

    </style>
@endsection

@section('scriptsPlugins')

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('assets/js/datatables/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/js/date-time/moment.js') }}"></script>
    <script src="//cdn.datatables.net/plug-ins/1.11.3/dataRender/datetime.js"></script>
    <script src="{{ asset('assets/js/jquery.gritter.js') }}"></script>
    <script src="{{ asset('js/terceros.js') }}"></script>
    <script src="{{ asset('js/agentes.js') }}"></script>
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
                                <a data-toggle="tab" href="#terceros" id="tab_terceros" aria-expanded="false">Clientes / Proveedores</a>
                            </li>

                            <li class="">
                                <a data-toggle="tab" href="#agentes" id="tab_agentes" aria-expanded="false">Agentes</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /section:custom/widget-box.tabbed -->
                </div>

                <div class="widget-body">
                    <div class="widget-main padding-6">
                        <div class="tab-content">
                            <div id="terceros" class="tab-pane active fade in active">
                                <div class="row">
                                    <div class="widget-box widget-color-dark" id="widget-box-3">
                                        <table id="tabla_terceros"
                                            class="table text-nowrap table-bordered table-hover table-responsive">
                                            <thead>
                                                <tr>
                                                    <th class="center">
                                                        Razón Social
                                                    </th>
                                                    <th class="center">
                                                        Tipo Identificacion
                                                    </th>
                                                    <th class="center">
                                                        Identificacion
                                                    </th>
                                                    <th class="center">
                                                        Fecha Constitucion
                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>

                                <form action="{{ route('guardar_tercero') }}" method="POST" autocomplete="off"
                                    id="form_tercero">
                                    @csrf
                                    <input type="hidden" name="_method" value="" id="metodo_tercero">
                                    <div class="widget-box transparent" id="widget-box-13">
                                        <div class="widget-header">
                                            <div class="widget-toolbar no-border">
                                                <a href="#" data-action="collapse" id="collapse-gestion">
                                                    <i class="ace-icon fa fa-chevron-up"></i>
                                                </a>
                                            </div>
                                            <div class="no-border controles-tercero" id="controles_tercero">
                                                <button type="submit" name="boton_crear_t" id="boton_crear_t"
                                                    class="btn btn-sm btn-success btn-round">Crear</button>
                                                <button type="button" name="boton_nuevo_t" id="boton_nuevo_t"
                                                    class="btn btn-sm btn-success btn-round" onclick="limpiar_inputs_tercero()"
                                                    style="display:none">Nuevo</button>
                                                <button type="button" name="boton_limpiar_t" id="boton_limpiar_t"
                                                    class="btn btn-sm btn-primary btn-round"
                                                    onclick="limpiar_inputs_tercero()">limpiar</button>

                                                <button type="button" name="boton_modificar_t" id="boton_modificar_t"
                                                    class="btn btn-sm btn-info btn-round" onclick="validar_inputs_hab_tercero()"
                                                    style="display:none;" disabled>Modificar</button>
                                                <button type="submit" name="boton_guardar_t" id="boton_guardar_t"
                                                    class="btn btn-sm btn-warning btn-round" style="display:none;"
                                                    disabled>Guardar</button>

                                            </div>
                                            <div class="widget-toolbar-p no-border">
                                                <ul class="nav nav-tabs" id="myTab2">
                                                    <li class="active">
                                                        <a data-toggle="tab" href="#ib" id="ib_id"><b>Información
                                                                Basica</b></a>
                                                    </li>

                                                    <li>
                                                        <a data-toggle="tab" href="#inf" id="inf_id"><b>Información
                                                                Financiera</b></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="widget-body" id="div-gestion">
                                            <div class="widget-main padding-12 no-padding-left no-padding-right">
                                                <div class="tab-content padding-4">
                                                    <div id="ib" class="tab-pane fade in active">
                                                        <!-- #section:custom/scrollbar.horizontal -->
                                                        <div class="scrollable-horizontal" data-size="800">
                                                            @include('pages.terceros.terceros')
                                                        </div>
                                                        <!-- /section:custom/scrollbar.horizontal -->
                                                    </div>

                                                    <div id="inf" class="tab-pane fade">
                                                        <div class="scrollable" data-size="100" data-position="left">
                                                            @include('pages.terceros.form_if')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>
                            <div id="agentes" class="tab-pane fade">
                                <form action="{{ route('guardar_agente') }}" method="POST" autocomplete="off"
                                    id="form_agente">
                                    @csrf
                                    <input type="hidden" name="_method" value="" id="metodo_agente">
                                    <div class="widget-box transparent" id="widget-box-13">
                                        <div class="widget-header">
                                            <div class="widget-toolbar no-border">
                                                <a href="#" data-action="collapse" id="collapse-gestion-a">
                                                    <i class="ace-icon fa fa-chevron-up"></i>
                                                </a>
                                            </div>
                                            <div class="no-border controles-tercero" id="controles_agente">
                                                <button type="submit" name="boton_crear_a" id="boton_crear_a"
                                                    class="btn btn-sm btn-success btn-round">Crear</button>
                                                <button type="button" name="boton_nuevo_a" id="boton_nuevo_a"
                                                    class="btn btn-sm btn-success btn-round" onclick="limpiar_inputs_agente()"
                                                    style="display:none">Nuevo</button>
                                                <button type="button" name="boton_limpiar_a" id="boton_limpiar_a"
                                                    class="btn btn-sm btn-primary btn-round"
                                                    onclick="limpiar_inputs_agente()">limpiar</button>

                                                <button type="button" name="boton_modificar_a" id="boton_modificar_a"
                                                    class="btn btn-sm btn-info btn-round" onclick="validar_inputs_hab_agente()"
                                                    style="display:none;" disabled>Modificar</button>
                                                <button type="submit" name="boton_guardar_a" id="boton_guardar_a"
                                                    class="btn btn-sm btn-warning btn-round" style="display:none;"
                                                    disabled>Guardar</button>
                                            </div>
                                            <div class="widget-toolbar-p no-border">
                                                <ul class="nav nav-tabs" id="myTab2">
                                                    <li class="active">
                                                        <a data-toggle="tab" href="#ib_a" id="ib_id_a"><b>Información
                                                                Basica</b></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="widget-body" id="div-gestion-a">
                                            <div class="widget-main padding-12 no-padding-left no-padding-right">
                                                <div class="tab-content padding-4">
                                                    <div id="ib_a" class="tab-pane fade in active">
                                                        <!-- #section:custom/scrollbar.horizontal -->
                                                        <div class="scrollable-horizontal" data-size="800">
                                                            @include('pages.terceros.agentes')
                                                        </div>
                                                        <!-- /section:custom/scrollbar.horizontal -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="widget-box widget-color-dark" id="widget-box-3">
                                        <table id="tabla_agentes" class="table text-nowrap table-bordered table-hover">
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
                                                        Pais
                                                    </th>
                                                    <th class="center">
                                                        Ciudad
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
