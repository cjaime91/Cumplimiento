<div id="sidebar" class="sidebar responsive ace-save-state">

    <ul class="nav nav-list">
        <li class="{{ !Route::is('dashboard') ?: 'active' }} hover">
            <a href="{{ route('dashboard') }}">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>

            <b class="arrow"></b>
        </li>
        <li class="{{ !Route::is('validacion') ?: 'active' }} hover">
            <a href="{{ route('validacion') }}">
                <i class="menu-icon fa-solid fa-user-shield"></i>
                <span class="menu-text"> Validaciones </span>
            </a>

            <b class="arrow"></b>
        </li>
        <li class="{{ !Route::is('personas') ?: 'active' }} hover">
            <a href="{{ route('personas') }}">
                <i class="menu-icon fa-solid fa-users"></i>
                <span class="menu-text"> Personas </span>
            </a>

            <b class="arrow"></b>
        </li>
        <li class="{{ !Route::is('terceros') ?: 'active' }} {{ !Route::is('inf_fin') ?: 'active' }} hover">
            <a href="#">
                <i class="menu-icon fa-solid fa-address-card"></i>
                <span class="menu-text"> Gestión Terceros </span>
            </a>

            <b class="arrow"></b>
            <ul class="submenu">
                <li class="{{ !Route::is('terceros') ?: 'active' }} hover">
                    <a href="{{ route('terceros') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Listado
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="{{ !Route::is('inf_fin') ?: 'active' }} hover">
                    <a href="{{ route('inf_fin') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Información Financiera
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    </ul><!-- /.nav-list -->
</div>
