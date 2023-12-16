@extends('plantillas.plantillaMain')
@section('titulo', 'Olvide contraseña')
@section('cuerpo')
    <header class="clearfix border border-3 p-3">
        <button id="btnInicio" name="{{route('index')}}" class='btn bg-success bg-gradient text-white float-end me-5 fw-bold'>Inicio</button>
        <button id="btnLogIn" name="{{route('login')}}" class='btn bg-success bg-gradient text-white float-end me-5 fw-bold'>Iniciar sesión</button>
    </header>
    <main>
        <article class="d-flex justify-content-center">
            <form class="col-4 bg-secondary text-center rounded-3 mt-5 p-5 pt-3" id="formOlvide" action="{{route('enviarCC')}}" method="POST">
                @csrf
                <h3 class="fw-bold text-white">OLVIDE MI CONTRASEÑA</h3>
                <p class="text-center text-light">Le enviaremos un correo para restaurar su contraseña, ingrese su correo.</p>
                <input class="col-9 mb-3" id="txtCorreo" name="txtCorreo" placeholder="Correo" type="text">
                <div class="mt-3">
                    <input class="col-7 btn btn-success fw-bold border border-dark" type="submit" id="btnOlvide" value="Confirmar">
                </div>
            </form>
        </article>
    </main>
    <footer>
    </footer>
@endsection
@section('scripts')
    <script>
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
    </script>
@endsection
