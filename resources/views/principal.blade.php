@extends('plantillas.plantillaMain')
@section('titulo')
    Principal
@endsection
@section('cuerpo')
<header class="clearfix border border-3 p-2">
    <x-menu></x-menu>
</header>
<main>
    
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

