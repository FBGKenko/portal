@extends('plantillas.PlantillaSession')
@section('tituloSession', 'Agregar servicio')
@section('cuerpoSession')
    <main class="mb-5">
        <form action="">
            <h4>Nombre servicio</h4>
            <input type="text">
            <h4>Descripción servicio</h4>
            <textarea name="" id="" cols="30" rows="10"></textarea>
            <h4>Datos necesarios</h4>
            <section>
                <input type="checkbox" name="" id=""><h5>Servicio</h5>
            </section>
        </form>
   </main>
@endsection
@section('scriptsSession')
    <script src="/js/principal.js"></script>
    <script src="/js/configuracion.js"></script>
@endsection
