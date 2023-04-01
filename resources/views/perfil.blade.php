@extends('plantillas.plantillaMain')
@section('titulo')
    Perfil
@endsection
@section('cuerpo')
    <header class="clearfix border p-2">
        <x-menu></x-menu>
    </header>
    <main class="col-7 mt-5 mx-auto bg-secondary bg-opacity-25 p-2">
        <h3 class="ms-4"><span class="fw-bold">Nombre:</span> {{session('usuario')->nombres}}</h3>
        <h3 class="ms-4"><span class="fw-bold">Apellidos:</span> {{session('usuario')->apellidos}}</h3>
        <h3 class="ms-4"><span class="fw-bold">Telefono:</span> {{session('usuario')->telefono}}</h3>
        <h3 class="ms-4"><span class="fw-bold">Correo:</span> {{session('usuario')->correo}}</h3>
        <h3 class="ms-4"><span class="fw-bold">Fecha de nacimiento:</span> {{session('usuario')->cumpleanios}}</h3>
        @isset($empresa)
            <article class="mt-5">
                <h3 class="text-center"><span class="fw-bold">Empresa</span></h3>
                <h3 class="ms-4"><span class="fw-bold">Razon social:</span> {{$empresa->razonSocial}}</h3>
                <h3 class="ms-4"><span class="fw-bold">Correo empresa:</span> {{$empresa->correoEmpresa}}</h3>
                <h3 class="ms-4"><span class="fw-bold">Telefono empresa:</span> {{$empresa->telefonoEmpresa}}</h3>
                <h3 class="ms-4"><span class="fw-bold">Pagina web:</span> {{$empresa->paginaWeb}}</h3>
            </article>
        @endisset
    </main>
    <footer>
    </footer>
@endsection
@section('scripts')
    <script src="js\principal.js"></script>
    <script>
        function openLeftMenu() {
        document.getElementById("leftMenu").style.display = "block";
        }

        function closeLeftMenu() {
        document.getElementById("leftMenu").style.display = "none";
        }
    </script>
@endsection