var pais_select = $('#pais_id');
var ciudad_select = $('#ciudad_id');
var departamentos_select = $('#departamento_id');
var barrio = $('#barrio');

pais_select.select2();
ciudad_select.select2();
departamentos_select.select2();
$('#tipo_identificacion_id').select2();
$('#tipo_sociedad_id').select2();
$('#tercero_id').select2();
$('#anio').select2();

$('#tercero_id').removeAttr('required');
$('#anio').removeAttr('required');

var anio = moment().format("YYYY");

function PaisSelect() {
    $.ajax({
        url: "/terceros/getPaises",
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            $.each(response.data, function (key, value) {
                pais_select.append("<option value='" + value.id + "'>" + value.pais +
                    "</option>")
            });
        },
        error: function () {
            alert('Hubo un error obteniendo los Paises');
        }
    });
}
PaisSelect();

function llenar_ciu_dep($id_pais, $id_ciudad, $id_dep) {
    var pais_seleccionado = $id_pais;
    ciudad_select.empty();
    ciudad_select.append('<option value="">--Seleccione--</option>');
    if (pais_seleccionado) {
        $.ajax({
            url: "/terceros/getCiudades",
            type: 'GET',
            data: {
                id_pais: pais_seleccionado
            },
            dataType: 'json',
            success: function (response) {
                $.each(response.data, function (key, value) {
                    ciudad_select.append("<option value='" + value.id + "'>" + value
                        .ciudad + "</option>")
                });
                if ($id_ciudad != "") {
                    ciudad_select.val($id_ciudad);
                    ciudad_select.trigger("change");
                }
            },
            error: function () {
                alert('Hubo un error obteniendo los Ciudades');
            }
        });
    }

    if ($('#pais_id option:selected').text() == 'Colombia') {
        departamentos_select.removeAttr('disabled');
        barrio.removeAttr('disabled');
        departamentos_select.empty();
        departamentos_select.append('<option value="">--Seleccione--</option>');
        $.ajax({
            url: "/terceros/getDepartamentos",
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                $.each(response.data, function (key, value) {
                    departamentos_select.append("<option value='" + value.id + "'>" +
                        value.departamento + "</option>")
                });
                if ($id_dep != "") {
                    departamentos_select.val($id_dep);
                    departamentos_select.trigger("change");
                }
            },
            error: function () {
                alert('Hubo un error obteniendo los Departamentos');
            }
        });
    } else {
        departamentos_select.empty();
        departamentos_select.append('<option value="">--Seleccione--</option>');
        departamentos_select.attr('disabled', 'disabled');
        barrio.attr('disabled', 'disabled');
        barrio.val('');
    }
}

pais_select.change(function () {
    llenar_ciu_dep(pais_select.val(), "", "");
})

function cargar_tabla_terceros() {
    var table = $('#tabla_terceros').DataTable();

    var data = table
        .rows()
        .data();
        
    if (data.length == 0) {
        var tabla_tercero = $('#tabla_terceros').DataTable({
            destroy: true,
            buttons: [{
                "extend": "copy",
                "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
                "className": "btn btn-white btn-primary btn-bold"
            },
            {
                "extend": "excel",
                "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
                "className": "btn btn-white btn-primary btn-bold"
            },
            {
                "extend": "pdf",
                "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
                "className": "btn btn-white btn-primary btn-bold"
            }
            ],
            processing: true,
            scrollY: "300px",
            dom: "<'row'<'col-sm-8'l><'col-sm-4'B>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            serverSide: true,
            ajax: "/terceros/getTerceros",
            columns: [{
                data: 'razon_social',
                name: 'razon_social',
            }, {
                data: 'identificacion_t',
                name: 'identificacion_t',
            }, {
                data: 'identificacion',
                name: 'identificacion',
            },
            {
                data: 'fecha_constitucion',
                name: 'fecha_constitucion',

            }
            ],
            columnDefs: [{
                targets: 3,
                render: $.fn.dataTable.render.moment('DD/MM/YYYY')
            }],
            responsive: true,
            lengthChange: true,
            lengthMenu: [
                [10, 25, 50, 75, 100, -1],
                [10, 25, 50, 75, 100, "ALL"]
            ],

        });

        $('#tabla_terceros tbody').on('click', 'tr', function () {
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
                limpiar_inputs_tercero();
                $('#boton_modificar_t').css('display', 'none');
                $('#boton_guardar_t').css('display', 'none');
                $('#boton_limpiar_t').css('display', '');
            } else {
                tabla_tercero.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
                var tr = $(this).closest('tr');
                var row = tabla_tercero.row(tr);
                format_datos_tercero(row.data());
            }
        });
    }

}
cargar_tabla_terceros();

