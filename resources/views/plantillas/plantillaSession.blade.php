@extends('plantillas.plantillaMain')
@section('titulo')
    @yield('tituloSession')
@endsection
@section('cuerpo')
    <header class="clearfix border border-3 p-2">
        <x-menu></x-menu>
    </header>
    @yield('cuerpoSession')
@endsection
@section('scripts')
    <script src="/js/principal.js"></script>
    @yield('scriptsSession')
@endsection
