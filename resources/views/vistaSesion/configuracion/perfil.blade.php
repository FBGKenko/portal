@extends('plantillas.PlantillaSession')
@section('tituloSession', 'Perfil')
@section('cuerpoSession')
<main>
    {{-- CONTENEDORES DE DATOS GENERALES --}}
    <h4 class="col-10 mx-auto fs-3 fw-bold">Datos generales</h4>
    <section class="col-10 mx-auto p-4 border border-dark border-2 rounded fondoGrisClaro">
        <h4><span class="fw-bold">Nombre completo: </span>ejemplo aaa</h4>
        <h4><span class="fw-bold">Correo: </span>ejemplo aaa</h4>
        <h4><span class="fw-bold">Telefono: </span>ejemplo aaa</h4>
        <h4><span class="fw-bold">Cumpleaños: </span>ejemplo aaa</h4>
        <h4><span class="fw-bold">Edad: </span>ejemplo aaa</h4>
    </section>
    {{-- CONTENEDOR DE NUEVOS DATOS --}}
    <h4 class="col-10 mx-auto fs-3 fw-bold">Datos adicionales</h4>
    <section class="col-10 mx-auto mb-5 p-4 pt-1 border border-dark border-2 rounded fondoGrisClaro">
        <div class="menuBotonesServicios">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#" onclick="pestaniasServicios(event, 'servicio1')"><h4 class="fw-bold mx-2">Módulo datos 1</h4></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="pestaniasServicios(event, 'servicio2')"><h4 class="fw-bold mx-2">Módulo datos 2</h4></a>
                </li>
            </ul>
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
    {{-- BOTONES DE CREAR UN NEGOCIO --}}
    <div class="col-10 mx-auto">
        <h4 class="fs-3 fw-bold">¿Tienes negocio y lo quieres registrar?</h4>
        <button class="btn btn-primary my-3 fw-bold">Envianos tu solicitud</button>
        <button class="btn btn-primary my-3 fw-bold">Mis Negocios</button>
    </div>
</main>
@endsection
