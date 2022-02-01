$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('#tercero_id_inf').select2();
$('#vinculo_id_inf').select2();
$('#tercero_id').select2();
$('#vinculo_id').select2();

$('#tipo_identificacion_id').select2();

function cargar_terceros() {
    var tipo_tercero = $tipo_tercero_id;
    $('#tercero_id').empty();
    $('#tercero_id').append('<option value="">---</option>');
    if (pais_seleccionado) {
        $.ajax({
            url: "/terceros/getCiudades",
            type: 'GET',
            data: {
                tipo_tercero_id: tipo_tercero
            },
            dataType: 'json',
            success: function (response) {
                $.each(response.data, function (key, value) {
                    $('#tercero_id').append("<option value='" + value.id + "'>" + value
                        .razon_social + "</option>")
                });
            },
            error: function () {
                alert('Hubo un error obteniendo los terceros');
            }
        });
    }
}

$('#tipo_tercero_id').change(function () {
    llenar_ciudad_a(pais_select_a.val(), "");
})

$('#tercero').click(function () {
    $('#tercero_id').empty()
    $('#tercero_id').append("<option value=''>---</option>")
    $.ajax({
        url: "/terceros/getTerceros",
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            $.each(response.data, function (key, value) {
                $('#tercero_id').append("<option value='" + value.id + "'>" + value
                    .razon_social +
                    "</option>")
            });
        },
        error: function () {
            alert('Hubo un error obteniendo los Paises');
        }
    });
})
$('#agente').click(function () {
    $('#tercero_id').empty()
    $('#tercero_id').append("<option value=''>---</option>")
    $.ajax({
        url: "/agentes/getAgentes",
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            $.each(response.data, function (key, value) {
                $('#tercero_id').append("<option value='" + value.id + "'>" + value
                    .razon_social_a +
                    "</option>")
            });
        },
        error: function () {
            alert('Hubo un error obteniendo los Paises');
        }
    });
})

var tabla_personas = $('#tabla_personas').DataTable({
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
    scrollY: "280px",
    dom: "<'row'<'col-sm-8'l><'col-sm-4'B>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
    serverSide: true,
    ajax: "/personas/getPersonas",
    columns: [{
        data: 'nombre',
        name: 'nombre',
    }, {
        data: 'tipo_identificacion',
        name: 'tipo_identificacion',
    }, {
        data: 'identificacion',
        name: 'identificacion',
    },
    {
        data: 'correo',
        name: 'correo',

    },
    {
        data: 'direccion',
        name: 'direccion',

    },
    {
        data: 'telefono',
        name: 'telefono',

    },
    {
        class: "details-control",
        orderable: false,
        data: null,
        defaultContent: '<td>' +
            '<div class="action-buttons center">' +
            '<a href="#informacion_persona" role="button" class="blue" data-toggle="modal">' +
            '<i class="ace-icon fa fa-info-circle align-top bigger-150 icon-on-right"></i>' +
            '</a>' +
            '</div>' +
            '</td>',
    },

    ],
    responsive: true,
    lengthChange: true,
    lengthMenu: [
        [10, 25, 50, 75, 100, -1],
        [10, 25, 50, 75, 100, "ALL"]
    ],

});

var detailRows = [];


$('#tabla_personas tbody').on('click', 'td.details-control', function () {
    var tr = $(this).closest('tr');
    var row = tabla_personas.row(tr);
    format(row.data());
});

function format(d) {

    $('#tercero_inf').removeAttr("checked");
    $('#agente_inf').removeAttr("checked");
    $('#tercero_id_inf').empty();
    $('#tercero_id_inf').append("<option value=''>---</option>")
    $('#vinculo_id_inf').val("");
    $('#vinculo_id_inf').trigger('change');
    if (d.nombre == null) {
        $('.Nombre').html("-");
    } else {
        $('.Nombre').html(d.nombre);
    };

    if (d.tipo_identificacion == null) {
        $('.tipo_identificacion').html("-");
    } else {
        $('.tipo_identificacion').html(d.tipo_identificacion);
    };

    if (d.identificacion == null) {
        $('.identificacion').html("-");
    } else {
        $('.identificacion').html(d.identificacion);
    };

    if (d.correo == null) {
        $('.correo').html("-");
    } else {
        $('.correo').html(d.correo);
    };

    if (d.direccion == null) {
        $('.direccion').html("-");
    } else {
        $('.direccion').html(d.direccion);
    };

    if (d.telefono == null) {
        $('.telefono').html("-");
    } else {
        $('.telefono').html(d.telefono);
    };

    $('#tabla_terceros_v > tbody').empty();
    cargar_tabla_vinculos(d.id);
}

