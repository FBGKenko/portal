@extends('plantillas.PlantillaSession')
@section('tituloSession', 'Principal')
@section('cuerpoSession')
<main>
    {{-- BANNER PUBLICITARIO --}}
    <div id="carouselExampleAutoplaying" class="carousel slide col-10 mx-auto my-3 border border-dark border-2 rounded fondoGrisClaro bannerPublicitario" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner h-100">
            <div class="carousel-item active">
                <img src="/img/carousel/rol1.jpg" class="d-block imgBannerPublicitario" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/img/carousel/rol3.jpg" class="d-block imgBannerPublicitario" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="col-10 mx-auto d-flex justify-content-between">
        {{-- SERIVICIOS FAVORITOS --}}
        <section class="col-5 mb-5 p-4 pt-1 border border-dark border-2 rounded fondoGrisClaro">
            <h4 class="fs-3 fw-bold">Mis servicios favoritos</h4>
            <table id="tablaServiciosFavoritos" class="w-100 bg-primary bg-opacity-50 mx-auto mt-3 rounded rounded-3">
                <thead>
                    <tr class="bg-primary bg-opacity-75">
                        <th class="py-3 text-center fw-bold">Modulo de datos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-bottom">
                        <td class="py-4 text-center fw-bold">Datos generales</td>
                    </tr>
                    <tr class="border-bottom">
                        <td class="py-4 text-center fw-bold">Datos domicilio</td>
                    </tr>
                    <tr class="border-bottom">
                        <td class="py-4 text-center fw-bold">Datos bancarios</td>
                    </tr>
                </tbody>
            </table>
        </section>
        {{-- NOTIFICACIONES --}}
        <section class="col-5 mb-5 p-4 pt-1 border border-dark border-2 rounded fondoGrisClaro">
            <h4 class="fs-3 fw-bold">Notificaciones</h4>
            <table id="tablaNotificaciones" class="w-100 bg-primary bg-opacity-50 mx-auto mt-3 rounded rounded-3">
                <thead>
                    <tr class="bg-primary bg-opacity-75">
                        <th class="py-3 text-center fw-bold">Modulo de datos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-bottom">
                        <td class="py-4 text-center fw-bold">Datos generales</td>
                    </tr>
                    <tr class="border-bottom">
                        <td class="py-4 text-center fw-bold">Datos domicilio</td>
                    </tr>
                    <tr class="border-bottom">
                        <td class="py-4 text-center fw-bold">Datos bancarios</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
</main>
@endsection
@push('scripts')
    <script>
        var tablaServiciosFavoritos;
        var tablaNotificaciones;
        // INICIARLAR LA TABLA
        $(document).ready(function () {
            tablaServiciosFavoritos = $('#tablaServiciosFavoritos').DataTable({
                "ordering": false,
                "lengthChange": false,
                "pageLength": 10,
                "dom":"lrtip"
            });
            tablaNotificaciones = $('#tablaNotificaciones').DataTable({
                "ordering": false,
                "lengthChange": false,
                "pageLength": 10,
                "dom":"lrtip"
            });
        });
    </script>
@endpush
