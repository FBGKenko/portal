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
    {{-- SERIVICIOS FAVORITOS --}}
    <section class="col-10 mx-auto mb-5 p-4 pt-1 border border-dark border-2 rounded fondoGrisClaro">
        <div class="menuBotonesServicios">
            <a href="#" class="tablinks" onclick="pestaniasServicios(event, 'servicio1')">
                <h4 class="fw-bold mx-2">Módulo datos 1</h4>
            </a>
            <a href="#" class="tablinks" onclick="pestaniasServicios(event, 'servicio2')">
                <h4 class="fw-bold mx-2">Módulo datos 2</h4>
            </a>
        </div>
        <div id="servicio1" class="tabcontent contenedoVisibleServicios" style="display: block;">
            <h4><span class="fw-bold">Dato 1: </span>Lorem ipsum dolor sit amet</h4>
            <h4><span class="fw-bold">Dato 2: </span>Lorem ipsum dolor sit amet</h4>
        </div>
        <div id="servicio2" class="tabcontent contenedoVisibleServicios">
            <h4><span class="fw-bold">Dato 3: </span>Lorem ipsum dolor sit amet</h4>
            <h4><span class="fw-bold">Dato 4: </span>Lorem ipsum dolor sit amet</h4>
        </div>
    </section>
    {{-- NOTIFICACIONES --}}
    <section class="col-10 mx-auto mb-5 p-4 pt-1 border border-dark border-2 rounded fondoGrisClaro">
        <div class="menuBotonesServicios">
            <a href="#" class="tablinks" onclick="pestaniasServicios(event, 'servicio1')">
                <h4 class="fw-bold mx-2">Módulo datos 1</h4>
            </a>
            <a href="#" class="tablinks" onclick="pestaniasServicios(event, 'servicio2')">
                <h4 class="fw-bold mx-2">Módulo datos 2</h4>
            </a>
        </div>
        <div id="servicio1" class="tabcontent contenedoVisibleServicios" style="display: block;">
            <h4><span class="fw-bold">Dato 1: </span>Lorem ipsum dolor sit amet</h4>
            <h4><span class="fw-bold">Dato 2: </span>Lorem ipsum dolor sit amet</h4>
        </div>
        <div id="servicio2" class="tabcontent contenedoVisibleServicios">
            <h4><span class="fw-bold">Dato 3: </span>Lorem ipsum dolor sit amet</h4>
            <h4><span class="fw-bold">Dato 4: </span>Lorem ipsum dolor sit amet</h4>
        </div>
    </section>
</main>
@endsection
