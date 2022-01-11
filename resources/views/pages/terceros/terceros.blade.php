<div class="widget-main">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group row">
                <div class="col-sm-12">
                    <label class=""><b>Razon Social</b></label>
                    <input type="text" class="form-control input-sm" placeholder="" id="razon_social" name="razon_social"
                        required>
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group row">
                <div class="col-sm-12">
                    <label class=""><b>Tipo Identificación</b></label>
                    <select class="input-sm" style="width: 100%;" id="tipo_identificacion_id"
                        name="tipo_identificacion_id" required>
                        <option value="">--Seleccione--</option>
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
        <div class="col-sm-2">
            <div class="form-group row">
                <div class="col-sm-12">
                    <label><b>Fecha Constitución</b></label>
                    <input type="date" id="fecha_constitucion" name="fecha_constitucion"
                        class="form-control center input-sm" placeholder="dd/mm/yyyy" required />
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2">
            <div class="form-group row">
                <div class="col-sm-12">
                    <label class=""><b>Tipo de Sociedad</b></label>
                    <select class="input-sm" style="width: 100%;" id="tipo_sociedad_id" name="tipo_sociedad_id"
                        required>
                        <option value="">--Seleccione--</option>
                        @foreach ($tipo_sociedad as $ts)
                            <option value="{{ $ts->id }}">{{ $ts->abreviacion }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group row">
                <div class="col-sm-12">
                    <label class=""><b>Correo</b></label>
                    <input type="text" class="form-control input-sm" placeholder="" id="correo" name="correo" required>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group row">
                <div class="col-sm-12">
                    <label class=""><b>Direccion</b></label>
                    <input type="text" class="form-control input-sm" placeholder="" id="direccion" name="direccion"
                        required>
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group row">
                <div class="col-sm-12">
                    <label class=""><b>Telefono</b></label>
                    <input type="text" class="form-control input-sm" placeholder="" id="telefono" name="telefono"
                        required>
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="row">
                <div class="col-sm-12">
                    <label><b>Actividad Economica</b></label>
                    <input type="text" class="form-control input-sm" placeholder="" id="actividad_economica"
                        name="actividad_economica">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group row">
                <div class="col-sm-12">
                    <label><b>Pais</b></label>
                    <select class="form-control input-sm" style="width: 100%;" id="pais_id" name="pais_id" required>
                        <option value="">--Seleccione--</option>
                        @foreach ($paises as $pais)
                            <option value="{{ $pais->id }}">{{ $pais->pais }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="row">
                <div class="col-sm-12">
                    <label><b>Ciudad</b></label>
                    <select class="input-sm" style="width: 100%;" id="ciudad_id" name="ciudad_id" required>
                        <option value="">--Seleccione--</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="row">
                <div class="col-sm-12">
                    <label><b>Departamento</b></label>
                    <select class="input-sm" style="width: 100%;" id="departamento_id" name="departamento_id"
                        required>
                        <option value="">--Seleccione--</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="row">
                <div class="col-sm-12">
                    <label><b>Barrio</b></label>
                    <input type="text" class="form-control input-sm" placeholder="" id="barrio" name="barrio">
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <br>
            <button class="btn btn-sm btn-success btn-round pull-right">Crear</button>
        </div>
    </div>
</div>
