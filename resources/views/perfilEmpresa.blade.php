@extends('plantillas.plantillaMain')
@section('titulo')
    Perfil de empresa
@endsection
@section('cuerpo')
<header class="clearfix border border-3 p-2">
    <x-menu></x-menu>
</header>
<main>
    <section class="col-8 mt-5 mx-auto">
        <div class="col-12 mx-auto bg-secondary bg-opacity-25 p-2 rounded-3">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="ms-4"><span class="fw-bold">Empresa:</span> {{$empresa->razonSocial}}</h3>
                    <h3 class="ms-4"><span class="fw-bold d-block">Misión de la empresa:</span> {{$empresa->mision}}</h3>
                    <h3 class="ms-4"><span class="fw-bold d-block">Visión de la empresa:</span> {{$empresa->vision}}</h3>
                </div>
                <img src="/img/logoDefault.png" alt="" class="my-auto logoEmpresa">
            </div>
        </div>






        <article class="mt-5 bg-secondary bg-opacity-25 p-2 d-flex justify-content-between rounded-3">
            <div class="col-6">
                @if (count($servicios))
                <div class="tab d-flex justify-content-between">
                        <h3 class="ms-4"><span class="fw-bold">Servicios:</span></h3>
                        <div class="buttons">
                            @foreach ($servicios as $servicio)
                                <button class="tablinks" onclick="openCity(event, '{{$servicio->nombreServicio}}')">{{$servicio->nombreServicio}}</button>
                            @endforeach
                        </div>
                    </div>
                    @foreach ($servicios as $servicio)
                        <div id="{{$servicio->nombreServicio}}" class="tabcontent">
                            <h3>{{$servicio->nombreServicio}}</h3>
                            <p>{{$servicio->descripcion}}</p>
                        </div>
                    @endforeach
                @else
                    <h3 class="ms-4"><span class="fw-bold">Servicios:</span></h3>
                    <h5 class="ms-4">No hay servicios registrados</h5>
                @endif
            </div>
            <div class="col-6">
                <h3 class="ms-2"><span class="fw-bold">Datos requeridos:</span></h3>
                @php
                    $datos = ['Datos personales', 'Datos fiscales', 'Datos de domicilio', 'Datos bancarios'];
                    shuffle($datos);
                    $i = rand(0,3);
                    for (; $i < count($datos); $i++) {
                        echo('<h4 class="ms-4">'.$datos[$i].'</h4>');
                        echo('<h5 class="ms-5"> campos necesarios </h5>');
                    }
                @endphp
            </div>
        </article>

    </section>
</main>
@endsection
@section('scripts')
    <script src="/js/principal.js"></script>
@endsection
