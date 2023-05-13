@extends('plantillas.plantillaMain')
@section('titulo')
    Permisos
@endsection
@section('cuerpo')
<header class="clearfix border border-3 p-2">
    <x-menu></x-menu>
</header>
<main>
    <form action="{{route('permisos.change')}}" class="" method="post" id="formPermisos">
        <div class="col-9 mx-auto mt-3 d-flex">
            <span class="fs-4">Permitir a la empresa: </span>
            <select class="form-select w-25 form-select-lg mb-3 mx-3" aria-label=".form-select-lg example" name="empresaSelect">
                <option selected>Selecciona una empresa</option>
                @foreach ($empresasSiguiendo as $e)
                    <option value="{{$e->id}}">{{$e->razonSocial}}</option>
                @endforeach
              </select>
            <span class="fs-4"> los siguientes datos</span>
        </div>
        <div class="border p-4 m-2 col-9 mx-auto">
            @csrf
            <Span class="fs-4">Compartir</Span>
            <div class="d-flex justify-content-center">
                <label class="container col-auto mx-1">Datos personales
                    <input type="checkbox" id="cbDatosPersonal" name="cbDPersonal">
                    <span class="checkmark mt-1"></span>
                </label>
                <label class="container col-auto mx-1">Datos fiscales
                    <input type="checkbox" id="cbDatosFiscal" name="cbDFiscal">
                    <span class="checkmark mt-1"></span>
                </label>
                <label class="container col-auto mx-1">Datos de domicilio
                    <input type="checkbox" id="cbDatosDomicilio" name="cbDDomicilio">
                    <span class="checkmark mt-1"></span>
                </label>
                <label class="container col-auto mx-1">Datos bancarios
                    <input type="checkbox" id="cbDatosBancario" name="cbDBancario">
                    <span class="checkmark mt-1"></span>
                </label>
            </div>
            <div class="text-center mt-5">
                <input type="submit" class="col-auto btn btn-primary fw-bold border border-dark" id="btnPermisos" value="Cambiar permisos">
            </div>
        </div>
    </form>
</main>
@endsection
@section('scripts')
    <script src="/js/principal.js"></script>
    <script src="/js/matrizPermisos.js"></script>
        <script>
            function openLeftMenu() {
                document.getElementById("leftMenu").style.display = "block";
            }

            function closeLeftMenu() {
                document.getElementById("leftMenu").style.display = "none";
            }
    </script>
@endsection
