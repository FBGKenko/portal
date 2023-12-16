@extends('plantillas.PlantillaSession')
@section('tituloSession', 'Permisos')
@section('cuerpoSession')
    <main>
        @livewire('form-permisos', ['empresasSiguiendo' => $empresasSiguiendo])
    </main>
@endsection
