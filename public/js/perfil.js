$(document).ready(function() {
    /*
    >>>FUNCIONAMIENTO CORRECTO DE AJAX
    $.when(
        $.ajax({
        type: "GET",    >>>TIPO
        url: "resources/php/capaNegocios/configuracionCargar.php",      >>>RUTA DEL ARCHIVO PHP
        contentType: "application/x-www-form-urlencoded",
        success: function(response)
        {
            echo json_encode($res[0]);  >>ESTA LINEA SE ENVIARIA DEL LADO DEL SERVIDOR

            obj = JSON.parse(response); >>ESTO IRIA DEL LADO DEL CLIENTE
            >>>!!! SUPUESTAMENTE LARAVEL LO TIENE IMPLICITO
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
        
    );
    */
});