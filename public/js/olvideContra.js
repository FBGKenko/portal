
$('#formOlvide').submit(function () {
    botonCargardo(["#btnInicio", "#btnLogIn", "#btnOlvide"], true);
    $.when(
        $.ajax({
        type: "POST",
        url: $('#formOlvide').attr('action'),
        data: $("#formOlvide").serializeArray(),
        contentType: "application/x-www-form-urlencoded",
        success: function(response)
        {
            //POSIBLEMENTE METER ESTA FUNCIONA METODOS YA QUE DEVUELVE UN MENSAJE DE ACUERDO A UN PARAMETRO QUE SE LE PASA.
            if(response == 0){
                swal('Acción exitosa', "Se ha enviado el correo.", 'success');
            }
            else{
                swal('Ocurrió un error', response, 'error');
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
        }
    })
    ).done(
        function () {
            botonCargardo(["#btnInicio", "#btnLogIn", "#btnOlvide"], false);
            return false;
        }
    ); 
    return false;
});

