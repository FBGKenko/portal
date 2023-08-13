@extends('plantillas.PlantillaSession')
@section('tituloSession', 'Permisos')
@section('cuerpoSession')
    <main>
        @livewire('form-permisos', ['empresasSiguiendo' => $empresasSiguiendo])
    </main>
@endsection
@section('scriptsSession')
    <script src="/js/principal.js"></script>
    <script src="/js/matrizPermisos.js"></script>
@endsection
