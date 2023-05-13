$(document).ready(function() {
     
});


$('#formCC').submit(function () {
    var error = "";
    let contra1 = $('#txtContra1').val();
    let contra2 = $('#txtContra2').val();

    if(contra1.length >= 8 && contra1.length <= 20){
        /* if(/^[0-9]+$/.test(contra1)){
            alert('1 '+ contra1);
        }
        if(/^[A-Z]+$/.test(contra1)){
            alert('2 '+ contra1);
        }
        if(/^[a-z]+$/.test(contra1)){
            alert('3 '+ contra1);
        }
        if(/^[\s!"#$%&'()*+,-.\/:;<=>?@\\^_`|~]+$/.test(contra1)){
            alert('4 '+ contra1);
        }
        return false; */
        if(contra1 == contra2){
            $.when(
                $.ajax({
                type: "POST",
                url: $('#formCC').attr('action'),
                data: $("#formCC").serializeArray(),
                contentType: "application/x-www-form-urlencoded",
                success: function(response)
                {
                    console.log(response);
                    $('#txtContra1').val("");
                    $('#txtContra2').val("");
                    
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                          confirmButton: 'btn btn-success',
                          cancelButton: 'btn btn-danger'
                        },
                        buttonsStyling: false
                      })
                      
                      swalWithBootstrapButtons.fire({
                        title: 'Exito',
                        text: "Se ha cambiado la contraseña con exito",
                        icon: 'success',
                        confirmButtonText: 'Okey',
                        reverseButtons: true
                      }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = $('#btnCC').attr('name');
                        } else if (
                          /* Read more about handling dismissals below */
                          result.dismiss === Swal.DismissReason.cancel
                        ) {
                          swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Your imaginary file is safe :)',
                            'error'
                          )
                        }
                      })
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
        }
        else{
            error += 'La contraseña debe coincidir en ambos campos.\n';
        }
    }
    else{
        error += 'La contraseña debe tener minimo 8 caracteres y max 20 caracteres.\n';
    }
    if(error != ""){
        swal('Ocurrió un error', error, 'error');
    }
    return false;
});


$('#cbMostrarContra').click(function () {
    if($('#txtContra1').attr('type') == "password"){
        $('#txtContra1').attr('type', 'text');
        $('#txtContra2').attr('type', 'text');
    }
    else{
        $('#txtContra1').attr('type', 'password');
        $('#txtContra2').attr('type', 'password');
    }
});