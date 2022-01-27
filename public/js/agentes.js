var pais_select_a = $('#pais_id_a');
var ciudad_select_a = $('#ciudad_id_a');

pais_select_a.select2();
ciudad_select_a.select2();

function PaisSelect() {
    $.ajax({
        url: "/terceros/getPaises",
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            $.each(response.data, function (key, value) {
                pais_select_a.append("<option value='" + value.id + "'>" + value.pais +
                    "</option>")
            });
        },
        error: function () {
            alert('Hubo un error obteniendo los Paises');
        }
    });
}
PaisSelect();

pais_select_a.change(function () {
    llenar_ciudad_a(pais_select_a.val(), "");
})

function llenar_ciudad_a($id_pais, $id_ciudad) {
    var pais_seleccionado = $id_pais;
    ciudad_select_a.empty();
    ciudad_select_a.append('<option value="">--Seleccione--</option>');
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
                    ciudad_select_a.append("<option value='" + value.id + "'>" + value
                        .ciudad + "</option>")
                });
                if ($id_ciudad != "") {
                    ciudad_select_a.val($id_ciudad);
                    ciudad_select_a.trigger("change");
                }
            },
            error: function () {
                alert('Hubo un error obteniendo los Ciudades');
            }
        });
    }
}

$("#collapse-gestion-a").click(function () {
    if ($('#div-gestion-a').is(':visible')) {
        $('#controles_agente').css('display', 'none');
    } else {
        $('#controles_agente').css('display', '');
    }
});

$("#ib_id_a").click(function () {
    if ($('#boton_crear_a').is(':visible')) {
        $('#form_agente').attr("action", "http://cumplimiento.test/agentes/guardar");

    } else {
        $('#boton_modificar_a').removeAttr('disabled', 'disabled');
        $('#boton_guardar_a').attr('disabled', 'disabled');
    }

    $('#razon_social_a').attr('required', 'required');
    $('#identificacion_a').attr('required', 'required');
    $('#pais_id_a').attr('required', 'required');
    $('#ciudad_id_a').attr('required', 'required');
});

$("#tab_agentes").click(function () {
    var table = $('#tabla_agentes').DataTable();

    var data = table
        .rows()
        .data();

    if (data.length == 0) {
        var tabla_agentes = $('#tabla_agentes').DataTable({
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
            ajax: "/agentes/getAgentes",
            columns: [{
                data: 'razon_social_a',
                name: 'razon_social_a',
            }, {
                data: 'identificacion_a',
                name: 'identificacion_a',
            }, {
                data: 'correo_a',
                name: 'correo_a',
            },
            {
                data: 'direccion_a',
                name: 'direccion_a',

            },
            {
                data: 'telefono_a',
                name: 'telefono_a',

            },
            {
                data: 'PID',
                name: 'PID',

            },
            {
                data: 'ciudad',
                name: 'ciudad',

            }
            ],
            responsive: true,
            lengthChange: true,
            lengthMenu: [
                [10, 25, 50, 75, 100, -1],
                [10, 25, 50, 75, 100, "ALL"]
            ],

        });

        $('#tabla_agentes tbody').on('click', 'tr', function () {
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
                limpiar_inputs_agente();
                $('#boton_modificar_a').css('display', 'none');
                $('#boton_guardar_a').css('display', 'none');
                $('#boton_limpiar_a').css('display', '');
            } else {
                tabla_agentes.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
                var tr = $(this).closest('tr');
                var row = tabla_agentes.row(tr);
                format_datos_agente(row.data());
            }
        });
    }
})

function format_datos_agente(d) {
    /*Pasando Datos a los input*/
    $('#metodo_agente').attr("value", "put");
    $('#razon_social_a').val(d.razon_social_a);
    $('#identificacion_a').val(d.identificacion_a);
    $('#correo_a').val(d.correo_a);
    $('#direccion_a').val(d.direccion_a);
    $('#telefono_a').val(d.telefono_a);
    $('#pais_id_a').val(d.IDP);
    $('#pais_id_a').trigger('change');
    llenar_ciudad_a(d.IDP, d.ciudad_id_a);

    /*Desabilitando los input*/
    des_habilitar_inputs_ib_agente();

    $('#boton_crear_a').css('display', 'none');
    $('#boton_limpiar_a').css('display', 'none');
    $('#boton_nuevo_a').css('display', '');
    $('#boton_modificar_a').css('display', '');
    $('#boton_guardar_a').css('display', '');
    $('#boton_modificar_a').removeAttr('disabled');
}

function habilitar_inputs_ib_agente() {
    $('#razon_social_a').removeAttr('disabled');
    $('#identificacion_a').removeAttr('disabled');
    $('#correo_a').removeAttr('disabled');
    $('#direccion_a').removeAttr('disabled');
    $('#telefono_a').removeAttr('disabled');
    $('#pais_id_a').removeAttr('disabled');
    $('#ciudad_id_a').removeAttr('disabled');
}

function des_habilitar_inputs_ib_agente() {
    $('#razon_social_a').attr('disabled', 'disabled')
    $('#identificacion_a').attr('disabled', 'disabled')
    $('#correo_a').attr('disabled', 'disabled')
    $('#direccion_a').attr('disabled', 'disabled')
    $('#telefono_a').attr('disabled', 'disabled')
    $('#pais_id_a').attr('disabled', 'disabled')
    $('#ciudad_id_a').attr('disabled', 'disabled')
}

function limpiar_inputs_agente() {

    habilitar_inputs_ib_agente()
    habilitar_inputs_inf_agente();

    $('#razon_social_a').val("");
    $('#identificacion_a').val("");
    $('#correo_a').val("");
    $('#direccion_a').val("");
    $('#telefono_a').val("");
    $('#pais_id_a').val("");
    $('#pais_id_a').trigger('change');

    $('#boton_modificar_a').attr('disabled', 'disabled');
    $('#boton_guardar_a').attr('disabled', 'disabled');
    $('#boton_crear_a').css('display', '');
    $('#boton_nuevo_a').css('display', 'none');

    $('#tabla_agentes tbody>tr').removeClass('selected');
    $('#metodo_agente').attr("value", "");

    anios_if();
    $('#form_agente').attr("action", "http://cumplimiento.test/agente/guardar");
}

function buscar_id_agente($agente) {
    $.ajax({
        url: "/agentes/getIDAgente",
        type: 'GET',
        data: {
            agente: $agente
        },
        dataType: 'json',
        success: function (response) {
            $.each(response.data, function (key, value) {
                $('#form_agente').attr("action", "http://cumplimiento.test/agentes/" + value
                    .id);
            });
        },
        error: function () {
            alert('Hubo un error obteniendo el id del agente');
        }
    });
}

function validar_inputs_hab_agente() {
    habilitar_inputs_ib_agente();
    buscar_id_agente($('#razon_social_a').val());
    $('#boton_modificar_a').attr('disabled', 'disabled');
    $('#boton_guardar_a').removeAttr('disabled');
}