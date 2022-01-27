@extends("theme.layout")
@section('titulo')
    Solicitud Validación | Cumplimiento
@endsection


@section('styles')
    <style>
        input[type=radio].ace+.lbl {
            margin-right: 20px;
        }

        .bolder {
            font-weight: bolder;
            margin-right: 30px;
        }

    </style>
@endsection

@section('scriptsPlugins')

@endsection

@section('scripts')
    <script src="{{ asset('js/solicitud_validacion.js') }}"></script>
    <script>
        $('.scrollable').each(function() {
            var $this = $(this);
            $(this).ace_scroll({
                size: $this.attr('data-size') || 100,
                //styleClass: 'scroll-left scroll-margin scroll-thin scroll-dark scroll-light no-track scroll-visible'
            });
        });
        $('.scrollable-horizontal').each(function() {
            var $this = $(this);
            $(this).ace_scroll({
                horizontal: true,
                styleClass: 'scroll-top', //show the scrollbars on top(default is bottom)
                size: $this.attr('data-size') || 500,
                mouseWheelLock: true
            }).css({
                'padding-top': 12
            });
        });
    </script>
@endsection

@section('contenido')
    <div class="main-content">
        <div class="col-xs-12 widget-container-col ui-sortable" id="widget-container-col-7">
            <div class="widget-box widget-color-dark ui-sortable-handle" id="widget-box-7">
                <div class="widget-header widget-header-small">
                    <h4 class="widget-title smaller"><strong>Solicitar Validación</strong></h4>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="alert">
                                    <div class="control-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label bolder">Tercero</label>
                                                <label>
                                                    <input name="radio_estado" type="radio" id="nuevo_t" value="nuevo"
                                                        class="ace">
                                                    <span class="lbl"> Nuevo</span>
                                                </label>
                                                <label>
                                                    <input name="radio_estado" type="radio" id="antiguo_t" value="antiguo"
                                                        class="ace">
                                                    <span class="lbl"> Antiguo</span>
                                                </label>
                                            </div>
                                            <div class="col-sm-4" id="div_tipo" style="display: none">
                                                <label class="control-label bolder">Tipo</label>
                                                <label>
                                                    <input name="radio_tipo" type="radio" id="radio_tercero" value="tercero"
                                                        class="ace">
                                                    <span class="lbl"> Cliente / Proveedor</span>
                                                </label>
                                                <label>
                                                    <input name="radio_tipo" type="radio" id="radio_agente" value="agente"
                                                        class="ace">
                                                    <span class="lbl"> Agente</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row"  id="div_nuevo" style="display: none">
                            <div class="col-xs-12 widget-container-col" id="widget-container-col-3">
                                <div class="widget-box widget-color-blue" id="widget-box-3">
                                    <!-- #section:custom/widget-box.options.collapsed -->
                                    <div class="widget-header widget-header-small">
                                        <h6 class="widget-title">
                                            Tercero Nuevo
                                        </h6>
                                    </div>

                                    <!-- /section:custom/widget-box.options.collapsed -->
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <div id="form_tercero" style="display: none">
                                                @include('pages.sol_validacion.tercero_nuevo')
                                            </div>
                                            <div id="form_agente" style="display: none">
                                                @include('pages.sol_validacion.agente_nuevo')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row"  id="div_antiguo"  style="display: none">
                            <div class="col-xs-12 widget-container-col" id="widget-container-col-3">
                                <div class="widget-box widget-color-green" id="widget-box-3">
                                    <!-- #section:custom/widget-box.options.collapsed -->
                                    <div class="widget-header widget-header-small">
                                        <h6 class="widget-title">
                                            Tercero Antiguo
                                        </h6>
                                    </div>

                                    <!-- /section:custom/widget-box.options.collapsed -->
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            @include('pages.sol_validacion.tercero_antiguo')
                                        </div>
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
