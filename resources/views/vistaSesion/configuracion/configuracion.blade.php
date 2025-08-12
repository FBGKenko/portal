@extends('plantillas.PlantillaSession')
@section('tituloSession', 'Configuración')
@section('cuerpoSession')

    <main class="col-10 mx-auto mb-5">
        {{-- MODAL DE CAMBIAR CONTRASEÑA --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form id="formCambiarContrasenia" action="" method="post">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-4 fw-bold" id="exampleModalLabel">FORMULARIO CAMBIAR CONTRASEÑA</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h5>Contraseña nueva:</h5>
                            <input id="nuevaContrasenia" type="password" class="form-control">
                            <h5>Repetir nueva contraseña:</h5>
                            <input id="repetirNuevaContrasenia" type="password" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Cambiar contraseña</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        {{-- CAMBIAR PERMISOS DE DATOS --}}
        <h4 class="fs-3 mb-0 fw-bold">¿Qué empresas tienen accesos a mis datos?</h4>
        <a href="{{route('permisos')}}">
            <button class="btn btn-primary my-3 fw-bold">Cambiar permisos</button>
        </a>
        {{-- ACTIVADOR DE MODAL CAMBIAR CONTRASEÑA --}}
        {{-- <h4 class="fs-3 mb-0 fw-bold">¿Deseas cambiar de contraseña?</h4>
        <button id="cambiarContrasenia" class="btn btn-primary my-3 fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal">Cambiar la contraseña</button> --}}
        {{-- BOTONES DE CREAR UN NEGOCIO --}}
        {{-- <div class="">
            <h4 class="fs-3 fw-bold">¿Tienes negocio y lo quieres registrar?</h4>
            <button class="btn btn-primary my-3 fw-bold">Envianos tu solicitud</button>
            <button class="btn btn-primary my-3 fw-bold">Mis Negocios</button>
        </div> --}}
    </main>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        $('#nuevaContrasenia').strength({
            strengthClass: 'strength',
            strengthMeterClass: 'strength_meter',
            strengthButtonClass: 'button_strength',
            strengthButtonText: 'Show Password',
            strengthButtonTextToggle: 'Hide Password'
        });
    });
    $('#cambiarContrasenia').click(function (e) {
        $('#formCambiarContrasenia')[0].reset();
    });

</script>
@endpush
