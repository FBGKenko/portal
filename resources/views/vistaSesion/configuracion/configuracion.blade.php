@extends('plantillas.PlantillaSession')
@section('tituloSession', 'Configuración')
@section('cuerpoSession')
    <main class="mb-5">

        <!--
        FORMULARIO CAMBIAR INFORMACION PERSONAL
        -->
        <form action="{{route('config.infoP')}}" id="formInfoPersonal" method="POST" class="col-6 text-center rounded-3 mt-3 p-5 pt-3 mx-auto">
            @csrf
            <h3 class="fw-bold">Datos personales</h3>
            <div class="d-flex justify-content-center">
                <div>
                    <input type="email" class="col-9 mb-3 fs-5" placeholder="Correo" name="txtCorreo" id="txtCorreo"
                    minlength="4" maxlength="50">
                    <input type="text" class="col-9 mb-3 fs-5" placeholder="Telefono" name="txtTelefono" id="txtTelefono"
                    minlength="10" maxlength="15">
                </div>
                <div>
                    <input type="text" class="col-9 mb-3 fs-5" placeholder="Nombres" name="txtNombres" id="txtNombres"
                    minlength="3" maxlength="50">
                    <input type="text" class="col-9 mb-3 fs-5" placeholder="Apellidos" name="txtApellidos" id="txtApellidos"
                    minlength="3" maxlength="50">
                </div>
            </div>
            <div class="mt-3">
                <input type="submit" id="btnCambiar" value="Cambiar información" class="col-auto btn btn-primary fw-bold border border-dark">
            </div>
        </form>
        <!--
        FORMULARIO CAMBIAR CONTRASEÑA
        -->
        <form action="{{route('config.cC')}}" id="formCC" method="POST" class="col-4 text-center rounded-3 mt-3 p-5 pt-3 mx-auto">
            @csrf
            <h3 class="fw-bold">Cambiar contraseña</h3>
            <input type="password" class="col-9 mb-3 fs-5" placeholder="Contraseña nueva" name="txtContra1" id="txtContra1"
            minlength="8" maxlength="20">
            <input type="password" class="col-9 mb-3 fs-5" placeholder="Repetir contraseña nueva" name="txtContra2" id="txtContra2"
            minlength="8" maxlength="20">
            <div class="mx-auto">
                <label class="container col-6">Mostrar contraseña
                    <input type="checkbox" id="cbMostrarContra">
                    <span class="checkmark mt-1"></span>
                </label>
            </div>
            <div class="mt-3">
                <input type="submit" id="btnCC" value="Cambiar contraseña" class="col-auto btn btn-primary fw-bold border border-dark">
            </div>
        </form>
        <div class="col-4 mx-auto text-center">
            <h3 class="fw-bold">Configuración de permisos</h3>
            <div class="mt-3">
                <input class="col-auto btn btn-primary fw-bold border border-dark" type="button" id="btnPermisos" value="Administrar permisos" name="{{route('permisos')}}">
            </div>
        </div>
        <!--
        BOTON PARA CAMBIAR AVISO DE PRIVACIDAD
        <form action="{{route('config.privacidad')}}" class="mt-5 mx-auto col-5" method="GET" id="formCPrivacidad" name="formCPrivacidad">
            <h3 class="fw-bold text-center">Aviso de privacidad</h3>
            <label class="container col-7">Que las empresas tengan acceso a mis datos personales
                @if ($config->datosPrivados == "N")
                    <input name="cbPrivacidad" type="checkbox" id="cbPrivacidad" checked>
                @else
                    <input name="cbPrivacidad" type="checkbox" id="cbPrivacidad">
                @endif
                <span class="checkmark mt-2"></span>
            </label>
        </form>
        -->

        <!--
        CAMBIAR CMODO OSCURO
            <article class="mt-5 mx-auto col-5">
                <h3 class="fw-bold text-center">Modo oscuro</h3>
                <label class="container col-7">Activar modo oscuro
                    <input type="checkbox" id="cbModoOscuro">
                    <span class="checkmark mt-2"></span>
                </label>
            </article>
        -->
   </main>
@endsection
@section('scriptsSession')
    <script>
        $(document).ready(function() {

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

        $("#formInfoPersonal").submit(function () {
            let correo = $("#txtCorreo").val();
            let telefono = $("#txtTelefono").val();
            let nombres = $("#txtNombres").val();
            let apellidos = $("#txtApellidos").val();
            let error = "";

            if((correo.length >= 8 && correo.length <= 100) || (telefono.length >= 10) || (nombres.length >= 3 && nombres.length <= 50) ||
                (apellidos.length >= 7 && apellidos.length <= 50)){
                if(telefono != ""){
                    if(!$.isNumeric(telefono)){
                        error += "El campo telefono solo debe incluir números.\n";
                    }
                }
                if(nombres != ""){
                    if(!/^[A-Za-záéíóuÁÉÍÓÚ]+(\s[A-Za-záéíóuÁÉÍÓÚ]+)*$/.test(nombres)){
                        error += "El campo nombres esta incorrecto.\n";
                    }
                }
                if(apellidos != ""){
                    if(!/^[A-Za-záéíóuÁÉÍÓÚ]+(\s[A-Za-záéíóuÁÉÍÓÚ]+)*$/.test(apellidos)){
                        error += "El campo apellidos esta incorrecto.\n";
                    }
                }
                if(error != ""){
                    swal('Ocurrió un error', error, 'error');
                    return false;
                }
                $.when(
                    $.ajax({
                    type: "POST",
                    url: $('#formInfoPersonal').attr('action'),
                    data: $("#formInfoPersonal").serializeArray(),
                    contentType: "application/x-www-form-urlencoded",
                    success: function(response)
                    {
                        if(response == 1){
                            swal('Datos duplicados', "Los cambios solicitados ya existen.", 'info');
                        }
                        else{
                            if(nombres != "")
                                $("#welcome").text("Bienvenido: "+nombres);
                            $("#txtCorreo").val("");
                            $("#txtTelefono").val("");
                            $("#txtNombres").val("");
                            $("#txtApellidos").val("");
                            swal('Acción exitosa', "El cambio se ha realizado con exito.", 'success');
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
            }
            else{
                swal('Ocurrió un error', "Los campos requeridos estan en blanco. Debe de llenar al menos 1.", 'error');
            }
            return false;
        });

        $('#cbPrivacidad').click(function () {
            $.when(
                $.ajax({
                type: "GET",
                url: $('#formCPrivacidad').attr('action'),
                data: $("#formCPrivacidad").serializeArray(),
                contentType: "application/x-www-form-urlencoded",
                success: function(response)
                {
                    swal('Acción exitosa', "Se han modificado la privacidad de sus datos.", 'success');
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

                }
            );
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
                            swal('Acción exitosa', "La contraseña se ha cambiado con exito.", 'success');
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

        $('#btnPermisos').click(function (e) {
            ruta = $('#btnPermisos').attr('name');
            window.location.href = ruta;
        });
    </script>
@endsection
