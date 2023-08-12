@extends('plantillas.plantillaMain')
@section('titulo')
    Perfil
@endsection
@section('cuerpo')
    <header class="clearfix border border-3 p-2">
        <x-menu></x-menu>
    </header>
    <div class="d-flex content-justify-center">
        <main class="col-12">
            <div class="col-10 mt-3 mx-auto d-flex justify-content-between">
                <h3 class="col-auto mt-0 mx-1 fw-bold">Datos personales</h3>
                <label class="container col-auto mx-4">Activar
                    <input type="checkbox" id="cbMostrarContra">
                    <span class="checkmark mt-1"></span>
                </label>
            </div>
            <div class="col-10 mx-auto bg-secondary bg-opacity-25 p-2">
                <h3 class="ms-4"><span class="fw-bold">Nombre:</span> {{session('usuario')->nombres}}</h3>
                <h3 class="ms-4"><span class="fw-bold">Apellidos:</span> {{session('usuario')->apellidos}}</h3>
                <h3 class="ms-4"><span class="fw-bold">Telefono:</span> {{session('usuario')->telefono}}</h3>
                <h3 class="ms-4"><span class="fw-bold">Correo:</span> {{session('usuario')->correo}}</h3>
                <h3 class="ms-4"><span class="fw-bold">Fecha de nacimiento:</span> {{session('usuario')->cumpleanios}}</h3>
            </div>

            @isset($empresa)
                <h3 class="col-10 mx-auto mt-3 fw-bold">Datos de la empresa</h3>
                <div class="col-10 mx-auto bg-secondary bg-opacity-25 p-2">
                    <article class="">
                        <h3 class="ms-4"><span class="fw-bold">Razon social:</span> {{$empresa->razonSocial}}</h3>
                        <h3 class="ms-4"><span class="fw-bold">Correo empresa:</span> {{$empresa->correoEmpresa}}</h3>
                        <h3 class="ms-4"><span class="fw-bold">Telefono empresa:</span> {{$empresa->telefonoEmpresa}}</h3>
                        <h3 class="ms-4"><span class="fw-bold">Pagina web:</span> {{$empresa->paginaWeb}}</h3>
                    </article>
                </div>
            @endisset
            <div class="col-10 mt-3 mx-auto d-flex justify-content-between">
                <h3 class="col-auto mt-0 mx-1 fw-bold">Datos fiscales</h3>
                <label class="container col-auto mx-4">Activar
                    <input type="checkbox" id="cbMostrarContra">
                    <span class="checkmark mt-1"></span>
                </label>
            </div>
            <div class="col-10 mx-auto bg-secondary bg-opacity-25 p-2">
                <h3 class="ms-4"><span class="fw-bold">RFC:</span> {{session('usuario')->nombres}}</h3>
                <h3 class="ms-4"><span class="fw-bold">Tipo de persona:</span> {{session('usuario')->apellidos}}</h3>
                <h3 class="ms-4"><span class="fw-bold">Domicilio fiscal:</span> {{session('usuario')->telefono}}</h3>
            </div>
            <div class="col-10 mt-3 mx-auto d-flex justify-content-between">
                <h3 class="col-auto mt-0 mx-1 fw-bold">Datos de domicilio</h3>
                <label class="container col-auto mx-4">Activar
                    <input type="checkbox" id="cbMostrarContra">
                    <span class="checkmark mt-1"></span>
                </label>
            </div>
            <div class="col-10 mx-auto bg-secondary bg-opacity-25 p-2">
                <h3 class="ms-4"><span class="fw-bold">Calle:</span> {{session('usuario')->nombres}}</h3>
                <h3 class="ms-4"><span class="fw-bold">No de exterior:</span> {{session('usuario')->apellidos}}</h3>
                <h3 class="ms-4"><span class="fw-bold">Colonia:</span> {{session('usuario')->telefono}}</h3>
                <h3 class="ms-4"><span class="fw-bold">Código postal:</span> {{session('usuario')->correo}}</h3>
                <h3 class="ms-4"><span class="fw-bold">Ciudad:</span> {{session('usuario')->cumpleanios}}</h3>
                <h3 class="ms-4"><span class="fw-bold">Estado:</span> {{session('usuario')->cumpleanios}}</h3>
                <h3 class="ms-4"><span class="fw-bold">Referencia:</span> {{session('usuario')->cumpleanios}}</h3>
            </div>
            <div class="col-10 mt-3 mx-auto d-flex justify-content-between">
                <h3 class="col-auto mt-0 mx-1 fw-bold">Datos bancarios</h3>
                <label class="container col-auto mx-4">Activar
                    <input type="checkbox" id="cbMostrarContra">
                    <span class="checkmark mt-1"></span>
                </label>
            </div>
            <div class="col-10 mx-auto bg-secondary bg-opacity-25 p-2 mb-4">
                <h3 class="ms-4"><span class="fw-bold">Número de tarjeta:</span> {{session('usuario')->nombres}}</h3>
                <h3 class="ms-4"><span class="fw-bold">Clabe:</span> {{session('usuario')->apellidos}}</h3>
                <h3 class="ms-4"><span class="fw-bold">Banco:</span> {{session('usuario')->telefono}}</h3>
                <h3 class="ms-4"><span class="fw-bold">Nombre completo registrado al banco:</span> {{session('usuario')->telefono}}</h3>
            </div>
        </main>
        @if (session('usuario')->tipo == "Dueño")
            <aside class="col-2">
                <h3>Tus empresas:</h3>
                <ul class="listaEmpresas">
                    <li>Empresa 1</li>
                    <li>Empresa 2</li>
                    <li>Empresa 3</li>
                    <li>Empresa 4</li>
                </ul>
            </aside>
        @endif
    </div>
    <footer>
    </footer>
@endsection
@section('scripts')
    <script src="/js/principal.js"></script>
@endsection
