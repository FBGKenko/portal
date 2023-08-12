$(document).ready(function() {
    botones = $('[id*="btnSeguir"]');
    for (let i = 0; i < botones.length; i++) {
        $('#' + botones[i].id).click(seguimiento);
    }
});

$('#btnCerrarS').click(function () {
    var ruta = "";
    $.when(
        $.ajax({
        type: "GET",
        url: $('#btnCerrarS').attr('name'),
        contentType: "application/x-www-form-urlencoded",
        success: function(response)
        {
            if(response.includes("http")){
                ruta = response;
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
            window.location.href = ruta;
        }
    );
});

function seguimiento() {
    console.log('Cortina para cancelar todo');
    idActual = $(this).attr('id');
    salida = false;
    if($(this).prop("innerHTML") == "Siguiendo"){
        var datos = {name:"idEmpresa",value:$(this).attr("value")};
        console.log($(this).attr("value"));
        console.log($('#linkNoSeguir'+$(this).attr("id").replace(/\D/g, "")).attr('name'));
        $.when(
            $.ajax({
            type: "GET",
            url: $('#linkNoSeguir'+$(this).attr("id").replace(/\D/g, "")).attr('name'),
            data: datos,
            contentType: "application/x-www-form-urlencoded",
            success: function(response)
            {
                console.log(response);
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
                $('#' + idActual).addClass('bg-opacity-75');
                $('#' + idActual).addClass('bg-success');
                $('#' + idActual).removeClass('bg-primary');
                $('#' + idActual).html('Seguir');
            }
        );
    }
    else if($(this).prop("innerHTML") == "Seguir"){
        var datos = {name:"idEmpresa",value:$(this).attr("value")};
        console.log($(this).attr("value"));
        console.log($('#linkSeguir'+$(this).attr("id").replace(/\D/g, "")).attr('name'));
        $.when(
            $.ajax({
            type: "GET",
            url: $('#linkSeguir'+$(this).attr("id").replace(/\D/g, "")).attr('name'),
            data: datos,
            contentType: "application/x-www-form-urlencoded",
            success: function(response)
            {
                console.log(response);
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
                $('#' + idActual).removeClass('bg-opacity-75');
                $('#' + idActual).removeClass('bg-success');
                $('#' + idActual).addClass('bg-primary');
                $('#' + idActual).html('Siguiendo');
            }
        );
    }
    else{
        console.log('Error');
    }
}
