@extends('plantillas.PlantillaSession')
@section('tituloSession', 'Permisos')
@section('cuerpoSession')
    <main>
        <section class="col-7 mx-auto mt-3">
            <h4 class="fs-3 fw-bold">Administrar mis permisos</h4>
            <h4 class="fw-bold">Seleccione el <span class="fw-bold">negocio</span> para administrar los permisos:</h4>
            {{-- SELECT PARA ESCOGER UN NEGOCIO A GESTIONAR --}}
            <div class="d-flex justify-content-between">
                <select name="listaEmpresas" id="listaEmpresas" class="form-select mb-3">
                    <option value="-1">Seleccione una empresa</option>
                    @foreach ($empresasSiguiendo as $empresa)
                        <option value="{{$empresa->id}}">{{$empresa->empresa->razonSocial}}</option>
                    @endforeach
                </select>
                <form id="formularioGuardarPermiso" action="{{route('permisos.guardarPermiso')}}" method="post">
                    @csrf
                    <button class="btn btn-primary fw-bold">Guardar cambios</button>
                </form>
            </div>
            {{-- TABLA PARA GESTIONAR LOS PERMISOS --}}
            <table id="gestorPermisosDatos" class="w-100 bg-primary bg-opacity-50 mx-auto mt-3 rounded rounded-3">
                <thead>
                    <tr class="bg-primary bg-opacity-75">
                        <th class="py-3 text-center">
                            <input class="form-check-input fs-3" type="checkbox" value="" id="compartirTodo">
                        </th>
                        <th class="py-3 text-center fw-bold">Modulo de datos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($moduloDatos as $modulo)
                        <tr class="border-bottom">
                            <td class="py-4 text-center">
                                <input class="form-check-input fs-3" type="checkbox" value="" id="compartirModulo_{{$modulo->id}}">
                            </td>
                            <td class="py-4 text-center fw-bold">{{$modulo->nombre}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
@endsection
@push('scripts')
    <script>
        var tabla;
        @if (isset($mensajeFlash))
            swal( "{{$mensajeFlash[1]}}", "{{$mensajeFlash[0]}}", "{{$mensajeFlash[2]}}");
        @endif
        // INICIARLAR LA TABLA
        $(document).ready(function () {
            tabla = $('#gestorPermisosDatos').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/2.0.1/i18n/es-ES.json',
                },
                "ordering": false,
                "lengthChange": false,
                "pageLength": 10,
                "dom":"lrtip"
            });
        });

        $('#listaEmpresas').change(function (e) {
            e.preventDefault();
            $.when(
                $.ajax({
                    type: "GET",
                    url: '{{route("permisos.obtenerPermisos")}}',
                    data: [{name:'seguimientoId', value:$('#listaEmpresas').val()}],
                    contentType: "application/x-www-form-urlencoded",
                    success: function(response)
                    {
                        var fullCompartido = true;
                        $('[id^="compartirModulo_"]').prop('checked', false);
                        response.forEach(e => {
                            $('#compartirModulo_' + e.grupo_id).prop('checked', e.compartido);
                            if(!e.compartido){
                                fullCompartido = false;
                            }
                        });
                        if(fullCompartido){
                            $('#compartirTodo').prop('checked', true);
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
                    // botonCargardo(["#btnInicio", "#btnLogIn", "#btnAnterior2", "#btnRegistrarse"], false);
                    return false;
                }
            );
        });

        $('#formularioGuardarPermiso').submit(function (e) {
            var empresaListaId = $('#listaEmpresas').val();
            if(empresaListaId > 0){
                var checkboxs = $('[id^="compartirModulo_"]');
                var nombreValor = [];
                $.each(checkboxs, function (indexInArray, valueOfElement) {
                    var inputFormulario = '<input type="hidden" name="'+$(valueOfElement).attr('id')+'" value="'+$(valueOfElement).is(':checked')+'">';
                    $('#formularioGuardarPermiso').append(inputFormulario);
                });
                var inputFormulario = '<input type="hidden" name="seguimientoId" value="'+$('#listaEmpresas').val()+'">';
                $(this).append(inputFormulario);
            }
            else{
                swal( "Primero debe seleccionar una empresa", "Atención", "warning");
                return false;
            }
        });
        $('#compartirTodo').click(function (e) {
            $('[id^="compartirModulo_"]').prop('checked', $(this).is(':checked'));
        });
    </script>
@endpush