$('#tabla_personas tbody').on('click', 'tr', function () {
    if ($(this).hasClass('selected')) {
        $(this).removeClass('selected');
        limpiar_inputs_persona();
        $('#form_persona').attr("action", "http://cumplimiento.test/personas/guardar");
        $('#boton_modificar_p').css('display', 'none');
        $('#boton_guardar_p').css('display', 'none');
        $('#boton_limpiar_p').css('display', '');
    } else {
        tabla_personas.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');
        var tr = $(this).closest('tr');
        var row = tabla_personas.row(tr);
        format_datos_persona(row.data());
    }
});

$("#collapse-persona").click(function () {
    if ($('#div-persona').is(':visible')) {
        $('#controles_persona').css('display', 'none');

    } else {
        $('#controles_persona').css('display', '');

    }
});

function format_datos_persona(d) {
    /*Pasando Datos a los input*/
    $('#form_persona').attr("action", "http://cumplimiento.test/personas/" + d.id);
    $('#metodo_persona').attr("value", "put");
    $('#nombre').val(d.nombre);
    $('#tipo_identificacion_id').val(d.tipo_identificacion_id);
    $('#tipo_identificacion_id').trigger('change');
    $('#identificacion').val(d.identificacion);
    $('#correo').val(d.correo);
    $('#direccion').val(d.direccion);
    $('#telefono').val(d.telefono);

    /*Desabilitando los input*/
    des_habilitar_inputs_persona();

    $('#boton_crear_p').css('display', 'none');
    $('#boton_limpiar_p').css('display', 'none');
    $('#boton_nuevo_p').css('display', '');
    $('#boton_modificar_p').css('display', '');
    $('#boton_guardar_p').css('display', '');
    $('#boton_modificar_p').removeAttr('disabled');
}

function habilitar_inputs_persona() {
    $('#nombre').removeAttr('disabled');
    $('#tipo_identificacion_id').removeAttr('disabled');
    $('#identificacion').removeAttr('disabled');
    $('#correo').removeAttr('disabled');
    $('#direccion').removeAttr('disabled');
    $('#telefono').removeAttr('disabled');
}

function des_habilitar_inputs_persona() {
    $('#nombre').attr('disabled', 'disabled')
    $('#tipo_identificacion_id').attr('disabled', 'disabled')
    $('#identificacion').attr('disabled', 'disabled')
    $('#correo').attr('disabled', 'disabled')
    $('#direccion').attr('disabled', 'disabled')
    $('#telefono').attr('disabled', 'disabled')
}

function limpiar_inputs_persona() {

    habilitar_inputs_persona()

    $('#nombre').val("");
    $('#tipo_identificacion_id').val("");
    $('#tipo_identificacion_id').trigger('change');
    $('#identificacion').val("");
    $('#correo').val("");
    $('#direccion').val("");
    $('#telefono').val("");

    $('#boton_modificar_p').attr('disabled', 'disabled');
    $('#boton_guardar_p').attr('disabled', 'disabled');
    $('#boton_guardar_p').css('display', 'none');
    $('#boton_modificar_p').css('display', 'none');
    $('#boton_crear_p').css('display', '');
    $('#boton_limpiar_p').css('display', '');
    $('#boton_nuevo_p').css('display', 'none');
    $('#vinculo_id').attr('required', 'required');
    $('#vinculo_id').attr('required', 'required');

    $('#tabla_personas tbody>tr').removeClass('selected');
    $('#metodo_persona').attr("value", "");

    $('#form_persona').attr("action", "http://cumplimiento.test/personas/guardar");
}

function validar_inputs_persona() {
    habilitar_inputs_persona();
    $('#tercero_id').removeAttr('required');
    $('#vinculo_id').removeAttr('required');

    $('#boton_modificar_p').attr('disabled', 'disabled');
    $('#boton_guardar_p').removeAttr('disabled');
}

