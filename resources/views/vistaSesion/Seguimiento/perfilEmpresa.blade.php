@extends('plantillas.PlantillaSession')
@section('tituloSession', 'Perfil de empresa')
@section('cuerpoSession')
<main>
    {{-- HEADER PERFIL EMPRESA --}}
    <section class="mx-auto bg-danger contenedorNegocioHeader d-flex justify-content-between position-relative">
        <img id="portadaNegocio" src="{{$urlEmpresa}}" alt="">
        {{-- LOGO NEGOCIO --}}
        <article class="position-relative logoNegocio">
            <img id="logoNegocio" src="{{$urlLogo}}" alt="">
        </article>
        {{-- BOTON DE SEGUIR PAGINA --}}
        <div>
            @if (isset($siguiendo))
            <a href="{{route('cambiarSeguirEmpresa', $empresa->id)}}">
                <button class="btn btn-primary fs-5 fw-bold">Siguiendo</button>
            </a>
            @else
            <a href="{{route('cambiarSeguirEmpresa', $empresa->id)}}">
                <button class="btn btn-primary fs-5 fw-bold">Seguir</button>
            </a>
            @endif
        </div>
    </section>
    {{-- CONTENEDOR DE DATOS PRINCIPALES DEL NEGOCIO --}}
    <section class="col-10 mx-auto p-4 border border-dark border-2 rounded contenedoresDatosNegocio fondoGrisClaro">
        <div class="d-flex justify-content-between py-3">
            <h1 class="fs-2 fw-bold">Nombre del negocio: {{$empresa->razonSocial}}</h1>
            <h2 class="fs-4"><span class="fw-bold"> Giro del negocio: {{$empresa->giroNegocio}}</span></h2>
        </div>
        <h4><span class="fw-bold">Descripción: </span>{{$empresa->descripcion}}</h4>
        <h4><span class="fw-bold">Dirección: </span>{{$empresa->direccion}}</h4>
    </section>
    {{-- CONTENEDOR DE SERVICIOS --}}
    <h4 class="col-10 mx-auto fs-3 fw-bold">¿Qué servicios o productos ofrecemos?</h4>
    <section class="col-10 mx-auto mb-5 p-4 pt-1 border border-dark border-2 rounded fondoGrisClaro">
        <div class="menuBotonesServicios">
            <ul class="nav nav-tabs">
                @foreach ($servicios as $servicio)
                    <li class="nav-item">
                        @if ($loop->index == 0)
                            <a class="nav-link active" aria-current="page" href="#" onclick="pestaniasServicios(event, '{{$servicio->nombre}}')">
                        @else
                            <a class="nav-link" href="#" onclick="pestaniasServicios(event, '{{$servicio->nombre}}')">
                        @endif
                            <h4 class="fw-bold mx-2">{{$servicio->nombre}}</h4>
                        </a>
                    </li>
                @endforeach
                @if (count($servicios) == 0)
                    <h4 class="fw-bold mx-2">Sin serivicios</h4>
                @endif
            </ul>
        </div>
        @foreach ($servicios as $servicio)
            @if ($loop->index == 0)
                <div id="{{$servicio->nombre}}" class="tabcontent contenedoVisibleServicios" style="display: block;">
            @else
                <div id="{{$servicio->nombre}}" class="tabcontent contenedoVisibleServicios">
            @endif
                <h4 class="fs-3 fw-bold">Nombre servicio/Producto: {{$servicio->nombre}}</h4>
                <div class="d-flex justify-content-between">
                    <div class="col-9">
                        <h4><span class="fw-bold">Descripción: </span>{{$servicio->descripcion}}</h4>
                        <h4><span class="fw-bold">Datos necesarios: </span>WIP</h4>
                    </div>
                    <article class="border border-dark border-2 rounded logoNegocio">

                    </article>
                </div>
            </div>
        @endforeach
        @if (count($servicios) == 0)
            <h4 class="fw-bold text-center mx-2">Esta empresa no tiene serivicios registrados</h4>
        @endif
    </section>
    {{-- CONTENEDOR DATOS DE CONTACTO --}}
    <h4 class="col-10 mx-auto fs-3 fw-bold">Datos de contacto</h4>
    <section class="col-10 mx-auto mb-5 p-4 border border-dark border-2 rounded d-flex justify-content-around fondoGrisClaro">
        <div>
            <h4><span class="fw-bold">Correos: </span></h4>
            <h4>{{$empresa->correoEmpresa}}</h4>
        </div>
        <div>
            <h4><span class="fw-bold">Telefonos: </span></h4>
            <h4>{{$empresa->telefonoEmpresa}}</h4>
        </div>
        <div>
            <h4><span class="fw-bold">Paginas: </span></h4>
            <h4>{{$empresa->paginaWeb}}</h4>
        </div>
    </section>
    {{-- CONTENEDOR UBICACION DE MAPA --}}
    @if (isset($empresa->latitud))
        <h4 class="col-10 mx-auto fs-3 fw-bold">Ubicación del negocio</h4>
        <section class="col-10 mx-auto mb-5 border border-dark border-2 rounded fondoGrisClaro">
            <div id="map" class="rounded"></div>
        </section>
    @endif
</main>
@endsection
@push('scripts')
    <script>
        @if (isset($mensajeFlash))
            swal( "{{$mensajeFlash[1]}}", "{{$mensajeFlash[0]}}", "{{$mensajeFlash[2]}}");
        @endif
        //INICIARLIZAR VISTA
        @if (isset($empresa->latitud))
            var map = L.map('map').setView([24.142014, -110.312859], 16);
            //DISE
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);
            var marker = L.marker([24.142014, -110.312859]).addTo(map);
        @endif
    </script>
@endpush
