@extends('plantillas.plantillaMain')
@section('titulo', 'Registrar usuario')
@section('cuerpo')
    <header class="clearfix border border-3 p-3">
        <button id="btnInicio" name="{{route('index')}}" class='btn bg-success bg-gradient text-white float-end me-5 fw-bold'>Inicio</button>
        <button id="btnLogIn" name="{{route('login')}}" class='btn bg-success bg-gradient text-white float-end me-5 fw-bold'>Iniciar sesión</button>
    </header>
    <main>
        <article class="d-flex justify-content-center">
            <form class="col-4 bg-secondary text-center rounded-3 mt-5 p-5 pt-3" id="formRegistrar" method="POST" action="{{route('reg.proceso')}}" name="1">
                @csrf
                <h3 class="fw-bold text-light">REGISTRARSE</h3>
                <p class="text-center text-light fw-bold">Llene los campos para crear una cuenta.</p>
                <div id="seccion1">
                    <label for="Nombres" class="d-block text-white fw-bold col-4">Nombres:</label>
                    <input class="form-control col-9 mb-3" id="txtNombres" name="txtNombres" placeholder="Nombres" type="text" maxlength="50">

                    <label for="Apellidos" class="d-block text-white fw-bold col-4">Apellidos:</label>
                    <input class="form-control col-9 mb-3" id="txtApellidos" name="txtApellidos" placeholder="Apellidos" type="text" maxlength="50">

                    <label for="correo" class="d-block text-white fw-bold col-4">Correo:</label>
                    <input class="form-control col-9 mb-3" id="txtCorreo" name="txtCorreo" placeholder="Correo" type="text" maxlength="100">

                    <label for="telefono" class="d-block text-white fw-bold col-4">Telefono:</label>
                    <input class="form-control col-9 mb-3" id="txtTelefono" name="txtTelefono" placeholder="Telefono" type="text" maxlength="20">

                    <label for="Cumpleaños" class="d-block text-white fw-bold col-4">Cumpleaños (Opcional):</label>
                    <input class="form-control col-9 mb-3" type="date" name="cumpleanios" id="cumpleanios" min="1950-01-01" max="2004-12-31">

                </div>
                <div id="seccion2" style="display: none;">
                    <label for="Contraseña" class="d-block text-white fw-bold col-4">contraseña:</label>
                    <input class="form-control col-9 mb-3" id="txtClave" name="txtClave" placeholder="contraseña" type="password" maxlength="20">

                    <label for="Contraseña2" class="d-block text-white fw-bold col-5">Repetir contraseña:</label>
                    <input class="form-control col-9 mb-3" id="txtClave2" name="txtClave2" placeholder="Repetir contraseña" type="password" maxlength="20">
                    <div class="mx-auto">
                        <label class="container col-6">Mostrar contraseña
                            <input type="checkbox" id="cbMostrarContra">
                            <span class="checkmark mt-1"></span>
                        </label>
                    </div>
                </div>
                <div class="mt-3">
                    <div id="btnsFinalizar" class="d-flex justify-content-around visually-hidden">
                        <input class="col-4 btn btn-success fw-bold border border-dark" type="button" id="btnAnterior2" value="Anterior">
                        <input class="col-4 btn btn-success fw-bold border border-dark" type="submit" id="btnRegistrarse" value="Confirmar">
                    </div>
                    <div id="btnsProcesando" class="d-flex justify-content-around">
                        <input class="col-4 btn btn-success fw-bold border border-dark" type="button" id="btnAnterior" value="Anterior" disabled>
                        <input class="col-4 btn btn-success fw-bold border border-dark" type="button" id="btnSiguiente" value="Siguiente">
                    </div>
                </div>
            </form>
        </article>
    </main>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#btnAnterior').click(anterior);
            $('#btnAnterior2').click(anterior);
        });

        $('#btnSiguiente').click(function () {
            if($('#formRegistrar').attr('name') == "1"){
                var txtNombres = $("#txtNombres").val();
                var txtApellidos = $("#txtApellidos").val();
                var txtCorreo = $("#txtCorreo").val();
                var txtTelefono = $("#txtTelefono").val();
                var txtCumpleanios = $("#cumpleanios").val();
                var sTipo = $("#sTipo").val();
                let errores = sinErrores(["Nombres", "Apellidos", "Correo", "Telefono"],
                                        [txtNombres, txtApellidos, txtCorreo, txtTelefono]);
                if(errores == ""){
                    $('#formRegistrar').attr('name', '2');
                    $('#seccion1').hide();
                    $('#seccion2').show();
                    $('#btnAnterior').prop('disabled', false);
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

            var txtClave = $("#txtClave").val();
            var txtClave2 = $("#txtClave2").val();
            let errores = "";

            errores = sinErrores(["Nombres", "Apellidos", "Correo", "Telefono","Contraseña",
                                "Repetir contraseña"],
                                [txtNombres, txtApellidos, txtCorreo, txtTelefono, txtClave,
                                txtClave2]);
            if(txtClave.length >= 4 && txtClave != txtClave2){
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
                        if(response[0] == 1){
                            swal('Acción exitosa', "¡Ha sido registrado con exito!", 'success');
                            var ruta = $('#btnLogIn').attr('name');
                            $("#formRegistrar")[0].reset();
                            window.location.href = ruta;//cambiar por el swal 2... como registrarEstado
                        }
                        else{
                            swal('Ocurrió un error', response[1], 'error');
                            return false;
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
                        botonCargardo(["#btnInicio", "#btnLogIn", "#btnAnterior2", "#btnRegistrarse"], false);
                        return false;
                    }
                );
                return false;
            }
            else{
                swal('Ocurrió un error', errores, 'error');
                botonCargardo(["#btnInicio", "#btnLogIn", "#btnAnterior2", "#btnRegistrarse"], false);
                return false;
            }
            return false;
        });

        function anterior() {
            if($('#formRegistrar').attr('name') == "2"){
                $('#formRegistrar').attr('name', '1');
                $('#seccion2').hide();
                $('#seccion1').show();
                $('#btnAnterior').prop('disabled', true);
                $('#btnsFinalizar').addClass('visually-hidden');
                $('#btnsProcesando').removeClass('visually-hidden');
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
    </script>
@endsection