$("#tab_terceros").click(function () {
    cargar_tabla_terceros();
})



$("#collapse-gestion").click(function () {
    if ($('#div-gestion').is(':visible')) {
        $('#controles_tercero').css('display', 'none');

    } else {
        $('#controles_tercero').css('display', '');

    }
});

function cargar_anios_if($tercero_id) {
    $('#anio').empty();
    $('#anio').append('<option value="">--Seleccione--</option>');
    $.ajax({
        url: "/inf_fin/getanios_tercero",
        type: 'GET',
        data: {
            id_tercero: $tercero_id
        },
        dataType: 'json',
        success: function (response) {
            $.each(response.data, function (key, value) {
                $('#anio').append("<option value='" + value.anio + "'>" + value
                    .anio + "</option>")
            });
        },
        error: function () {
            alert('Hubo un error obteniendo los años del tercero');
        }
    });
}

function anios_if() {
    $('#anio').empty();
    $('#anio').append("<option value=''>---</option>")
    for (index = 2015; index < anio; index++) {
        $('#anio').append("<option value='" + index + "'>" + index + "</option>")
    }
}
anios_if();

function format_datos_tercero(d) {
    /*Pasando Datos a los input*/
    $('#metodo_tercero').attr("value", "put");
    $('#razon_social').val(d.razon_social);
    $('#tipo_identificacion_id').val(d.tipo_identificacion_id);
    $('#tipo_identificacion_id').trigger('change');
    $('#identificacion').val(d.identificacion);
    $('#cod_v').val(d.cod_v);
    $('#tipo_sociedad_id').val(d.tipo_sociedad_id);
    $('#tipo_sociedad_id').trigger('change');
    $('#fecha_constitucion').val(d.fecha_constitucion);
    $('#correo').val(d.correo);
    $('#direccion').val(d.direccion);
    $('#telefono').val(d.telefono);
    $('#actividad_economica').val(d.actividad_economica);
    $('#pais_id').val(d.IDP);
    $('#pais_id').trigger('change');
    llenar_ciu_dep(d.IDP, d.ciudad_id, d.departamento_id);
    $('#barrio').val(d.barrio);
    $('#tercero_id').val(d.id);
    $('#tercero_id').trigger('change');
    cargar_anios_if(d.id);

    /*Desabilitando los input*/
    des_habilitar_inputs_ib_tercero();
    des_habilitar_inputs_inf_tercero();

    $('#boton_crear_t').css('display', 'none');
    $('#boton_limpiar_t').css('display', 'none');
    $('#boton_nuevo_t').css('display', '');
    $('#boton_modificar_t').css('display', '');
    $('#boton_guardar_t').css('display', '');
    $('#boton_modificar_t').removeAttr('disabled');
}

function habilitar_inputs_ib_tercero() {
    $('#razon_social').removeAttr('disabled');
    $('#tipo_identificacion_id').removeAttr('disabled');
    $('#tipo_sociedad_id').removeAttr('disabled');
    $('#identificacion').removeAttr('disabled');
    $('#cod_v').removeAttr('disabled');
    $('#fecha_constitucion').removeAttr('disabled');
    $('#correo').removeAttr('disabled');
    $('#direccion').removeAttr('disabled');
    $('#telefono').removeAttr('disabled');
    $('#actividad_economica').removeAttr('disabled');
    $('#pais_id').removeAttr('disabled');
    $('#ciudad_id').removeAttr('disabled');

    if ($('#pais_id option:selected').text() == 'Colombia') {
        $('#departamento_id').removeAttr('disabled');
        $('#barrio').removeAttr('disabled');
    }
}

function des_habilitar_inputs_ib_tercero() {
    $('#razon_social').attr('disabled', 'disabled')
    $('#tipo_identificacion_id').attr('disabled', 'disabled')
    $('#tipo_sociedad_id').attr('disabled', 'disabled')
    $('#identificacion').attr('disabled', 'disabled')
    $('#cod_v').attr('disabled', 'disabled')
    $('#fecha_constitucion').attr('disabled', 'disabled')
    $('#correo').attr('disabled', 'disabled')
    $('#direccion').attr('disabled', 'disabled')
    $('#telefono').attr('disabled', 'disabled')
    $('#actividad_economica').attr('disabled', 'disabled')
    $('#pais_id').attr('disabled', 'disabled')
    $('#ciudad_id').attr('disabled', 'disabled')

    if ($('#pais_id option:selected').text() == 'Colombia') {
        $('#departamento_id').attr('disabled', 'disabled')
        $('#barrio').attr('disabled', 'disabled')
    }
}

