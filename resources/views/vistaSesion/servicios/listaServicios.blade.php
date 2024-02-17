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
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"><h4 class="fw-bold mx-2">Todos (3)</h4></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><h4 class="fw-bold mx-2">Empresa 1 (2)</h4></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><h4 class="fw-bold mx-2">Empresa 2 (1)</h4></a>
            </li>
        </ul>
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


