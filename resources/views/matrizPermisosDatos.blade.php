@extends('plantillas.plantillaMain')
@section('titulo')
    Permisos
@endsection
@section('cuerpo')
<header class="clearfix border border-3 p-2">
    <x-menu></x-menu>
</header>
<main>
    <div class="col-9 mx-auto mt-3 d-flex">
        <span class="fs-4">Permitir a la empresa: </span>
        <select class="form-select w-25 form-select-lg mb-3 mx-3" aria-label=".form-select-lg example">
            <option selected>Selecciona una empresa</option>
            @foreach ($empresasSiguiendo as $e)
                <option value="{{$e->id}}">{{$e->razonSocial}}</option>
            @endforeach
          </select>
        <span class="fs-4"> los siguientes datos</span>
    </div>
    <form action="" class="p-4 m-2 border col-9 mx-auto">
        <Span class="fs-4">Compartir</Span>
        
        <div class="d-flex justify-content-center">
            <label class="container col-auto mx-1">Datos personales
                <input type="checkbox" id="cbMostrarContra">
                <span class="checkmark mt-1"></span>
            </label>
            <label class="container col-auto mx-1">Datos fiscales
                <input type="checkbox" id="cbMostrarContra">
                <span class="checkmark mt-1"></span>
            </label>
            <label class="container col-auto mx-1">Datos de domicilio
                <input type="checkbox" id="cbMostrarContra">
                <span class="checkmark mt-1"></span>
            </label>
            <label class="container col-auto mx-1">Datos bancarios
                <input type="checkbox" id="cbMostrarContra">
                <span class="checkmark mt-1"></span>
            </label>
        </div>
        <div class="text-center mt-5">
            <input type="button" class="col-auto btn btn-primary fw-bold border border-dark" value="Cambiar permisos">
        </div>
    </form>
</main>
@endsection
@section('scripts')
    <script src="/js/principal.js"></script>
        <script>
            function openLeftMenu() {
                document.getElementById("leftMenu").style.display = "block";
            }

            function closeLeftMenu() {
                document.getElementById("leftMenu").style.display = "none";
            }
    </script>
@endsection
