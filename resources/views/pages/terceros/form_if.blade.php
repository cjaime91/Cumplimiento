<div class="row">
    <div class="col-sm-6">
        <div class="form-group row">
            <div class="col-sm-12">
                <label class=""><b>Razon Social</b></label>
                <select class="input-sm" style="width: 100%;" id="tercero_id" name="tercero_id" required>
                    <option value="">--Seleccione--</option>
                    @foreach ($terceros_if as $tercero_if)
                        <option value="{{ $tercero_if->id }}">{{ $tercero_if->razon_social }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group row">
            <div class="col-sm-12">
                <label class=""><b>Año</b></label>
                <select class="input-sm" style="width: 100%;" id="anio" name="anio" required>
                    <option value="">--Seleccione--</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        <div class="form-group row">
            <div class="col-sm-12">
                <label class=""><b>Activo Corriente</b></label>
                <div class="">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" class="form-control text-right input-sm" placeholder="0" id="activo_cte"
                            name="activo_cte" maxlength="9"
                            onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group row">
            <div class="col-sm-12">
                <label class=""><b>Activo Total</b></label>
                <div class="">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" class="form-control text-right input-sm" placeholder="0" id="activo_total"
                            name="activo_total" maxlength="9"
                            onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group row">
            <div class="col-sm-12">
                <label class=""><b>Pasivo Corriente</b></label>
                <div class="">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" class="form-control text-right input-sm" placeholder="0" id="pasivo_cte"
                            name="pasivo_cte" maxlength="9"
                            onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group row">
            <div class="col-sm-12">
                <label class=""><b>Pasivo Total</b></label>
                <div class="">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" class="form-control text-right input-sm" placeholder="0" id="pasivo_total"
                            name="pasivo_total" maxlength="9"
                            onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group row">
            <div class="col-sm-12">
                <label class=""><b>Utilidad Operacional</b></label>
                <div class="">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" class="form-control text-right input-sm" placeholder="0" id="utilidad_oper"
                            name="utilidad_oper" maxlength="9"
                            onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group row">
            <div class="col-sm-12">
                <label class=""><b>Patrimonio</b></label>
                <div class="">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" class="form-control text-right input-sm" placeholder="0" id="patrimonio"
                            name="patrimonio" maxlength="9"
                            onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        <div class="form-group row">
            <div class="col-sm-12">
                <label class=""><b>Inventario</b></label>
                <div class="">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" class="form-control text-right input-sm" placeholder="0" id="inventario"
                            name="inventario" maxlength="9"
                            onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group row">
            <div class="col-sm-12">
                <label class=""><b>Ingresos Mensuales</b></label>
                <div class="">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" class="form-control text-right input-sm" placeholder="0" id="ingresos_mensuales"
                            name="ingresos_mensuales" maxlength="9"
                            onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group row">
            <div class="col-sm-12">
                <label class=""><b>Egresos Mensuales</b></label>
                <div class="">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" class="form-control text-right input-sm" placeholder="0" id="egresos_mensuales"
                            name="egresos_mensuales" maxlength="9"
                            onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group row">
            <div class="col-sm-12">
                <label class=""><b>Activos</b></label>
                <div class="">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" class="form-control text-right input-sm" placeholder="0" id="activos"
                            name="activos" maxlength="9"
                            onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group row">
            <div class="col-sm-12">
                <label class=""><b>Pasivos</b></label>
                <div class="">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" class="form-control text-right input-sm" placeholder="0" id="pasivos"
                            name="pasivos" maxlength="9"
                            onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
