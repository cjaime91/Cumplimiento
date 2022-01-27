@extends("theme.layout")
@section('titulo')
    Personas | Cumplimiento
@endsection

@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/js/datatables/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/js/datatables/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/datatables/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
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

        .controles-persona {
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

        .well {
            padding: 9px;
            margin-bottom: 1px;
        }

        .profile-info-name {
            width: 160px;
        }

        .modal-lg {
            width: 1000px;
        }

        .modal-confirm {
            display: block;
            padding-right: 19px;
            padding-top: 15%;
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
    <script src="{{ asset('assets/js/bootbox.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootbox.locales.min.js') }}"></script>
    <script src="{{ asset('js/personas.js') }}"></script>
@endsection

@section('contenido')
    <div class="main-content">
        <div class="col-xs-12 widget-container-col ui-sortable" id="widget-container-col-7">
            <div class="widget-box widget-color-dark ui-sortable-handle" id="widget-box-7">
                <div class="widget-header widget-header-small">
                    <h4 class="widget-title smaller"><strong>Gestión de Personas</strong></h4>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <form action="{{ route('guardar_persona') }}" method="POST" autocomplete="off" id="form_persona">
                            @csrf
                            <input type="hidden" name="_method" value="" id="metodo_persona">
                            <!-- #section:custom/widget-box.options.transparent -->
                            <div class="widget-box transparent ui-sortable-handle" id="widget-box-12" style="opacity: 1;">
                                <div class="widget-header">
                                    <h4 class="widget-title lighter"><b>Persona</b></h4>
                                    <div class="widget-toolbar no-border">
                                        <a href="#" data-action="collapse" id="collapse-persona">
                                            <i class="ace-icon fa fa-chevron-up"></i>
                                        </a>
                                    </div>
                                    <div class="no-border controles-persona" id="controles_persona">
                                        <button type="submit" name="boton_crear_p" id="boton_crear_p"
                                            class="btn btn-sm btn-success btn-round">Crear</button>
                                        <button type="button" name="boton_nuevo_p" id="boton_nuevo_p"
                                            class="btn btn-sm btn-success btn-round" style="display:none"
                                            onclick="limpiar_inputs_persona()">Nuevo</button>
                                        <button type="button" name="boton_limpiar_p" id="boton_limpiar_p"
                                            class="btn btn-sm btn-primary btn-round">limpiar</button>
                                        <button type="button" name="boton_modificar_p" id="boton_modificar_p"
                                            class="btn btn-sm btn-info btn-round" style="display:none;"
                                            onclick="validar_inputs_persona()" disabled>Modificar</button>
                                        <button type="submit" name="boton_guardar_p" id="boton_guardar_p"
                                            class="btn btn-sm btn-warning btn-round" style="display:none;"
                                            disabled>Guardar</button>
                                    </div>
                                </div>

                                <div class="widget-body" style="display: block;" id="div-persona">
                                    <div class="widget-main padding-6 no-padding-left no-padding-right">
                                        @include('pages.personas.form')
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="widget-box widget-color-dark" id="widget-box-3">
                            <table id="tabla_personas" class="table table-sm text-nowrap table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="center">
                                            Nombre
                                        </th>
                                        <th class="center">
                                            Tipo Identificacion
                                        </th>
                                        <th class="center">
                                            Identificacion
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
        @include('pages.personas.informacion')
    </div>
@endsection
