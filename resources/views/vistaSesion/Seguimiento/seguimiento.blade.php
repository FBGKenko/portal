@extends('plantillas.PlantillaSession')
@section('tituloSession', 'Seguimiento')
@section('cuerpoSession')
<main>
    <section class="col-10 mx-auto mt-3">
        <article>
            <h4 class="fs-3 fw-bold">Negocios de la comunidad</h4>
            <input id="buscadorEmpresa" type="text" class="form-control mb-5" placeholder="Buscar por nombre">
        </article>
        <table id="empresas" class="w-100 bg-success bg-opacity-50 mx-auto mt-3 rounded rounded-3">
            <thead>
                <tr class="bg-success bg-opacity-75">
                    <th class="py-3 text-center">Compañia</th>
                    <th class="py-3 text-center">Pagina web</th>
                    <th class="py-3 text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < count($empresas); $i++)
                    <tr class="border-bottom">
                        <td class="py-4 text-center fw-bold">{{$empresas[$i]->razonSocial}}</td>
                        <td class="py-4 text-center">{{$empresas[$i]->paginaWeb}}</td>
                        <td class="py-3 text-center">
                            <a href="{{route('verEmpresaPerfil', str_replace(' ', '-', $empresas[$i]->razonSocial))}}">
                                <button id="btnPerfil{{$i + 1}}" class="btn bg-success bg-opacity-75 bg-gradient text-white">ver perfil</button>
                            </a>
                        </td>
                    </tr>
                @endfor
                @if (count($empresas) == 0)
                    <tr>
                        <td colspan=99>No hay empresas registradas.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </section>
</main>
@endsection
@push('scripts')
    <script>
        var tabla;
        $(document).ready(function () {
            tabla = $('#empresas').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/2.0.1/i18n/es-ES.json',
                },
                initComplete: function () {
                    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
                        if(settings.nTable.id == "empresas"){
                            var buscador = $('#buscadorEmpresa').val().toUpperCase();
                            if(buscador.length == 0){
                                return true;
                            }
                            var valor = data[0].toUpperCase();
                            if(valor.includes(buscador)){
                                return true;
                            }
                            else{
                                return false;
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
        $('#buscadorEmpresa').keyup(function (e) {
            tabla.draw();
        });
    </script>
@endpush

