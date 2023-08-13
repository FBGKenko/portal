@extends('plantillas.PlantillaSession')
@section('tituloSession', 'Agregar servicio')
@section('cuerpoSession')
    <main class="mb-5">
        <section id="contenedorBuscador" class="col-10 mx-auto pt-3 d-flex justify-content-center">
            <input type="text" name="" id="" class="col-6 me-3">
            <input type="checkbox" name="" id="" class="mx-2">
            <label for="">Buscar por empresa/Servicio</label>
        </section>
        <section id="misServicios" class="col-8 mx-auto my-5">
            <h2 class="mb-0 fw-bold">Mis servicios</h2>
            <Article>
                <div class="contenedorEmpresaServicio">
                    <h3>Nombre empresa:</h3>
                </div>
                <div class="contenidoServicios">
                    <div class="d-flex justify-content-between">
                        <div class="col-7">
                            <h4 class="mt-0 fw-bold">Servicio:</h4>
                            <h5 class="ms-5">Descripción:</h5>
                            <div class="ms-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                deserunt mollit anim id est laborum.</div>
                        </div>
                        <button class="btn btn-primary align-self-start">Ver servicio</button>
                    </div>
                </div>
            </Article>
        </section>
        <section id="ServiciosDisponibles" class="col-8 mx-auto my-5">
            <h2 class="mb-0 fw-bold">Servicios disponibles</h2>
            <Article>
                <div class="contenedorEmpresaServicio">
                    <h3>Nombre empresa:</h3>
                </div>
                <div class="contenidoServicios">
                    <div class="d-flex justify-content-between">
                        <div class="col-7">
                            <h4 class="mt-0 fw-bold">Servicio:</h4>
                            <h5 class="ms-5">Descripción:</h5>
                            <div class="ms-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                deserunt mollit anim id est laborum.</div>
                        </div>
                        <button class="btn btn-danger align-self-start">Administrar permisos</button>
                    </div>
                </div>
            </Article>
        </section>
   </main>
@endsection
@section('scriptsSession')
    <script src="/js/principal.js"></script>
    <script src="/js/configuracion.js"></script>
    <script>
        function bindear(){
            /*
                Caso 1: todas cerradas, clic en una
                Caso 2: una abierta, clic en la misma
                caso 3: una abierta, clic en otra
            */
            $(this).next().slideToggle('slow', 'swing');
        }

        $('div.contenedorEmpresaServicio').click(bindear);
    </script>

@endsection