/*function buscar_id_persona($rs, $vinc, $p_id, ) {
    $.ajax({
        url: "/personas/getIDPersona",
        type: 'GET',
        data: {
            persona: $identificacion
        },
        dataType: 'json',
        success: function(response) {
            return response.data[0].id
        },
        error: function() {
            alert('Hubo un error obteniendo los años del tercero');
        }
    });
}*/

$('#tercero_inf').click(function () {
    $('#tercero_id_inf').empty()
    $('#tercero_id_inf').append("<option value=''>---</option>")
    $.ajax({
        url: "/terceros/getTerceros",
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            $.each(response.data, function (key, value) {
                $('#tercero_id_inf').append("<option value='" + value.id + "'>" + value
                    .razon_social +
                    "</option>")
            });
            var table = $('#tabla_terceros_v').DataTable();
            table.column(1).data().each(function (value, index) {
                $("#tercero_id_inf option:contains('" + value + "')").remove();
            });

        },
        error: function () {
            alert('Hubo un error obteniendo los Paises');
        }
    });
    $('#boton_crear_vt').removeAttr('disabled');
    $('#boton_limpiar_vt').removeAttr('disabled');
})

function limpiar_inputs_vinc() {
    $('#tercero_inf').removeAttr("checked");
    $('#agente_inf').removeAttr("checked");

    $('#tercero_id_inf').val("");
    $('#tercero_id_inf').trigger('change');

    $('#vinculo_id_inf').val("");
    $('#vinculo_id_inf').trigger('change');
    $('#boton_crear_vt').attr('disabled', 'disabled')
    $('#boton_limpiar_vt').attr('disabled', 'disabled')
}

$('#agente_inf').click(function () {
    $('#tercero_id_inf').empty()
    $('#tercero_id_inf').append("<option value=''>---</option>")
    $.ajax({
        url: "/agentes/getAgentes",
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            $.each(response.data, function (key, value) {
                $('#tercero_id_inf').append("<option value='" + value.id + "'>" + value
                    .razon_social_a +
                    "</option>");
            });
            var table = $('#tabla_terceros_v').DataTable();
            table.column(1).data().each(function (value, index) {
                $("#tercero_id_inf option:contains('" + value + "')").remove();
            });
        },
        error: function () {
            alert('Hubo un error obteniendo los Paises');
        }
    });
    $('#boton_crear_vt').removeAttr('disabled');
    $('#boton_limpiar_vt').removeAttr('disabled');
})

function cargar_tabla_vinculos($id) {
    var t = $('#tabla_terceros_v').DataTable({
        destroy: true,
        dom: "<'row'<'col-sm-12'tr>>",
        scrollY: "150px",
        processing: true,
        serverSide: true,
        scrollX: true,
        sScrollXInner: "100%",
        ajax: {
            url: "/PVT/getTercerosVinculados",
            type: 'GET',
            data: {
                id_p: $id
            }
        },
        columns: [{
            data: 'tipo_tercero',
            name: 'tipo_tercero',
        }, {
            data: 'razon_social',
            name: 'razon_social',
        }, {
            data: 'vinculo',
            name: 'vinculo',
        },
        {
            class: "actualizar_vinculo",
            orderable: false,
            data: null,
            defaultContent: '<td>' +
                '<div class="action-buttons center">' +
                '<a href="" role="button" class="green" data-toggle="modal">' +
                '<i class="ace-icon fa fa-pencil bigger-130"></i>' +
                '</a>' +
                '</div>' +
                '</td>',
        },
        {
            class: "eliminar_vinculo",
            orderable: false,
            data: null,
            defaultContent: '<td>' +
                '<div class="action-buttons center">' +
                '<a href="" role="button" class="red" data-toggle="modal">' +
                '<i class="ace-icon fa fa-trash-o bigger-130"></i>' +
                '</a>' +
                '</div>' +
                '</td>',
        },

        ],
        responsive: true,
    });
    t.columns.adjust().draw();
}

