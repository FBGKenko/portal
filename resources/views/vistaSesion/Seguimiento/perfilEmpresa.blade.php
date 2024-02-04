@extends('plantillas.PlantillaSession')
@section('tituloSession', 'Perfil de empresa')
@section('cuerpoSession')
<main>
    {{-- HEADER PERFIL EMPRESA --}}
    <section class="mx-auto bg-danger contenedorNegocioHeader d-flex justify-content-between">
        {{-- LOGO NEGOCIO --}}
        <article class="border border-dark border-2 rounded logoNegocio">

        </article>
        {{-- BOTON DE SEGUIR PAGINA --}}
        <div>
            <button class="btn btn-primary fs-5 fw-bold">Seguir</button>
        </div>
    </section>
    {{-- CONTENEDOR DE DATOS PRINCIPALES DEL NEGOCIO --}}
    <section class="col-10 mx-auto p-4 border border-dark border-2 rounded contenedoresDatosNegocio fondoGrisClaro">
        <div class="d-flex justify-content-between py-3">
            <h1 class="fs-2 fw-bold">Nombre del negocio:</h1>
            <h2 class="fs-4"><span class="fw-bold"> Giro del negocio:</span></h2>
        </div>
        <h4><span class="fw-bold">Descripción: </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4>
        <h4><span class="fw-bold">Dirección: </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4>
    </section>
    {{-- CONTENEDOR DE SERVICIOS --}}
    <h4 class="col-10 mx-auto fs-3 fw-bold">¿Qué servicios o productos ofrecemos?</h4>
    <section class="col-10 mx-auto mb-5 p-4 pt-1 border border-dark border-2 rounded fondoGrisClaro">
        <div class="menuBotonesServicios">
            <a href="#" class="tablinks" onclick="pestaniasServicios(event, 'servicio1')">
                <h4 class="fw-bold mx-2">Servicio 1</h4>
            </a>
            <a href="#" class="tablinks" onclick="pestaniasServicios(event, 'servicio2')">
                <h4 class="fw-bold mx-2">Servicio 2</h4>
            </a>
        </div>
        <div id="servicio1" class="tabcontent contenedoVisibleServicios" style="display: block;">
            <h4 class="fs-3 fw-bold">Nombre servicio/Producto: servicio 1</h4>
            <div class="d-flex justify-content-between">
                <div class="col-9">
                    <h4><span class="fw-bold">Descripción: </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4>
                    <h4><span class="fw-bold">Datos necesarios: </span>Lorem ipsum dolor sit amet</h4>
                </div>
                <article class="border border-dark border-2 rounded logoNegocio">

                </article>
            </div>
        </div>
        <div id="servicio2" class="tabcontent contenedoVisibleServicios">
            <h4 class="fs-3 fw-bold">Nombre servicio/Producto: servicio 2</h4>
            <div class="d-flex justify-content-between">
                <div class="col-9">
                    <h4><span class="fw-bold">Descripción: </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4>
                    <h4><span class="fw-bold">Datos necesarios: </span>Lorem ipsum dolor sit amet</h4>
                </div>
                <article class="border border-dark border-2 rounded logoNegocio">

                </article>
            </div>
        </div>
    </section>
    {{-- CONTENEDOR DATOS DE CONTACTO --}}
    <h4 class="col-10 mx-auto fs-3 fw-bold">Datos de contacto</h4>
    <section class="col-10 mx-auto mb-5 p-4 border border-dark border-2 rounded d-flex justify-content-around fondoGrisClaro">
        <div>
            <h4><span class="fw-bold">Correos: </span></h4>
            <h4>ejemplo@gmail.com</h4>
        </div>
        <div>
            <h4><span class="fw-bold">Telefonos: </span></h4>
            <h4>6121412445</h4>
        </div>
        <div>
            <h4><span class="fw-bold">Paginas: </span></h4>
            <h4>www.test.com</h4>
        </div>
    </section>
    {{-- CONTENEDOR UBICACION DE MAPA --}}
    <h4 class="col-10 mx-auto fs-3 fw-bold">Ubicación del negocio</h4>
    <section class="col-10 mx-auto mb-5 border border-dark border-2 rounded fondoGrisClaro">
        <div id="map" class="rounded"></div>
    </section>
</main>
@endsection
@push('scripts')
    <script>
        //INICIARLIZAR VISTA
        var map = L.map('map').setView([24.142014, -110.312859], 16);
        //DISE
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        var marker = L.marker([24.142014, -110.312859]).addTo(map);
    </script>
@endpush
