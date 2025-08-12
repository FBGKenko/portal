@extends('plantillas.PlantillaSession')
@section('tituloSession', 'Catalogo de Distribuidores')
@section('cuerpoSession')
    <style>
        /* Imagen principal en el modal */
        #mainImage {
            width: 100%;
            max-height: 400px;
            object-fit: contain;
        }

        /* Miniaturas */
        .thumb-img {
            height: 70px;
            cursor: pointer;
            object-fit: cover;
            border: 2px solid transparent;
        }

        .thumb-img.active {
            border-color: #0d6efd;
        }

        /* Carrusel horizontal */
        .thumb-carousel {
            overflow-x: auto;
            white-space: nowrap;
        }

        .thumb-carousel img {
            display: inline-block;
            margin-right: 5px;
        }
    </style>
<main class="col-10 mx-auto">
    {{-- BUSCADOR DE SERVICIOS --}}
    <article>
        <h4 class="fs-3 fw-bold">Servicio: CATALOGO DE DISTRIBUIDORES</h4>
        {{-- <input id="buscadorMisSerevicios" type="text" class="form-control mb-1" placeholder="Buscar por nombre de la empresa o servicio"> --}}
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
                <th class="py-3 text-center">Código</th>
                <th class="py-3 text-center">Categoría</th>
                <th class="py-3 text-center">Nombre producto</th>
                <th class="py-3 text-center">Descripción</th>
                <th class="py-3 text-center">Presentación</th>
                <th class="py-3 text-center">Precio distribuidor</th>
                <th class="py-3 text-center">Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr class="border-bottom">
                    <td class="py-4 text-center fw-bold">{{ $item['codigo'] }}</td>
                    <td class="py-4 text-center fw-bold">{{ $item['categoria'] }}</td>
                    <td class="py-4 text-center">{{ $item['producto'] }}</td>
                    <td class="py-4 text-center">{{ $item['descripcion'] ?? 'sin descripción'}}</td>
                    <td class="py-4 text-center">{{ $item['presentacion'] }}</td>
                    <td class="py-4 text-center">{{ $item['PRECIO_DISTRIBUIDOR'] }}</td>
                    <td class="py-4 text-center">
                        <a href="#" class="btn {{ count($item['imagenes']) > 0 ? 'btn-primary' : 'btn-secondary' }} fw-bold btnVerImagen" data-imagenes='@json($item['imagenes'])'>
                            Ver Imagenes
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Imagenes del Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body text-center">
                    <!-- Imagen principal -->
                    <img id="mainImage" src="" alt="Imagen grande" style="width: 100%; max-height: 400px; object-fit: contain;">

                    <!-- Carrusel de miniaturas -->
                    <div class="thumb-carousel mt-3" style="overflow-x:auto; white-space:nowrap;">
                        <!-- Se llena dinámicamente -->
                    </div>
                </div>

            </div>
        </div>
    </div>
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
                "pageLength": 10,
                "dom":"lrtip"
            });
        });
        //REDIBUJAR TABLA AL ESCRIBIR EN UN BUSCADOR
        $('#buscadorMisSerevicios').keyup(function (e) {
            tabla.draw();
        });
        $(document).on("click", ".btnVerImagen", function (e) {
            e.preventDefault();

            // Obtener array de imágenes desde el data-imagenes
            let imagenes = $(this).data("imagenes");

            if (!imagenes || imagenes.length === 0) {
                alert("No hay imágenes para mostrar.");
                return;
            }

            // Mostrar la primera como imagen principal
            $("#mainImage").attr("src", '{{$urlBaseImagen}}' + imagenes[0]);

            // Llenar carrusel de miniaturas
            let htmlThumbs = "";
            imagenes.forEach((src, index) => {
                htmlThumbs += `<img src="{{$urlBaseImagen}}${src}"
                                    class="thumb-img ${index === 0 ? 'active' : ''}"
                                    style="height:70px;cursor:pointer;object-fit:cover;border:2px solid ${index===0 ? '#0d6efd' : 'transparent'};margin-right:5px;">`;
            });
            $(".thumb-carousel").html(htmlThumbs);

            // Mostrar modal
            new bootstrap.Modal(document.getElementById("imageModal")).show();
        });

        // Cambiar imagen principal al hacer click en miniatura
        $(document).on("click", ".thumb-img", function () {
            $(".thumb-img").css("border-color", "transparent").removeClass("active");
            $(this).css("border-color", "#0d6efd").addClass("active");
            $("#mainImage").attr("src", $(this).attr("src"));
        });


    </script>
@endpush


