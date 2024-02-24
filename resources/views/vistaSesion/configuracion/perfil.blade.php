@extends('plantillas.PlantillaSession')
@section('tituloSession', 'Perfil')
@section('cuerpoSession')
<main>
    {{-- CONTENEDORES DE DATOS GENERALES --}}
    <h4 class="col-10 mx-auto fs-3 fw-bold">Datos generales</h4>
    <section class="col-10 mx-auto p-4 border border-dark border-2 rounded fondoGrisClaro">
        <h4><span class="fw-bold">Nombre completo: </span>{{session('usuario')->nombres}} {{session('usuario')->apellidos}}</h4>
        <h4><span class="fw-bold">Correo: </span>{{session('usuario')->correo}}</h4>
        <h4><span class="fw-bold">Telefono: </span>{{session('usuario')->telefono}}</h4>
        @if (isset(session('usuario')->cumpleanios))
            <h4><span class="fw-bold">Cumpleaños: </span>{{date('d/F/Y', strtotime(session('usuario')->cumpleanios))}}</h4>
            <h4><span class="fw-bold">Edad: </span>{{$edad}} años</h4>
        @endif
    </section>
    {{-- CONTENEDOR DE NUEVOS DATOS --}}
    <h4 class="col-10 mx-auto fs-3 fw-bold">Datos adicionales</h4>
    <section class="col-10 mx-auto mb-5 p-4 pt-1 border border-dark border-2 rounded fondoGrisClaro">
        <div class="menuBotonesServicios">
            <ul class="nav nav-tabs">
                @foreach ($gruposYCatalogos[0] as $grupo)
                @if ($loop->index == 0)
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#" onclick="pestaniasServicios(event, 'servicio_{{$grupo->id}}')">
                            <h4 class="fw-bold mx-2">{{$grupo->nombre}}</h4>
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="pestaniasServicios(event, 'servicio_{{$grupo->id}}')">
                            <h4 class="fw-bold mx-2">{{$grupo->nombre}}</h4>
                        </a>
                    </li>
                @endif
            @endforeach
            </ul>
        </div>
        @foreach ($gruposYCatalogos[0] as $grupo)
            @if ($loop->index == 0)
                <div id="servicio_{{$grupo->id}}" class="tabcontent contenedoVisibleServicios" style="display: block;">
                    @foreach ($gruposYCatalogos[1] as $catalogo)
                        @if ($grupo->id == $catalogo->grupo_dato_id)
                            <h4><span class="fw-bold">{{$catalogo->campoValor}}: </span>{{$catalogo->valor}}</h4>
                        @endif
                    @endforeach
                </div>
            @else
                <div id="servicio_{{$grupo->id}}" class="tabcontent contenedoVisibleServicios">
                    @foreach ($gruposYCatalogos[1] as $catalogo)
                        @if ($grupo->id == $catalogo->grupo_dato_id)
                            <h4><span class="fw-bold">{{$catalogo->campoValor}}: </span>{{$catalogo->valor}}</h4>
                        @endif
                    @endforeach
                </div>
            @endif
        @endforeach
    </section>
    {{-- BOTONES DE CREAR UN NEGOCIO --}}
    <div class="col-10 mx-auto">
        <h4 class="fs-3 fw-bold">¿Tienes negocio y lo quieres registrar?</h4>
        <button class="btn btn-primary my-3 fw-bold">Envianos tu solicitud</button>
        <button class="btn btn-primary my-3 fw-bold">Mis Negocios</button>
    </div>
</main>
@endsection
