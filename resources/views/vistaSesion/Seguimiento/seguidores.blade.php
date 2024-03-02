@extends('plantillas.PlantillaSession')
@section('tituloSession', 'Seguidores')
@section('cuerpoSession')
    <main class="col-10 mx-auto">
        {{-- HEADER PERFIL EMPRESA --}}
        <section class="mx-auto bg-danger contenedorNegocioHeader d-flex justify-content-between position-relative portadaNegocio">
            <img id="portadaNegocio" src="{{$urlEmpresa}}" alt="">
            {{-- LOGO NEGOCIO --}}
            <article class="border border-dark border-2 rounded position-relative logoNegocio">
                <img id="logoNegocio" src="{{$urlLogo}}" alt="">
                <form action="{{route('seguidores.actualizarImagen', [$empresa->id, 'logo'])}}" method="post" enctype="multipart/form-data" class="formulariosImagenes">}
                    @csrf
                    <input type="file" name="imagenSubidaPerfil" id="imagenSubidaPerfil" class="d-none">
                    <button type="button" class="btn btn-primary p-2 position-absolute editarPerfil"><img class="btnEditar" src="/img/editar.png" alt=""></button>
                    <button type="submit" class="btn btn-primary p-2 position-absolute editarPerfil2"><img class="btnEditar" src="/img/upload.png" alt=""></button>
                </form>
            </article>
            {{-- BOTON DE SEGUIR PAGINA --}}
            <form action="{{route('seguidores.actualizarImagen', [$empresa->id, 'portada'])}}" method="post" enctype="multipart/form-data" class="formulariosImagenes">}
                @csrf
                <input type="file" name="imagenSubidaFondo" id="imagenSubidaFondo" class="d-none">
                <button type="button" class="btn btn-primary p-2 position-absolute editarFondo"><img class="btnEditar" src="/img/editar.png" alt=""></button>
                <button type="submit" class="btn btn-primary p-2 position-absolute editarFondo2"><img class="btnEditar" src="/img/upload.png" alt=""></button>
            </form>
            <div class="nombreEmpresas">
                <div class="bg-white p-4 border border-dark border-2 rounded rounded-3">
                    <h3 class="fw-bold">Nombre Empresa: {{$empresa->razonSocial}}</h3>
                    <h4>Total seguidores: {{$numeroSeguidores + $numeroClientes}}</h4>
                </div>
            </div>
        </section>
        {{-- CONTENEDOR DE CATEGORIA DE CLIENTES --}}
        <div class="d-flex empresasSuscripto">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a id="btnTodos" class="nav-link active" aria-current="page" href="#">
                        <h4 class="fw-bold mx-2">Todos ({{$numeroSeguidores + $numeroClientes}})</h4>
                    </a>
                </li>
                <li class="nav-item">
                    <a id="btnClientes" class="nav-link" href="#">
                        <h4 class="fw-bold mx-2">Clientes ({{$numeroClientes}})</h4>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a id="btnVisibles" class="nav-link" href="#">
                        <h4 class="fw-bold mx-2">Seguidores Visibles (2)</h4>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a id="btnAnonimos" class="nav-link" href="#">
                        <h4 class="fw-bold mx-2">Seguidores anónimos ({{$numeroSeguidores}})</h4>
                    </a>
                </li>
            </ul>
        </div>
        {{-- TABLA DE MIS SEGUIDORES --}}
        <table id="misClientes" class="w-100 bg-primary bg-opacity-50 mx-auto mt-3 border border-dark border-2 rounded rounded-3">
            <thead>
                <tr class="bg-primary bg-opacity-75">
                    <th class="py-3 text-center">Nombre completo</th>
                    <th class="py-3 text-center">Correo</th>
                    <th class="py-3 text-center">Tipo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr class="border-bottom">
                        <td class="py-4 text-center fw-bold">{{$cliente->nombres}} {{$cliente->apellidos}}</td>
                        <td class="py-4 text-center fw-bold">{{$cliente->correo}}</td>
                        <td class="py-4 text-center fw-bold">Cliente</td>
                    </tr>
                @endforeach
                @foreach ($seguidores as $seguidor)
                    <tr class="border-bottom">
                        <td class="py-4 text-center fw-bold">{{$seguidor->usuario->nombres}} {{$seguidor->usuario->apellidos}}</td>
                        <td class="py-4 text-center fw-bold">{{$seguidor->usuario->correo}}</td>
                        <td class="py-4 text-center fw-bold">Anonimo</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection

@push('scripts')
    <script>
        var tabla;
        var tipoSeguidor = "TODOS";
        //INICIALIZAR DATATABLA
        $(document).ready(function () {
            tabla = $('#misClientes').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/2.0.1/i18n/es-ES.json',
                },
                initComplete: function () {
                    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
                        var tipoRegistro = data[2].toUpperCase();
                        if(tipoSeguidor == "TODOS"){
                            return true;
                        }
                        if(tipoSeguidor == tipoRegistro){
                            return true;
                        }
                        else{
                            return false;
                        }
                    });
                },
                "ordering": false,
                "lengthChange": false,
                "pageLength": 5,
                "dom":"lrtip"
            });
            tabla.draw();
        });
        $('#btnTodos').click(function (e) {
            $('.nav-link').removeClass('active');
            $(this).addClass('active');
            tipoSeguidor = "TODOS";
            tabla.draw();
        });
        $('#btnClientes').click(function (e) {
            $('.nav-link').removeClass('active');
            $(this).addClass('active');
            tipoSeguidor = "CLIENTE";
            tabla.draw();
        });
        $('#btnVisibles').click(function (e) {
            $('.nav-link').removeClass('active');
            $(this).addClass('active');
            tipoSeguidor = "VISIBLE";
            tabla.draw();
        });
        $('#btnAnonimos').click(function (e) {
            $('.nav-link').removeClass('active');
            $(this).addClass('active');
            tipoSeguidor = "ANONIMO";
            tabla.draw();
        });

        $('.editarPerfil').click(function (e) {
            $('#imagenSubidaPerfil').click();
        });
        $('#imagenSubidaPerfil').change(function (e) {
            var file = this.files[0];
            if(file){
                var reader = new FileReader();

                reader.onload = function(e){
                    $('#logoNegocio').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(file);
            }
        });
        $('.editarFondo').click(function (e) {
            $('#imagenSubidaFondo').click();
        });
        $('#imagenSubidaFondo').change(function (e) {
            var file = this.files[0];
            if(file){
                var reader = new FileReader();

                reader.onload = function(e){
                    $('#portadaNegocio').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(file);
            }
        });
        $('.formulariosImagenes').submit(function (e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: $(this).attr('action'),
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response){
                    // Manejar la respuesta del servidor aquí
                    console.log(response);
                    swal( "Éxito", "Se ha actualizado la imagen", "success");
                },
                error: function(xhr, status, error){
                    // Manejar errores aquí
                    console.log(error);
                    swal( "Error", "500", "error");
                }
            });
        });
    </script>
@endpush
