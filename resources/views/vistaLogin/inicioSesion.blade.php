@extends('plantillas.plantillaMain')
@section('titulo', 'Inicio sesión')
@section('cuerpo')
    <header class="clearfix border border-3 p-3">
        <button id="btnInicio" name="{{route('index')}}" class='btn bg-success bg-gradient text-white
        float-end me-5 fw-bold'>Inicio</button>
    </header>
    <main>
        <article class="d-flex justify-content-center">
            <form action="{{route('login.auth')}}" id="formInicio" method="POST" class="col-4 bg-secondary
                text-center rounded-3 mt-5 p-5 pt-3">
                @csrf
                <h3 class="fw-bold text-white">INICIO DE SESIÓN</h3>
                <input type="text" class="col-9 mb-3" placeholder="Correo o Telefono" name="txtCorreo" id="txtCorreo">
                <input type="password" class="col-9 mb-3" placeholder="Contraseña" name="txtContra" id="txtContra">
                <div class="mx-auto">
                    <label class="container col-6 text-white">Mostrar contraseña
                        <input type="checkbox" id="cbMostrarContra">
                        <span class="checkmark mt-1"></span>
                    </label>
                </div>
                <div class="mt-3">
                    <input type="submit" id="btnIniciar" value="Iniciar sesión" class="col-7 btn btn-success
                        fw-bold border border-dark">
                    <a href="{{route('reg')}}">
                        <input type="button" id="btnRegistrar" value="Registrarse" class="col-7 btn btn-success
                            fw-bold border border-dark mt-2">
                    </a>
                </div>
                <div class="container pt-2">
                    <a id="linkOlvideContra" href="{{route('olvideC')}}" class="text-white text-decoration-none">
                        Olvide contraseña
                    </a>
                </div>
            </form>
        </article>
    </main>
    <footer>
    </footer>
@endsection
@section('scripts')
    <script>
        $('#formInicio').submit( function () {
            salida = false;
            var txtCorreo = $("#txtCorreo").val();
            var txtClave = $("#txtContra").val();
            // let error = " ";
            // botonCargardo(["#btnIniciar", "#btnRegistrar", "#linkOlvideContra", "#btnInicio"], true);
            // if(txtCorreo != "" && txtClave != ""){
            //     var ruta = $('#formInicio').attr('action');
            //     $.when(
            //         $.ajax({
            //         type: "POST",
            //         url: ruta,
            //         data: $("#formInicio").serializeArray(),
            //         contentType: "application/x-www-form-urlencoded",
            //         success: function(response)
            //         {
            //             // if(response.includes("http")){
            //                 ruta = response;
            //                 salida = true;
            //             // }
            //             // else if(response == 1){
            //             //     swal('Ocurrió un error', 'No hay usuarios registrados con este correo o telefono.', 'error');
            //             //     salida = false;
            //             // }
            //             // else if(response == 2){
            //             //     swal('Ocurrió un error', 'La contraseña es incorrecta.', 'error');
            //             //     salida = false;
            //             // }
            //             // else{
            //             //     swal('Ocurrió un error', 'Ocurrió un error inesperado.', 'error');
            //             //     console.log(response);
            //             //     salida = false;
            //             // }
            //         },
            //         error: function( jqXHR, textStatus, errorThrown ) {
            //             if (jqXHR.status === 0) {
            //                 console.log('Not connect: Verify Network.');
            //             } else if (jqXHR.status == 404) {
            //                 console.log('Requested page not found [404]');
            //             } else if (jqXHR.status == 500) {
            //                 console.log('Internal Server Error [500].');
            //             } else if (textStatus === 'parsererror') {
            //                 console.log('Requested JSON parse failed.');
            //             } else if (textStatus === 'timeout') {
            //                 console.log('Time out error.');
            //             } else if (textStatus === 'abort') {
            //                 console.log('Ajax request aborted.');
            //             } else {
            //                 console.log('Uncaught Error: ' + jqXHR.responseText);
            //             }
            //             salida = false;
            //         }
            //     })
            //     ).done(
            //         function () {
            //             // if(salida){
            //                 window.location.href = ruta;
            //             // }
            //             // else{
            //             //     botonCargardo(["#btnIniciar", "#btnRegistrar", "#linkOlvideContra", "#btnInicio"], false);
            //             //     return false;
            //             // }
            //         }
            //     );
            // }
            // else{
            //     swal('Ocurrió un error', 'Faltan campos por rellenar.', 'error');
            //     botonCargardo(["#btnIniciar", "#btnRegistrar", "#linkOlvideContra", "#btnInicio"], false);
            // }
            // return false;
        });

        $('#cbMostrarContra').click(function () {
            if($('#txtContra').attr('type') == "password"){
                $('#txtContra').attr('type', 'text');
            }
            else{
                $('#txtContra').attr('type', 'password');
            }
        });
    </script>
@endsection