function habilitar_inputs_inf_tercero() {
    $('#tercero_id').removeAttr('disabled');
    $('#anio').removeAttr('disabled');
    $('#activo_cte').removeAttr('disabled');
    $('#activo_total').removeAttr('disabled');
    $('#pasivo_cte').removeAttr('disabled');
    $('#pasivo_total').removeAttr('disabled');
    $('#utilidad_oper').removeAttr('disabled');
    $('#patrimonio').removeAttr('disabled');
    $('#inventario').removeAttr('disabled');
    $('#ingresos_mensuales').removeAttr('disabled');
    $('#egresos_mensuales').removeAttr('disabled');
    $('#activos').removeAttr('disabled');
    $('#pasivos').removeAttr('disabled');
}


function des_habilitar_inputs_inf_tercero() {
    $('#tercero_id').attr('disabled', 'disabled')
    $('#anio').attr('disabled', 'disabled')
    $('#activo_cte').attr('disabled', 'disabled')
    $('#activo_total').attr('disabled', 'disabled')
    $('#pasivo_cte').attr('disabled', 'disabled')
    $('#pasivo_total').attr('disabled', 'disabled')
    $('#utilidad_oper').attr('disabled', 'disabled')
    $('#patrimonio').attr('disabled', 'disabled')
    $('#inventario').attr('disabled', 'disabled')
    $('#ingresos_mensuales').attr('disabled', 'disabled')
    $('#egresos_mensuales').attr('disabled', 'disabled')
    $('#activos').attr('disabled', 'disabled')
    $('#pasivos').attr('disabled', 'disabled')
}

function limpiar_inputs_tercero() {
    $('#razon_social').val("");
    $('#tipo_identificacion_id').val("");
    $('#tipo_identificacion_id').trigger('change');
    $('#identificacion').val("");
    $('#cod_v').val("");
    $('#tipo_sociedad_id').val("");
    $('#tipo_sociedad_id').trigger('change');
    $('#fecha_constitucion').val("");
    $('#correo').val("");
    $('#direccion').val("");
    $('#telefono').val("");
    $('#actividad_economica').val("");
    $('#pais_id').val("");
    $('#pais_id').trigger('change');
    $('#barrio').val("");

    $('#tercero_id').val("");
    $('#tercero_id').trigger('change');
    $('#anio').val("");
    $('#anio').trigger('change');
    $('#activo_cte').val("");
    $('#activo_total').val("");
    $('#pasivo_cte').val("");
    $('#pasivo_total').val("");
    $('#utilidad_oper').val("");
    $('#patrimonio').val("");
    $('#inventario').val("");
    $('#ingresos_mensuales').val("");
    $('#egresos_mensuales').val("");
    $('#activos').val("");
    $('#pasivos').val("");

    $('#boton_modificar_t').attr('disabled', 'disabled');
    $('#boton_guardar_t').attr('disabled', 'disabled');
    $('#boton_crear_t').css('display', '');
    $('#boton_nuevo_t').css('display', 'none');

    $('#tabla_terceros tbody>tr').removeClass('selected');
    $('#metodo_tercero').attr("value", "");
    anios_if();
    habilitar_inputs_ib_tercero()
    habilitar_inputs_inf_tercero();

    if ($('#ib').is(":visible")) {
        $('#form_tercero').attr("action", "http://cumplimiento.test/terceros/guardar");
    } else if ($('#inf').is(":visible")) {
        $('#form_tercero').attr("action", "http://cumplimiento.test/inf_fin/guardar");
    }
}

function buscar_id_tercero($tercero) {
    $.ajax({
        url: "/terceros/getIDTercero",
        type: 'GET',
        data: {
            tercero: $tercero
        },
        dataType: 'json',
        success: function (response) {
            $.each(response.data, function (key, value) {
                $('#form_tercero').attr("action", "http://cumplimiento.test/terceros/" + value
                    .id);
            });
        },
        error: function () {
            alert('Hubo un error obteniendo los años del tercero');
        }
    });
}

