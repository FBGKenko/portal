@extends('plantillas.PlantillaSession')
@section('tituloSession', 'Agregar servicio')
@section('cuerpoSession')
    <main class="mb-5">
        <section id="contenedorBuscador" class="col-10 mx-auto pt-3 d-flex justify-content-center">
            <input type="text" name="" id="" class="col-6 me-3">
            <input type="checkbox" name="" id="" class="mx-2">
            <label for="">Buscar por empresa/Servicio</label>
        </section>
        <section id="misServicios" class="col-10 mx-auto">
            <Article>
                <div class="contenedorEmpresaServicio">
                    <h3>Nombre empresa:</h3>
                </div>
                <div class="contenidoServicios">
                    <div class="d-flex justify-content-between">
                        <h4>Servicio:</h4>
                        <h5>Descripción:</h5>
                        <div></div>
                        <button>Ver servicio</button>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h4>Servicio:</h4>
                        <h5>Descripción:</h5>
                        <div></div>
                        <button>Ver servicio</button>
                    </div>
                </div>
            </Article>
        </section>
        <section id="ServiciosDisponibles">

        </section>
   </main>
@endsection
@section('scriptsSession')
    <script src="/js/principal.js"></script>
    <script src="/js/configuracion.js"></script>
    <script>
        $('div.contenedorEmpresServicio').click(function (e) {
            e.preventDefault();
            esconderMostrar($(this).next());
        });
    </script>

@endsection
