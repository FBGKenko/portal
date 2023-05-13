$('#formPermisos').submit(function () {
    $.when(
        $.ajax({
        type: "POST",
        url: $('#formPermisos').attr('action'),
        data: $("#formPermisos").serializeArray(),
        contentType: "application/x-www-form-urlencoded",
        success: function(response)
        {
            console.log(response);
            if(response){
              Swal.fire(
                'Acción exitosa',
                'Se han cambiado los permisos.',
                'success'
              );
            }
            else{
              Swal.fire({
                icon: 'error',
                title: 'Acción erronea',
                text: 'Se han cambiado los permisos a la empresa.',
                footer: 'Okey'
              });
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
            return false;
        }
    ); 
return false;
});