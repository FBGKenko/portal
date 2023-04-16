$(document).ready(function() {
    $('#btnAnterior').click(anterior);
    $('#btnAnterior2').click(anterior);
});
$('#sTipo').change(function (e) { 
    e.preventDefault();
    $("select option[value='0']").remove();
});
$('#btnSiguiente').click(function () {
    console.log($('#sTipo').val());
    
    if($('#formRegistrar').attr('name') == "1"){

        if($('#sTipo').val() == "Cliente"){
            $('#formRegistrar').attr('name', '3');
            $('#seccion1').addClass('visually-hidden');
            $('#seccion3').removeClass('visually-hidden');
            $('#btnAnterior').prop('disabled', false);
            $('#btnsProcesando').addClass('visually-hidden');
            $('#btnsFinalizar').removeClass('visually-hidden');
        }
        else if($('#sTipo').val() == "Dueño"){
            $('#formRegistrar').attr('name', '2');
            $('#seccion1').addClass('visually-hidden');
            $('#seccion2').removeClass('visually-hidden');
            $('#btnAnterior').prop('disabled', false);
        }
        else{
            swal('Acción exitosa', error, 'error');
            alert('Seleccione un tipo de usuario');
        } 
    }
    else if($('#formRegistrar').attr('name') == "2"){
        $('#formRegistrar').attr('name', '3');
        $('#seccion2').addClass('visually-hidden');
        $('#seccion3').removeClass('visually-hidden');
        $('#btnsProcesando').addClass('visually-hidden');
        $('#btnsFinalizar').removeClass('visually-hidden');
    }
});

$('#formRegistrar').submit( function () {  
    var txtNombres = $("#txtNombres").val();
    var txtApellidos = $("#txtApellidos").val();
    var txtCorreo = $("#txtCorreo").val();
    var txtTelefono = $("#txtTelefono").val();
    var txtCumpleanios = $("#cumpleanios").val();
    var sTipo = $("#sTipo").val();
    var txtClave = $("#txtClave").val();
    var txtClave2 = $("#txtClave2").val();

    var txtRazonSocial = $("#txtRazonSocial").val();
    var txtCorreoEmpresa = $("#txtCorreoEmpresa").val();
    var txtTelefonoEmpresa = $("#txtTelefonoEmpresa").val();
    var txtPaginaWeb = $("#txtPaginaWeb").val();

    let error = "";
    if ((txtNombres.length >= 3 && txtNombres.length <= 50) && (txtApellidos.length >= 7 && txtApellidos.length <= 50) && 
        (txtCorreo.length >= 6 && txtCorreo.length <= 100) && (txtTelefono.length >= 10) && (sTipo != 0) &&
        (txtClave.length >= 8 && txtClave.length <= 20)){
            if(sTipo == "Cliente"){
                $.when(
                    $.ajax({
                    type: "POST",
                    url: $('#formRegistrar').attr('action'),
                    data: $("#formRegistrar").serializeArray(),
                    contentType: "application/x-www-form-urlencoded",
                    success: function(response)
                    {
                        if(response != 0)
                            swal('Acción exitosa', response, 'success');
                        else
                            swal('Ocurrió un error', "Ocurrió un error inesperado.", 'error');
                        $("#formRegistrar")[0].reset();
                    },
                    error: function( jqXHR, textStatus, errorThrown ) {
                        if (jqXHR.status === 0) {
                            console.log('Not connect: Verify Network.');
                        } else if (jqXHR.status == 404) {
                            console.log('Requested page not found [404]');
                        } else if (jqXHR.status == 500) {
                            console.log('Internal Server Error [500].');
                        } else if (textStatus === 'parsererror') {
                            console.log('Requested JSON parse failed.');
                        } else if (textStatus === 'timeout') {
                            console.log('Time out error.');
                        } else if (textStatus === 'abort') {
                            console.log('Ajax request aborted.');
                        } else {
                            console.log('Uncaught Error: ' + jqXHR.responseText);
                        }
                    }
                })
                ).done(
                    function () {
                        return false;
                    }
                );
            }
            else{
                if((txtRazonSocial.length >= 3 && txtRazonSocial.length <= 70) && (txtCorreoEmpresa.length >= 6 && txtCorreoEmpresa.length <=100) &&
                    (txtTelefonoEmpresa.length >= 10)){
                        $.when(
                            $.ajax({
                            type: "POST",
                            url: $('#formRegistrar').attr('action'),
                            data: $("#formRegistrar").serializeArray(),
                            contentType: "application/x-www-form-urlencoded",
                            success: function(response)
                            {
                                if(response != 0)
                                    swal('Acción exitosa', response, 'success');
                                else
                                    swal('Ocurrió un error', "Ocurrió un error inesperado.", 'error');
                                $("#formRegistrar")[0].reset();
                            },
                            error: function( jqXHR, textStatus, errorThrown ) {
                                if (jqXHR.status === 0) {
                                    console.log('Not connect: Verify Network.');
                                } else if (jqXHR.status == 404) {
                                    console.log('Requested page not found [404]');
                                } else if (jqXHR.status == 500) {
                                    console.log('Internal Server Error [500].');
                                } else if (textStatus === 'parsererror') {
                                    console.log('Requested JSON parse failed.');
                                } else if (textStatus === 'timeout') {
                                    console.log('Time out error.');
                                } else if (textStatus === 'abort') {
                                    console.log('Ajax request aborted.');
                                } else {
                                    console.log('Uncaught Error: ' + jqXHR.responseText);
                                }
                            }
                        })
                        ).done(
                            function () {
                                return false;
                            }
                        );
                    }
                else
                    swal('Ocurrió un error', 'Hay campos vacios en el formulario.', 'error');
            }
    }
    else
        swal('Ocurrió un error', 'Hay campos vacios en el formulario.', 'error');
    return false;
    
});

function anterior() { 
    if($('#formRegistrar').attr('name') == "2"){
        $('#formRegistrar').attr('name', '1');
        $('#seccion2').addClass('visually-hidden');
        $('#seccion1').removeClass('visually-hidden');
        $('#btnAnterior').prop('disabled', true);
    }
    else if($('#formRegistrar').attr('name') == "3"){
        if($('#sTipo').val() == "Cliente"){
            $('#formRegistrar').attr('name', '1');
            $('#seccion3').addClass('visually-hidden');
            $('#seccion1').removeClass('visually-hidden');
            $('#btnsFinalizar').addClass('visually-hidden');
            $('#btnsProcesando').removeClass('visually-hidden');
        }
        else if($('#sTipo').val() == "Dueño"){
            $('#formRegistrar').attr('name', '2');
            $('#seccion3').addClass('visually-hidden');
            $('#seccion2').removeClass('visually-hidden');
            $('#btnsFinalizar').addClass('visually-hidden');
            $('#btnsProcesando').removeClass('visually-hidden');
        }
    }   
};

$('#cbMostrarContra').click(function () {
    if($('#txtClave').attr('type') == "password"){
        $('#txtClave').attr('type', 'text');
        $('#txtClave2').attr('type', 'text');
    }
    else{
        $('#txtClave').attr('type', 'password');
        $('#txtClave2').attr('type', 'password');
    }
});