<div class="row">
    <div class="col-sm-5">
        <div class="form-group row">
            <div class="col-sm-12">
                <label class=""><b>Nombre o Razon Social</b></label>
                <input type="text" class="form-control input-sm" placeholder="" id="razon_social" name="razon_social"
                    required>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group row">
            <div class="col-sm-12">
                <label class=""><b>Tipo de Sociedad</b></label>
                <select class="input-sm" style="width: 100%;" id="tipo_sociedad_id" name="tipo_sociedad_id"
                    required>
                    <option value="">---</option>
                    @foreach ($tipo_sociedad as $ts)
                        <option value="{{ $ts->id }}">{{ $ts->abreviacion }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group row">
            <div class="col-sm-12">
                <label class=""><b>Tipo Identificación</b></label>
                <select class="input-sm" style="width: 100%;" id="tipo_identificacion_id"
                    name="tipo_identificacion_id" required>
                    <option value="">---</option>
                    @foreach ($tipo_identificacion as $ti)
                        <option value="{{ $ti->id }}">{{ $ti->abreviacion }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group row">
            <div class="col-sm-12">
                <label class=""><b>Identificación</b></label>
                <input type="text" class="form-control input-sm" placeholder="" id="identificacion"
                    name="identificacion" required>
            </div>
        </div>
    </div>
    <div class="col-sm-1">
        <div class="form-group row">
            <div class="col-sm-12">
                <label class=""><b>Cod. Ver.</b></label>
                <input type="text" class="form-control input-sm" placeholder="" id="cod_v" name="cod_v">
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        <div class="form-group row">
            <div class="col-sm-12">
                <label class=""><b>Tipo de Tercero</b></label>
                <select class="input-sm" style="width: 100%;" id="tipo_tercero_id" name="tipo_tercero_id"
                    required>
                    <option value="">---</option>
                    @foreach ($tipo_tercero as $tt)
                        <option value="{{ $tt->id }}">{{ $tt->tipo_tercero }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group row">
            <div class="col-sm-12">
                <label><b>Fecha Constitución</b></label>
                <input type="date" id="fecha_constitucion" name="fecha_constitucion"
                    class="form-control center input-sm" placeholder="dd/mm/yyyy" />
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group row">
            <div class="col-sm-12">
                <label class=""><b>Correo</b></label>
                <input type="text" class="form-control input-sm" placeholder="" id="correo" name="correo" required>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group row">
            <div class="col-sm-12">
                <label class=""><b>Direccion</b></label>
                <input type="text" class="form-control input-sm" placeholder="" id="direccion" name="direccion"
                    required>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        <div class="form-group row">
            <div class="col-sm-12">
                <label class=""><b>Telefono</b></label>
                <input type="text" class="form-control input-sm" placeholder="" id="telefono" name="telefono" required>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="row">
            <div class="col-sm-12">
                <label><b>Actividad Economica</b></label>
                <input type="text" class="form-control input-sm" placeholder="" id="actividad_economica"
                    name="actividad_economica" required>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group row">
            <div class="col-sm-12">
                <label><b>Pais</b></label>
                <select class="form-control input-sm" style="width: 100%;" id="pais_id" name="pais_id" required>
                    <option value="">---</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="row">
            <div class="col-sm-12">
                <label><b>Ciudad</b></label>
                <select class="input-sm" style="width: 100%;" id="ciudad_id" name="ciudad_id" required>
                    <option value="">---</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="row">
            <div class="col-sm-12">
                <label><b>Departamento</b></label>
                <select class="input-sm" style="width: 100%;" id="departamento_id" name="departamento_id"
                    disabled>
                    <option value="">---</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        @if ($errors->any())
            <div id="modal-alert" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="widget-box widget-color-dark light-border" id="widget-box-6">
                        <div class="widget-container-col ui-sortable" id="widget-container-col-5">
                            <div class="widget-box ui-sortable-handle" id="widget-box-5">
                                <div class="widget-body">
                                    <div class="widget-main padding-6">
                                        <div class="alert alert-danger alerta_form">
                                            <h5><i class="icon fas fa-ban"></i> Error en el Formulario</h5>
                                            <ul>
                                                @if ($errors->has('razon_social'))
                                                    <li>La razon social ingresada en el tercero ya existe</li>
                                                @endif

                                                @if ($errors->has('identificacion'))
                                                    <li>La identificación ingresada en el tercero ya existe</li>
                                                @endif

                                                @if ($errors->has('razon_social_a'))
                                                    <li>La razon social ingresada en el agente ya existe</li>
                                                @endif

                                                @if ($errors->has('identificacion_a'))
                                                    <li>La identificacion ingresada en el agente ya existe</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
