<div id="informacion_persona" class="modal fade" tabindex="-1">
    <div class="bootbox modal fade bootbox-prompt in" tabindex="-1" role="dialog"
        style="display: block; padding-right: 17px;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="bootbox-close-button close" data-dismiss="modal"
                        aria-hidden="true">×</button>
                    <h4 class="modal-title">Información Persona</h4>
                </div>
                <div class="modal-body">
                    <div class="bootbox-body">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="profile-user-info profile-user-info-striped">
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Nombre </div>
                                        <div class="profile-info-value">
                                            <span class="Nombre"></span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Tipo Identificacion </div>
                                        <div class="profile-info-value">
                                            <span class="tipo_identificacion"></span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Identificacion </div>
                                        <div class="profile-info-value">
                                            <span class="identificacion"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="profile-user-info profile-user-info-striped">

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Correo </div>
                                        <div class="profile-info-value">
                                            <span class="correo"></span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Dirección </div>

                                        <div class="profile-info-value">
                                            <span class="direccion"></span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Telefono </div>

                                        <div class="profile-info-value">
                                            <span class="telefono"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="well">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="control-group">
                                                <div class="radio">
                                                    <label>
                                                        <input name="tercero" id="tercero_inf" type="radio"
                                                            value="tercero" class="ace">
                                                        <span class="lbl"> Cliente/Proveedor</span>
                                                    </label>
                                                </div>

                                                <div class="radio">
                                                    <label>
                                                        <input name="tercero" id="agente_inf" type="radio"
                                                            value="agente" class="ace">
                                                        <span class="lbl"> Agente</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label class=""><b>Razon Social</b></label>
                                                    <select class="input-sm" style="width: 100%;"
                                                        id="tercero_id_inf" name="tercero_id" required>
                                                        <option value="">---</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label class=""><b>Tipo de Vinculo</b></label>
                                                    <select class="input-sm" style="width: 100%;"
                                                        id="vinculo_id_inf" name="vinculo_id" required>
                                                        <option value="">---</option>
                                                        @foreach ($tipo_vinculo as $tv)
                                                            <option value="{{ $tv->id }}">{{ $tv->vinculo }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <br>
                                            <button type="button" name="boton_crear_vt" id="boton_crear_vt"
                                                class="btn btn-xs btn-success btn-round"
                                                onclick="agregar_vinculo_persona()" disabled>Agregar</button>
                                            <button type="reset" name="boton_limpiar_vt" id="boton_limpiar_vt"
                                                class="btn btn-xs btn-info btn-round" 
                                                onclick="limpiar_inputs_vinc()" disabled>Limpiar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="tabla_terceros_v"
                            class="table table-mini text-nowrap table-bordered table-hover vtp">
                            <thead>
                                <tr>
                                    <th class="center">
                                        Tipo de Tercero
                                    </th>
                                    <th class="center">
                                        Razon Social
                                    </th>
                                    <th class="center">
                                        Tipo Vinculo
                                    </th>
                                    <th class="center">
                                        
                                    </th>
                                    <th class="center">
                                        
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="datos_n">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
