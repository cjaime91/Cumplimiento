<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>@yield('titulo','Cumplimiento')</title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}" />

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="{{ asset('assets/css/ace-fonts.css') }}" />
    <link rel="stylesheet" href="{{ asset("assets/fontawesome/css/fontawesome.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/fontawesome/css/solid.css") }}" />
    <!-- ace styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/ace.css') }}" class="ace-main-stylesheet" id="main-ace-style" />
    <style>
        .form_user {
            font-size: 13px;
            padding-right: 11px;

            margin-top: -15px;
            margin-bottom: -10px;
        }

        .navbar-default .btn-link {
            color: #000000;
        }

    </style>
    @yield('styles')
</head>

<body class="no-skin">
    <!-- Inicio Header -->
    @include('theme.header')
    <!-- Fin header -->


    <div class="main-container ace-save-state" id="main-container">
        <!-- Inicio Aside -->
        @include('theme.aside')
        <!-- Fin Aside -->

        <!-- Inicio Contenido -->
        
        <div class="main-content">
            <div class="main-content-inner">
                @yield('contenido')
            </div>
        </div>
        <!-- Fin Contenido -->

        <!-- Inicio Footer -->
        @include('theme.footer')
        <!-- Fin Footer -->

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
    </div>

    <!--[if !IE]> -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>

    <!-- <![endif]-->

    <!--[if IE]>
    <script src="assets/js/jquery1x.js"></script>
    <![endif]-->
    <script type="text/javascript">
        if ('ontouchstart' in document.documentElement) document.write(
            "<script src='assets/js/jquery.mobile.custom.js'>" + "<" + "/script>");
    </script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>

    <!-- page specific plugin scripts -->

    <!-- ace scripts -->
    <script src="{{ asset('assets/js/ace/elements.scroller.js') }}"></script>
    <script src="{{ asset('assets/js/ace/elements.colorpicker.js') }}"></script>
    <script src="{{ asset('assets/js/ace/elements.fileinput.js') }}"></script>
    <script src="{{ asset('assets/js/ace/elements.typeahead.js') }}"></script>
    <script src="{{ asset('assets/js/ace/elements.wysiwyg.js') }}"></script>
    <script src="{{ asset('assets/js/ace/elements.spinner.js') }}"></script>
    <script src="{{ asset('assets/js/ace/elements.treeview.js') }}"></script>
    <script src="{{ asset('assets/js/ace/elements.wizard.js') }}"></script>
    <script src="{{ asset('assets/js/ace/elements.aside.js') }}"></script>
    <script src="{{ asset('assets/js/ace/ace.js') }}"></script>
    <script src="{{ asset('assets/js/ace/ace.ajax-content.js') }}"></script>
    <script src="{{ asset('assets/js/ace/ace.touch-drag.js') }}"></script>
    <script src="{{ asset('assets/js/ace/ace.sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/ace/ace.sidebar-scroll-1.js') }}"></script>
    <script src="{{ asset('assets/js/ace/ace.submenu-hover.js') }}"></script>
    <script src="{{ asset('assets/js/ace/ace.widget-box.js') }}"></script>
    <script src="{{ asset('assets/js/ace/ace.settings.js') }}"></script>
    <script src="{{ asset('assets/js/ace/ace.settings-rtl.js') }}"></script>
    <script src="{{ asset('assets/js/ace/ace.settings-skin.js') }}"></script>
    <script src="{{ asset('assets/js/ace/ace.widget-on-reload.js') }}"></script>
    <script src="{{ asset('assets/js/ace/ace.searchbox-autocomplete.js') }}"></script>

    <!-- inline scripts related to this page -->

    <!-- the following scripts are used in demo only for onpage help and you don't need them -->
    <link rel="stylesheet" href="{{ asset('assets/css/ace.onpage-help.css') }}" />
    <link rel="stylesheet" href="{{ asset('docs/assets/js/themes/sunburst.css') }}" />

    <script type="text/javascript">
        ace.vars['base'] = '..';
    </script>
    <script src="{{ asset('assets/js/ace/elements.onpage-help.js') }}"></script>
    <script src="{{ asset('assets/js/ace/ace.onpage-help.js') }}"></script>
    <script src="{{ asset('docs/assets/js/rainbow.js') }}"></script>
    <script src="{{ asset('docs/assets/js/language/generic.js') }}"></script>
    <script src="{{ asset('docs/assets/js/language/html.js') }}"></script>
    <script src="{{ asset('docs/assets/js/language/css.js') }}"></script>
    <script src="{{ asset('docs/assets/js/language/javascript.js') }}"></script>
</body>

</html>
