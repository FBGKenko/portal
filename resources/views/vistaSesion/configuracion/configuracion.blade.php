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
        {{-- BOTONES DE CREAR UN NEGOCIO --}}
        <div class="">
            <h4 class="fs-3 fw-bold">¿Tienes negocio y lo quieres registrar?</h4>
            <button class="btn btn-primary my-3 fw-bold">Envianos tu solicitud</button>
            <button class="btn btn-primary my-3 fw-bold">Mis Negocios</button>
        </div>
    </main>
@endsection
