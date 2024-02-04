@extends('plantillas.PlantillaSession')
@section('tituloSession', 'Agregar servicio')
@section('cuerpoSession')
<main class="col-10 mx-auto">
    {{-- BUSCADOR DE SERVICIOS --}}
    <article>
        <h4 class="fs-3 fw-bold">Mis servicios contratados</h4>
        <input id="buscadorMisSerevicios" type="text" class="form-control mb-1" placeholder="Buscar por nombre">
    </article>
    {{-- CONTENEDOR DE EMPRESAS --}}
    <div class="d-flex empresasSuscripto">
        <a href="#" class="tablinks">
            <h4 class="fw-bold mx-2">Todos (3)</h4>
        </a>
        <a href="#" class="tablinks">
            <h4 class="fw-bold mx-2">Empresa 1 (2)</h4>
        </a>
        <a href="#" class="tablinks">
            <h4 class="fw-bold mx-2">Empresa 2 (1)</h4>
        </a>
    </div>
    {{-- TABLA DE MIS SERVICIOS --}}
    <table id="misServicios" class="w-100 bg-primary bg-opacity-50 mx-auto mt-3 rounded rounded-3">
        <thead>
            <tr class="bg-primary bg-opacity-75">
                <th class="py-3 text-center">Empresa</th>
                <th class="py-3 text-center">Servicio</th>
                <th class="py-3 text-center">Descripción</th>
                <th class="py-3 text-center">Acción</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-bottom">
                <td class="py-4 text-center fw-bold">Empresa 1</td>
                <td class="py-4 text-center fw-bold">Servicio 1</td>
                <td class="py-4 text-center">bbbb</td>
                <td class="py-3 text-center">
                    <button class="btn btn-primary fw-bold">Ver servicio</button>
                </td>
            </tr>
            <tr class="border-bottom">
                <td class="py-4 text-center fw-bold">Empresa 1</td>
                <td class="py-4 text-center fw-bold">Servicio 2</td>
                <td class="py-4 text-center">bbbb</td>
                <td class="py-3 text-center">
                    <button class="btn btn-primary fw-bold">Ver servicio</button>
                </td>
            </tr>
            <tr class="border-bottom">
                <td class="py-4 text-center fw-bold">Empresa 2</td>
                <td class="py-4 text-center fw-bold">Servicio 3</td>
                <td class="py-4 text-center">bbbb</td>
                <td class="py-3 text-center">
                    <button class="btn btn-primary fw-bold">Ver servicio</button>
                </td>
            </tr>
        </tbody>
    </table>
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
    <script>
        function bindear(){
            /*
                Caso 1: todas cerradas, clic en una
                Caso 2: una abierta, clic en la misma
                caso 3: una abierta, clic en otra
            */
            $(this).next().slideToggle('slow', 'swing');
        }

        $('div.contenedorEmpresaServicio').click(bindear);
    </script>

@endsection
@push('scripts')
    <script>
        var tabla;
        var empresaFiltrada = "todos";
        //INICIALIZAR DATATABLA
        $(document).ready(function () {
            tabla = $('#misServicios').DataTable({
                initComplete: function () {
                    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
                        if(settings.nTable.id == "misServicios"){
                            var buscador = $('#buscadorMisSerevicios').val().toUpperCase();
                            var empresa = data[0].toUpperCase();
                            var servicio = data[1].toUpperCase();
                            if(empresaFiltrada.toUpperCase() == "TODOS"){
                                if(buscador.length == 0){
                                    return true;
                                }
                                if(servicio.includes(buscador)){
                                    return true;
                                }
                                else{
                                    return false;
                                }
                            }
                            else{
                                if(empresaFiltrada.toUpperCase() == empresa && buscador.length == 0){
                                    return true;
                                }
                                if(empresaFiltrada.toUpperCase() == empresa && servicio.includes(buscador)){
                                    return true;
                                }
                                else{
                                    return false;
                                }
                            }
                        }
                        else{
                            return true;
                        }
                    });
                },
                "ordering": false,
                "lengthChange": false,
                "pageLength": 5,
                "dom":"lrtip"
            });
        });
        //REDIBUJAR TABLA AL ESCRIBIR EN UN BUSCADOR
        $('#buscadorMisSerevicios').keyup(function (e) {
            tabla.draw();
        });
        //REDIBUJAR TABLA AL ESCRIBIR EN UN BUSCADOR
        $('.empresasSuscripto a').click(function(e) {
            let titulo = $(this).children().text().split("(");
            empresaFiltrada = titulo[0].trim();
            tabla.draw();
        });
    </script>
@endpush