function buscar_id_inf_fin_tercero($tercero_id, $anio) {
    var id_t
    $.ajax({
        url: "/inf_fin/get_Inf_Fin_tercero",
        type: 'GET',
        data: {
            tercero: $tercero_id,
            anio: $anio
        },
        dataType: 'json',
        success: function (response) {
            if (response.data == "") {
                $('#activo_cte').val("");
                $('#activo_total').val("");
                $('#pasivo_cte').val("");
                $('#pasivo_total').val("");
                $('#utilidad_oper').val("");
                $('#patrimonio').val("");
                $('#inventario').val("");
                $('#ingresos_mensuales').val("");
                $('#egresos_mensuales').val("");
                $('#activos').val("");
                $('#pasivos').val("");
            } else {
                $.each(response.data, function (key, value) {
                    $('#form_tercero').attr("action", "http://cumplimiento.test/inf_fin/" +
                        value.id);
                    $('#activo_cte').val(value.activo_cte);
                    $('#activo_total').val(value.activo_total);
                    $('#pasivo_cte').val(value.pasivo_cte);
                    $('#pasivo_total').val(value.pasivo_total);
                    $('#utilidad_oper').val(value.utilidad_oper);
                    $('#patrimonio').val(value.patrimonio);
                    $('#inventario').val(value.inventario);
                    $('#ingresos_mensuales').val(value.ingresos_mensuales);
                    $('#egresos_mensuales').val(value.egresos_mensuales);
                    $('#activos').val(value.activos);
                    $('#pasivos').val(value.pasivos);
                });
            }
        },
        error: function () {
            alert('Hubo un error obteniendo los años del tercero');
        }
    });
}

function validar_inputs_hab_tercero() {
    if ($('#ib').is(":visible")) {
        habilitar_inputs_ib_tercero();
        buscar_id_tercero($('#razon_social').val())
    } else if ($('#inf').is(":visible")) {
        habilitar_inputs_inf_tercero();
    }

    $('#boton_modificar_t').attr('disabled', 'disabled');
    $('#boton_guardar_t').removeAttr('disabled');
}

$('#anio').change(function () {
    buscar_id_inf_fin_tercero($('#tercero_id option:selected').val(), $('#anio option:selected').val())
})

$('#tercero_id').change(function () {
    buscar_id_inf_fin_tercero($('#tercero_id option:selected').val(), $('#anio option:selected').val())
})

$('#boton_nuevo_t').click(function () {
    $('#boton_modificar_t').css('display', 'none');
    $('#boton_guardar_t').css('display', 'none');
    $('#boton_limpiar_t').css('display', '');
})

$("#ib_id").click(function () {
    if ($('#boton_crear_t').is(':visible')) {
        $('#form_tercero').attr("action", "http://cumplimiento.test/terceros/guardar");
        limpiar_inputs_tercero()
    } else {
        des_habilitar_inputs_inf_tercero();
        $('#boton_modificar_t').removeAttr('disabled', 'disabled');
        $('#boton_guardar_t').attr('disabled', 'disabled');
    }

    $('#razon_social').attr('required', 'required');
    $('#tipo_identificacion_id').attr('required', 'required');
    $('#tipo_sociedad_id').attr('required', 'required');
    $('#identificacion').attr('required', 'required');
    $('#fecha_constitucion').attr('required', 'required');
    $('#pais_id').attr('required', 'required');
    $('#ciudad_id').attr('required', 'required');
    $('#fecha_constitucion').attr('required', 'required');
    $('#correo').attr('required', 'required');
    $('#direccion').attr('required', 'required');
    $('#telefono').attr('required', 'required');
    $('#actividad_economica').attr('required', 'required');
    $('#tercero_id').removeAttr('required');
    $('#anio').removeAttr('required');
});

$("#inf_id").click(function () {
    if ($('#boton_crear_t').is(':visible')) {
        $('#form_tercero').attr("action", "http://cumplimiento.test/inf_fin/guardar");
        limpiar_inputs_tercero()
    } else {
        des_habilitar_inputs_ib_tercero();
        $('#boton_modificar_t').removeAttr('disabled', 'disabled');
        $('#boton_guardar_t').attr('disabled', 'disabled');
    }

    $('#razon_social').removeAttr('required');
    $('#tipo_identificacion_id').removeAttr('required');
    $('#tipo_sociedad_id').removeAttr('required');
    $('#identificacion').removeAttr('required');
    $('#fecha_constitucion').removeAttr('required');
    $('#correo').removeAttr('required')
    $('#direccion').removeAttr('required')
    $('#telefono').removeAttr('required')
    $('#actividad_economica').removeAttr('required')
    $('#pais_id').removeAttr('required');
    $('#ciudad_id').removeAttr('required');

    $('#tercero_id').attr('required', 'required');
    $('#anio').attr('required', 'required');
});