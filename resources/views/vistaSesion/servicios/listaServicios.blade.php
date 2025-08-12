@extends('plantillas.PlantillaSession')
@section('tituloSession', 'Agregar servicio')
@section('cuerpoSession')
<main class="col-10 mx-auto">
    {{-- BUSCADOR DE SERVICIOS --}}
    <article>
        <h4 class="fs-3 fw-bold">Mis servicios contratados</h4>
        <input id="buscadorMisSerevicios" type="text" class="form-control mb-1" placeholder="Buscar por nombre de la empresa o servicio">
    </article>
    {{-- CONTENEDOR DE EMPRESAS --}}
    {{-- <div class="d-flex empresasSuscripto">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#"><h4 class="fw-bold mx-2">Todos (3)</h4></a>
            </li>
        </ul>
    </div> --}}
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
            @foreach ($servicios as $item)
                <tr class="border-bottom">
                    <td class="py-4 text-center fw-bold">{{ $item->empresa->razonSocial }}</td>
                    <td class="py-4 text-center fw-bold">{{ $item->nombre }}</td>
                    <td class="py-4 text-center">{{ $item->descripcion }}</td>
                    <td class="py-3 text-center">
                        <a href="{{route('serviciosCliente.verServicio')}}?idServicio={{ $item->id }}" class="btn btn-primary fw-bold">
                            Ver servicio
                        </a>
                    </td>
                </tr>
            @endforeach
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
                language: {
                    url: '//cdn.datatables.net/plug-ins/2.0.1/i18n/es-ES.json',
                },
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


