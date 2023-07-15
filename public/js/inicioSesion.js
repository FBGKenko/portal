$(document).ready(function() {
    
});



$('#formInicio').submit( function () {  
    salida = false;
    var txtCorreo = $("#txtCorreo").val();
    var txtClave = $("#txtContra").val();
    let error = "";
    botonCargardo(["#btnIniciar", "#btnRegistrar", "#linkOlvideContra", "#btnInicio"], true);
    if(txtCorreo != "" && txtClave != ""){
        var ruta = $('#formInicio').attr('action');
        $.when(
            $.ajax({
            type: "POST",
            url: ruta,
            data: $("#formInicio").serializeArray(),
            contentType: "application/x-www-form-urlencoded",
            success: function(response)
            {
                if(response.includes("http")){
                    ruta = response;
                    salida = true;
                }
                else if(response == 1){
                    swal('Ocurrió un error', 'No hay usuarios registrados con este correo o telefono.', 'error');
                    salida = false;
                }
                else if(response == 2){
                    swal('Ocurrió un error', 'La contraseña es incorrecta.', 'error');
                    salida = false;
                }
                else{
                    swal('Ocurrió un error', 'Ocurrió un error inesperado.', 'error');
                    console.log(response);
                    salida = false;
                }
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
                salida = false;
            }
        })
        ).done(
            function () {
                if(salida){
                    window.location.href = ruta;
                }
                else{
                    botonCargardo(["#btnIniciar", "#btnRegistrar", "#linkOlvideContra", "#btnInicio"], false);
                    return false;
                }
            }
        );
    }
    else{
        swal('Ocurrió un error', 'Faltan campos por rellenar.', 'error');
        botonCargardo(["#btnIniciar", "#btnRegistrar", "#linkOlvideContra", "#btnInicio"], false);
    }
    return false;
});

$('#cbMostrarContra').click(function () {
    if($('#txtContra').attr('type') == "password"){
        $('#txtContra').attr('type', 'text');
    }
    else{
        $('#txtContra').attr('type', 'password');
    }
});