$('#tabla_terceros_v tbody').on('click', 'tr', function () {
    if ($(this).hasClass('selected')) {
        $(this).removeClass('selected');
    } else {
        $('#tabla_terceros_v').DataTable().$('tr.selected').removeClass('selected');
        $(this).addClass('selected');
    }
});

$('#tabla_terceros_v tbody').on('click', 'td.actualizar_vinculo', function () {
    var tr = $(this).closest('tr');
    var row = $('#tabla_terceros_v').DataTable().row(tr);
    var d = row.data();
    datos = {};
    datos['persona_id'] = d.persona_id;
    datos['tercero_id'] = d.tercero_id;
    datos['agente_id'] = d.agente_id;
    vinc_n = $('#vinculo_id_inf option:selected').text();
    if ($('#vinculo_id_inf option:selected').val() == '') {
        bootbox.alert({
            size: "small",
            className: "modal-confirm",
            message: "Por favor indicar el tipo de vinculo"
        })
    } else {
        if ($('#vinculo_id_inf option:selected').val() != d.vinculo_id) {
            bootbox.confirm({
                message: "Confirma que desea actualizar el tipo de vinculo con el tercero <b>" + d
                    .razon_social + '</b>?<br><br><b>Vinculo Actual</b>: ' + d.vinculo +
                    '<br><b>Vinculo Nuevo:</b> ' + vinc_n,
                locale: 'es',
                className: "modal-confirm",
                callback: function (result) {
                    if (result) {
                        datos['vinculo_id'] = $('#vinculo_id_inf option:selected').val();
                        $.ajax({
                            type: "PUT",
                            url: "/PVT/actualizar_pvt",
                            data: datos,
                            success: function (msg) {
                                $('#vinculo_id_inf').val("");
                                $('#vinculo_id_inf').trigger('change');
                                cargar_tabla_vinculos(d.persona_id);
                            },
                            error: function () {
                                alert('Hubo un error actualizando los datos');
                            }
                        });
                    }
                }
            });
        } else {
            bootbox.alert({
                size: "small",
                className: "modal-confirm",
                message: "El Tipo de Vinculo Seleccionado ya esta asociado con el tercero."
            })
        }
    }
});

$('#tabla_terceros_v tbody').on('click', 'td.eliminar_vinculo', function () {
    var tr = $(this).closest('tr');
    var row = $('#tabla_terceros_v').DataTable().row(tr);
    var d = row.data();
    datos = {};
    datos['persona_id'] = d.persona_id;
    datos['tercero_id'] = d.tercero_id;
    datos['agente_id'] = d.agente_id;
    datos['vinculo_id'] = d.vinculo_id;
    bootbox.confirm({
        message: "Confirma que desea <b>Eliminar</b> el tipo de vinculo con el tercero " + d
            .razon_social + '?',
        locale: 'es',
        className: "modal-confirm",
        callback: function (result) {
            if (result) {
                $.ajax({
                    type: "DELETE",
                    url: "/PVT/eliminar_vinculo",
                    data: datos,
                    success: function (msg) {
                        cargar_tabla_vinculos(d.persona_id);
                    },
                    error: function () {
                        alert('Hubo un error actualizando los datos');
                    }
                });
            }
        }
    });
});

function agregar_vinculo_persona() {
    var rs = $('#tercero_id_inf option:selected').val();
    var vinc = $('#vinculo_id_inf option:selected').val();
    var p_id = '';
    datos = {};
    $.ajax({
        url: "/personas/getIDPersona",
        type: 'GET',
        data: {
            persona: $('.identificacion').html()
        },
        dataType: 'json',
        success: function (response) {
            p_id = response.data[0].id;
            if ($('#tercero_inf').is(':checked')) {
                datos['tercero_id'] = rs;
            } else if ($('#agente_inf').is(':checked')) {
                datos['agente_id'] = rs;
            }
            datos['vinculo_id'] = vinc;
            datos['persona_id'] = p_id;
            $.ajax({
                type: "POST",
                url: "/PVT/guardar_vinculo",
                data: datos,
                success: function (msg) {
                    cargar_tabla_vinculos(p_id);
                    limpiar_inputs_vinc();
                }
            });
        },
        error: function () {
            alert('Hubo un error obteniendo los años del tercero');
        }
    });
}