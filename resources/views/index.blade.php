@extends('plantillas.plantillaMain')
@section('titulo')
    Inicio
@endsection
@section('cuerpo')
    <header class="clearfix border border-3 p-3 d-flex justify-content-around">
        <h2 class="text-center mx-auto mt-0 w-25">Gestor de afiliados
        </h2>
        <a href="{{route('login')}}">
            <button class='btn bg-success bg-gradient text-white me-5' id='btnAbrirS'><strong>Iniciar sesion</strong></button>
        </a>
    </header>
<main>

</main>
@endsection
@section('scripts')
    <script src="/js/index.js"></script>
@endsection