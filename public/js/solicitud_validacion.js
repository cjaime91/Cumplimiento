$('#nuevo_t').click(function () {
    $('#div_tipo').css('display', '')
    if ($('#radio_tercero').is(':checked')) {
        if ($('#nuevo_t').is(':checked')) {
            $('#div_nuevo').css('display', '')
            $('#div_antiguo').css('display', 'none')
        } else if ($('#antiguo_t').is(':checked')) {
            $('#div_antiguo').css('display', '')
            $('#div_nuevo').css('display', 'none')
        }
        $('#form_tercero').css('display', '')
        $('#form_agente').css('display', 'none')
    } else if ($('#radio_agente').is(':checked')) {
        if ($('#nuevo_t').is(':checked')) {
            $('#div_nuevo').css('display', '')
            $('#div_antiguo').css('display', 'none')
        } else if ($('#antiguo_t').is(':checked')) {
            $('#div_antiguo').css('display', '')
            $('#div_nuevo').css('display', 'none')
        }
        $('#form_tercero').css('display', 'none')
        $('#form_agente').css('display', '')
    }
});

$('#antiguo_t').click(function () {
    $('#div_tipo').css('display', '')
    if ($('#radio_tercero').is(':checked')) {
        if ($('#nuevo_t').is(':checked')) {
            $('#div_nuevo').css('display', '')
            $('#div_antiguo').css('display', 'none')
        } else if ($('#antiguo_t').is(':checked')) {
            $('#div_antiguo').css('display', '')
            $('#div_nuevo').css('display', 'none')
        }
        $('#form_tercero').css('display', '')
        $('#form_agente').css('display', 'none')
    } else if ($('#radio_agente').is(':checked')) {
        if ($('#nuevo_t').is(':checked')) {
            $('#div_nuevo').css('display', '')
            $('#div_antiguo').css('display', 'none')
        } else if ($('#antiguo_t').is(':checked')) {
            $('#div_antiguo').css('display', '')
            $('#div_nuevo').css('display', 'none')
        }
        $('#form_tercero').css('display', 'none')
        $('#form_agente').css('display', '')

    }
})

$('#radio_tercero').click(function () {
    if ($('#radio_tercero').is(':checked')) {
        $('#form_tercero').css('display', '')
        $('#form_agente').css('display', 'none')
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
    }

    if ($('#nuevo_t').is(':checked')) {
        $('#div_nuevo').css('display', '')
        $('#div_antiguo').css('display', 'none')
    } else if ($('#antiguo_t').is(':checked')) {
        $('#div_antiguo').css('display', '')
        $('#div_nuevo').css('display', 'none')
    }
})

$('#radio_agente').click(function () {
    if ($('#radio_agente').is(':checked')) {
        $('#form_tercero').css('display', 'none')
        $('#form_agente').css('display', '')
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
                        "</option>");
                });
            },
            error: function () {
                alert('Hubo un error obteniendo los Paises');
            }
        });
    }

    if ($('#nuevo_t').is(':checked')) {
        $('#div_nuevo').css('display', '')
        $('#div_antiguo').css('display', 'none')
    } else if ($('#antiguo_t').is(':checked')) {
        $('#div_antiguo').css('display', '')
        $('#div_nuevo').css('display', 'none')
    }
})

$('#tercero_id').change(function () {
    alert('Tercero Seleccionado')
})