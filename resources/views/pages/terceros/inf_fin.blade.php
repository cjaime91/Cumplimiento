@extends("theme.layout")
@section('titulo')
    Información Financiera | Tercero
@endsection

@if (Auth::check())
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
@endif

@section('contenido')
<div class="col-xs-12 widget-container-col ui-sortable" id="widget-container-col-7">
    <div class="widget-box widget-color-dark ui-sortable-handle" id="widget-box-7">
        <div class="widget-header widget-header-small">
            <h4 class="widget-title smaller"><strong>Informacion Financiera</strong></h4>
        </div>

        <div class="widget-body">
            <div class="widget-main">
                <div class="row">
                    <div class="col-sm-12">
                        @include('pages.terceros.form_if')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
