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
            <h4><span class="fw-bold">Fecha de Nacimiento: </span>{{date('d/F/Y', strtotime(session('usuario')->cumpleanios))}}</h4>
            <h4><span class="fw-bold">Edad: </span>{{$edad}} años</h4>
        @endif
    </section>
    {{-- CONTENEDOR DE DATOS NUEVOS --}}
    <h4 class="col-10 mx-auto fs-3 fw-bold">Gestionar mis datos adicionales</h4>
    <section class="col-10 mx-auto mb-5 p-4 pt-1 border border-dark border-2 rounded fondoGrisClaro">
        <div class="menuBotonesServicios">
            <ul class="nav nav-tabs w-100">
                @foreach ($gruposYCatalogos[0] as $grupo)
                    @if ($loop->index == 0)
                        <li class="nav-item">
                            <a id="encabezado_{{$grupo->id}}" class="nav-link active" aria-current="page" href="#" onclick="pestaniasServicios(event, 'servicio_{{$grupo->id}}')">
                                <h4 class="fw-bold mx-2">{{$grupo->nombre}}</h4>
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a id="encabezado_{{$grupo->id}}" class="nav-link" href="#" onclick="pestaniasServicios(event, 'servicio_{{$grupo->id}}')">
                                <h4 class="fw-bold mx-2">{{$grupo->nombre}}</h4>
                            </a>
                        </li>
                    @endif
                @endforeach
                <form id="formularioGuardarModulo" action="{{route('perfil.cambiarModulo')}}" method="post" class="ms-auto">
                    <button class="btn btn-primary h-100" id="guardarCambios">Guardar cambios</button>
                </form>
            </ul>
        </div>
        @foreach ($gruposYCatalogos[0] as $grupo)
            @if ($loop->index == 0)
                <div id="servicio_{{$grupo->id}}" class="tabcontent contenedoVisibleServicios" style="display: block;">
                    @foreach ($gruposYCatalogos[1] as $catalogo)
                        @if ($grupo->id == $catalogo->grupo_dato_id)
                            <span class="fs-5 fw-bold">{{$catalogo->campoValor}}:@if (!$catalogo->opcional) * @endif </span>
                            <input id="{{$catalogo->campoValor}}" type="text" class="form-control mb-3" value="{{$catalogo->valor}}">
                            @error(str_replace(' ', '_', $catalogo->campoValor))
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        @endif
                    @endforeach
                </div>
            @else
                <div id="servicio_{{$grupo->id}}" class="tabcontent contenedoVisibleServicios">
                    @foreach ($gruposYCatalogos[1] as $catalogo)
                        @if ($grupo->id == $catalogo->grupo_dato_id)
                            <span class="fs-5 fw-bold">{{$catalogo->campoValor}}:@if (!$catalogo->opcional) * @endif </span>
                            <input id="{{$catalogo->campoValor}}" type="text" class="form-control mb-3" value="{{$catalogo->valor}}">
                            @error(str_replace(' ', '_', $catalogo->campoValor))
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        @endif
                    @endforeach
                </div>
            @endif
        @endforeach
    </section>
</main>
@endsection
@push('scripts')
    <script>
        @if (isset($mensajeFlash))
            swal( "{{$mensajeFlash[1]}}", "{{$mensajeFlash[0]}}", "{{$mensajeFlash[2]}}");
        @endif
        var idModulo = 1;
        $('.nav-link').click(function (e) {
            var nombre = $(this).attr('id').split('_');
            idModulo = nombre[1];
        });
        $('#formularioGuardarModulo').submit(function (e) {
            //FALTA VALIDAR CUANDO ES OPCIONAL Y CUANDO ES OBLIGATORIO
            $('#formularioGuardarModulo input').remove();
            $('#formularioGuardarModulo').append('<input type="hidden" name="_token" value="{{csrf_token()}}">')
            var inputs = $('#servicio_'+idModulo+' input');
            $.each(inputs, function (i, value) {
                $('#formularioGuardarModulo').append('<input type="hidden" name="'+$(value).attr('id')+'" value="'+$(value).val()+'">')
            });
            $('#formularioGuardarModulo').append('<input type="hidden" name="idModulo" value="'+idModulo+'">')
        });
    </script>
@endpush
