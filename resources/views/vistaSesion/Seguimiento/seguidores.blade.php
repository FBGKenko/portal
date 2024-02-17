@extends('plantillas.PlantillaSession')
@section('tituloSession', 'Seguidores')
@section('cuerpoSession')
    <main class="col-10 mx-auto">
        {{-- HEADER PERFIL EMPRESA --}}
        <section class="mx-auto bg-danger contenedorNegocioHeader d-flex justify-content-between position-relative">
            {{-- LOGO NEGOCIO --}}
            <article class="border border-dark border-2 rounded position-relative logoNegocio">
                <button class="btn btn-primary p-2 position-absolute editarPerfil"><img class="btnEditar" src="/img/editar.png" alt=""></button>
            </article>
            {{-- BOTON DE SEGUIR PAGINA --}}
            <button class="btn btn-primary p-2 position-absolute editarFondo"><img class="btnEditar" src="/img/editar.png" alt=""></button>
            <div>
                <div class="bg-white p-4 border border-dark border-2 rounded rounded-3">
                    <h3 class="fw-bold">Nombre Empresa:</h3>
                    <h4>Total seguidores:</h4>
                </div>
            </div>
        </section>
        {{-- CONTENEDOR DE CATEGORIA DE CLIENTES --}}
        <div class="d-flex empresasSuscripto">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#"><h4 class="fw-bold mx-2">Todos (3)</h4></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><h4 class="fw-bold mx-2">Clientes (2)</h4></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><h4 class="fw-bold mx-2">Seguidores anónimos (1)</h4></a>
                </li>
            </ul>
        </div>
        {{-- TABLA DE MIS SEGUIDORES --}}
        <table id="misClientes" class="w-100 bg-primary bg-opacity-50 mx-auto mt-3 border border-dark border-2 rounded rounded-3">
            <thead>
                <tr class="bg-primary bg-opacity-75">
                    <th class="py-3 text-center">Nombre completo</th>
                    <th class="py-3 text-center">Correo</th>
                    <th class="py-3 text-center">Tipo</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-bottom">
                    <td class="py-4 text-center fw-bold">Empresa 1</td>
                    <td class="py-4 text-center fw-bold">Servicio 1</td>
                    <td class="py-4 text-center fw-bold">Servicio 1</td>
                </tr>
                <tr class="border-bottom">
                    <td class="py-4 text-center fw-bold">Empresa 1</td>
                    <td class="py-4 text-center fw-bold">Servicio 2</td>
                    <td class="py-4 text-center fw-bold">Servicio 1</td>
                </tr>
                <tr class="border-bottom">
                    <td class="py-4 text-center fw-bold">Empresa 2</td>
                    <td class="py-4 text-center fw-bold">Servicio 3</td>
                    <td class="py-4 text-center fw-bold">Servicio 1</td>
                </tr>
            </tbody>
        </table>
    </main>
@endsection

@push('scripts')
    <script>
        var tabla;
        var empresaFiltrada = "todos";
        //INICIALIZAR DATATABLA
        $(document).ready(function () {
            tabla = $('#misClientes').DataTable({
                initComplete: function () {
                    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
                        if(settings.nTable.id == "misClientes"){
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
