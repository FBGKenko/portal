$(document).ready(function() {
    $('#btnAnterior').click(anterior);
    $('#btnAnterior2').click(anterior);
    $('#seccion2').hide();
    $('#seccion3').hide();
});

$('#sTipo').change(function (e) { 
    e.preventDefault();
    $("select option[value='']").remove();
});

$('#btnSiguiente').click(function () {    
    if($('#formRegistrar').attr('name') == "1"){
        var txtNombres = $("#txtNombres").val();
        var txtApellidos = $("#txtApellidos").val();
        var txtCorreo = $("#txtCorreo").val();
        var txtTelefono = $("#txtTelefono").val();
        var txtCumpleanios = $("#cumpleanios").val();
        var sTipo = $("#sTipo").val();
        let errores = sinErrores(["Nombres", "Apellidos", "Correo", "Telefono", "Cumpleaños", "Tipo"],
                                [txtNombres, txtApellidos, txtCorreo, txtTelefono, txtCumpleanios, sTipo]);
        if(errores == ""){
            if(sTipo == "Cliente"){ //Cambiar condicion para que no se salte ningun campo.
                $('#formRegistrar').attr('name', '3');
                $('#seccion1').hide();
                $('#seccion3').show();
                $('#btnAnterior').prop('disabled', false);
                $('#btnsProcesando').addClass('visually-hidden')
                $('#btnsFinalizar').removeClass('visually-hidden');
            }
            else if(sTipo == "Dueño"){
                $('#formRegistrar').attr('name', '2');
                $('#seccion1').hide();
                $('#seccion2').show();
                $('#btnAnterior').prop('disabled', false);
            }
        }
        else{
            swal('Ocurrió un error', errores, 'error');
        }
    }
    else if($('#formRegistrar').attr('name') == "2"){
        var txtRazonSocial = $("#txtRazonSocial").val();
        var txtCorreoEmpresa = $("#txtCorreoEmpresa").val();
        var txtTelefonoEmpresa = $("#txtTelefonoEmpresa").val();
        var txtPaginaWeb = $("#txtPaginaWeb").val();

        let errores = sinErrores(["Razon social", "Correo empresa", "Telefono empresa", "Pagina web"],
                                [txtRazonSocial, txtCorreoEmpresa, txtTelefonoEmpresa, txtPaginaWeb]);
        if(errores == ""){
            $('#formRegistrar').attr('name', '3');
            $('#seccion2').hide();
            $('#seccion3').show();
            $('#btnsProcesando').addClass('visually-hidden')
            $('#btnsFinalizar').removeClass('visually-hidden');
        }
        else{
            swal('Ocurrió un error', errores, 'error');
        }
    }
});

$('#formRegistrar').submit( function () { 
    botonCargardo(["#btnInicio", "#btnLogIn", "#btnAnterior2", "#btnRegistrarse"], true);
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
    let errores = "";

    if(sTipo == "Cliente"){
        errores = sinErrores(["Nombres", "Apellidos", "Correo", "Telefono", "Cumpleaños", "Tipo","Contraseña", 
                            "Repetir contraseña"],
                            [txtNombres, txtApellidos, txtCorreo, txtTelefono, txtCumpleanios, sTipo, txtClave, 
                            txtClave2]);
    }
    else{
        errores = sinErrores(["Nombres", "Apellidos", "Correo", "Telefono", "Cumpleaños", "Tipo","Razon social", 
                            "Correo empresa", "Telefono empresa", "Pagina web", "Contraseña", "Repetir contraseña"],
                            [txtNombres, txtApellidos, txtCorreo, txtTelefono, txtCumpleanios, sTipo, txtRazonSocial, 
                            txtCorreoEmpresa, txtTelefonoEmpresa, txtPaginaWeb, txtClave, txtClave2]);
    }
    if(txtClave != txtClave2){
        errores += "La contraseña debe coincidir con Repetir contraseña";
    }
    if(errores == ""){
        $.when(
            $.ajax({
            type: "POST",
            url: $('#formRegistrar').attr('action'),
            data: $("#formRegistrar").serializeArray(),
            contentType: "application/x-www-form-urlencoded",
            success: function(response)
            {
                if(response == 0){
                    swal('Acción exitosa', "¡Ha sido registrado con exito!", 'success');
                    var ruta = $('#btnLogIn').attr('name');
                    $("#formRegistrar")[0].reset();
                    window.location.href = ruta;//cambiar por el swal 2... como registrarEstado
                }
                else
                    swal('Ocurrió un error', response, 'error');
                
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
                botonCargardo(["#btnInicio", "#btnLogIn", "#btnAnterior2", "#btnRegistrarse"], false);
                return false;
            }
        );
    }
    else{
        swal('Ocurrió un error', errores, 'error');
        botonCargardo(["#btnInicio", "#btnLogIn", "#btnAnterior2", "#btnRegistrarse"], false);
    }
    return false;
    
});

function anterior() { 
    if($('#formRegistrar').attr('name') == "2"){
        $('#formRegistrar').attr('name', '1');
        $('#seccion2').hide();
        $('#seccion1').show();
        $('#btnAnterior').prop('disabled', true);
    }
    else if($('#formRegistrar').attr('name') == "3"){
        if($('#sTipo').val() == "Cliente"){
            $('#formRegistrar').attr('name', '1');
            $('#seccion3').hide();
            $('#seccion1').show();
            $('#btnsFinalizar').addClass('visually-hidden');
            $('#btnsProcesando').removeClass('visually-hidden');
        }
        else if($('#sTipo').val() == "Dueño"){
            $('#formRegistrar').attr('name', '2');
            $('#seccion3').hide();
            $('#seccion2').show();
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