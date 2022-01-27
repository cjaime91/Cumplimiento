<div class="row">
    <div class="col-sm-4">
        <div class="form-group row">
            <div class="col-sm-12">
                <label class=""><b>Nombre Completo</b></label>
                <input type="text" class="form-control input-sm" placeholder="" id="nombre" name="nombre" required>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
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
    <div class="col-sm-3">
        <div class="form-group row">
            <div class="col-sm-12">
                <label class=""><b>Correo</b></label>
                <input type="text" class="form-control input-sm" placeholder="" id="correo" name="correo" required>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group row">
            <div class="col-sm-12">
                <label class=""><b>Direccion</b></label>
                <input type="text" class="form-control input-sm" placeholder="" id="direccion" name="direccion" required>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group row">
            <div class="col-sm-12">
                <label class=""><b>Telefono</b></label>
                <input type="text" class="form-control input-sm" placeholder="" id="telefono" name="telefono" required>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <h4 class="blue">Vincular a un Tercero</h4>
        <div class="well">
            <div class="row">
                <div class="col-sm-3">
                    <div class="control-group">
                        <div class="radio">
                            <label>
                                <input name="tercero" id="tercero" type="radio" value="tercero" class="ace">
                                <span class="lbl"> Cliente/Proveedor</span>
                            </label>
                        </div>

                        <div class="radio">
                            <label>
                                <input name="tercero" id="agente" type="radio" value="agente" class="ace">
                                <span class="lbl"> Agente</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class=""><b>Razon Social</b></label>
                            <select class="input-sm" style="width: 100%;" id="tercero_id" name="tercero_id" required>
                                <option value="">---</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class=""><b>Tipo de Vinculo</b></label>
                            <select class="input-sm" style="width: 100%;" id="vinculo_id" name="vinculo_id" required>
                                <option value="">---</option>
                                @foreach ($tipo_vinculo as $tv)
                                    <option value="{{ $tv->id }}">{{ $tv->vinculo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
