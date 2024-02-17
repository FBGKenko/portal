@extends('plantillas.PlantillaSession')
@section('tituloSession', 'Configuración')
@section('cuerpoSession')
    <main class="col-10 mx-auto mb-5">
        {{-- CAMBIAR PERMISOS DE DATOS --}}
        <h4 class="fs-3 mb-0 fw-bold">¿Qué empresas tienen accesos a mis datos?</h4>
        <a href="{{route('permisos')}}">
            <button class="btn btn-primary my-3 fw-bold">Cambiar permisos</button>
        </a>
        {{-- ACTIVADOR DE MODAL CAMBIAR CONTRASEÑA --}}
        <h4 class="fs-3 mb-0 fw-bold">¿Deseas cambiar de contraseña?</h4>
        <button class="btn btn-primary my-3 fw-bold">Cambiar la contraseña</button>
        {{-- CONTENEDOR DE DATOS NUEVOS --}}
        <h4 class="fs-3 fw-bold">Gestionar mis datos</h4>
        <section class="mb-5 p-4 pt-1 border border-dark border-2 rounded fondoGrisClaro">
            <div class="menuBotonesServicios">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#" onclick="pestaniasServicios(event, 'servicio1')">
                            <h4 class="fw-bold mx-2">Datos generales</h4>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="pestaniasServicios(event, 'servicio2')">
                            <h4 class="fw-bold mx-2">Modulo de datos 1</h4>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="pestaniasServicios(event, 'servicio3')">
                            <h4 class="fw-bold mx-2">Modulo de datos 2</h4>
                        </a>
                    </li>
                </ul>
            </div>
            <div id="servicio1" class="tabcontent contenedoVisibleServicios" style="display: block;">
                <span class="fs-5 fw-bold">Dato 1: </span>
                <input type="text" class="form-control mb-3">
                <span class="fs-5 fw-bold">Dato 2: </span>
                <input type="text" class="form-control mb-3">
            </div>
            <div id="servicio2" class="tabcontent contenedoVisibleServicios">
                <span class="fs-5 fw-bold">Dato 3: </span>
                <input type="text" class="form-control mb-3">
                <span class="fs-5 fw-bold">Dato 4: </span>
                <input type="text" class="form-control mb-3">
            </div>
            <div id="servicio3" class="tabcontent contenedoVisibleServicios">
                <span class="fs-5 fw-bold">Dato 5: </span>
                <input type="text" class="form-control mb-3">
                <span class="fs-5 fw-bold">Dato 6: </span>
                <input type="text" class="form-control mb-3">
            </div>
        </section>
   </main>
@endsection
