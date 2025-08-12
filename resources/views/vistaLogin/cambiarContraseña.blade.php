@extends('plantillas.plantillaMain')
@section('titulo', 'Cambiar contraseña')
@section('cuerpo')
    <header class="clearfix border border-3 p-3">
        <button id="btnInicio" name="{{route('index')}}" class='btn bg-success bg-gradient text-white float-end me-5 fw-bold'>Inicio</button>
        <button id="btnLogIn" name="{{route('login')}}" class='btn bg-success bg-gradient text-white float-end me-5 fw-bold'>Iniciar sesión</button>
    </header>
    <main>
        <article class="d-flex justify-content-center">
            <form class="col-4 bg-secondary text-center rounded-3 mt-5 p-5 pt-3" id="formCC" action="{{route('CCC', $token->token)}}" method="POST">
                @csrf
                <h3 class="fw-bold text-white">CAMBIAR CONTRASEÑA</h3>
                <input class="col-9 mb-3" id="txtContra1" name="txtContra1" placeholder="Nueva contraseña" minlength="8" maxlength="20" type="password">
                <input class="col-9 mb-3" id="txtContra2" name="txtContra2" placeholder="Repetir contraseña" minlength="8" maxlength="20" type="password">
                <div class="mx-auto">
                    <label class="container col-6 text-white">Mostrar contraseña
                        <input type="checkbox" id="cbMostrarContra">
                        <span class="checkmark mt-1"></span>
                    </label>
                </div>
                <div class="mt-3">
                    <input class="col-7 btn btn-success fw-bold border border-dark" type="submit" id="btnCC" name="{{route('login')}}" value="Confirmar">
                </div>
            </form>
        </article>
    </main>
    <footer>
    </footer>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('#formCC').submit(function () {
            botonCargardo(["#btnInicio", "#btnLogIn", "#btnCC"], true);
            var error = "";
            let contra1 = $('#txtContra1').val();
            let contra2 = $('#txtContra2').val();

            if(contra1.length >= 8 && contra1.length <= 20){
                /*
                    if(/^[0-9]+$/.test(contra1)){
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
                    return false;
                */
                if(contra1 == contra2){
                    $.when(
                        $.ajax({
                        type: "POST",
                        url: $('#formCC').attr('action'),
                        data: $("#formCC").serializeArray(),
                        contentType: "application/x-www-form-urlencoded",
                        success: function(response)
                        {
                            $('#txtContra1').val("");
                            $('#txtContra2').val("");
                            Swal.fire(
                                'Acción exitosa',
                                'Se ha cambiado la contraseña con éxito',
                                'success'
                            ).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = $('#btnCC').attr('name');
                                }
                            });
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
                            botonCargardo(["#btnInicio", "#btnLogIn", "#btnCC"], false);
                            return false;
                        }
                    );
                }
                else{
                    error += 'La contraseña debe coincidir en ambos campos.\n';
                    botonCargardo(["#btnInicio", "#btnLogIn", "#btnCC"], false);
                }
            }
            else{
                error += 'La contraseña debe tener minimo 8 caracteres y max 20 caracteres.\n';
                botonCargardo(["#btnInicio", "#btnLogIn", "#btnCC"], false);
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
    </script>
@endsection
