function modoCargando(cargando){
    if(cargando){
        $('button #textoBoton').hide();
        $('button .spinner-border').show();
        $('button').prop('disabled', true);
        $('body').css("cursor", "progress");
    }
    else{
        $('button #textoBoton').show();
        $('button .spinner-border').hide();
        $('button').prop('disabled', false);
        $('body').css("cursor", "default");
    }
}
//Pasar un array de strings con los id de los botones, ejemplo ["#btnModificar","#btnHola"]
function botonCargardo(btns, desactivar){
    btns.forEach(e => {
        if(desactivar){
            $('body').css("cursor", "progress");
            $(e).prop('disabled', true);
            $(e).addClass('opacity-50');
        }
        else{
            $('body').css("cursor", "default");
            $(e).prop('disabled', false);
            $(e).removeClass('opacity-50');
        }
    });
}

function sinErrores(campos, valores) {
    let errores = "";
    for (let i = 0; i < campos.length; i++) {
        errores += (valores[i] != "") ? "" : "El campo "+campos[i]+" se encuentra vacio.\n";
    }
    return errores;
}

function prueba() {
        console.log("Conexion entre archivos");
}

//respuesta exitosa debe tener un parametro "response"
function ajaxs(tipo, ruta, datos, respuestaExitosa) {
    $.ajax({
        type: tipo,
        url: ruta,
        data: datos,
        contentType: "application/x-www-form-urlencoded",
        success: respuestaExitosa,
        error: function( jqXHR, textStatus, errorThrown) {
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
}

function openLeftMenu() {
    $('#leftMenu').addClass('active');
}

function closeLeftMenu() {
    $('#leftMenu').removeClass('active');
}


function pestaniasServicios(evt, nombreServicio) {

    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("nav-link");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(nombreServicio).style.display = "block";
    evt.currentTarget.className += " active";
}

$('#btnInicio').click(function () {
    window.location.href = $(this).attr('name');
});

$('#btnLogIn').click(function () {
    window.location.href = $(this).attr('name');
});

