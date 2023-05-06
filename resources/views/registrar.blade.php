@extends('plantillas.plantillaMain')
@section('titulo')
    Registrar usuario
@endsection
@section('cuerpo')
    <header class="clearfix border border-3 p-3">
        <button id="btnInicio" name="{{route('index')}}" class='btn bg-success bg-gradient text-white float-end me-5 fw-bold'>Inicio</button>
        <button id="btnLogIn" name="{{route('login')}}" class='btn bg-success bg-gradient text-white float-end me-5 fw-bold'>Iniciar sesión</button>
    </header>
    <main>
        <article class="d-flex justify-content-center">
            <form class="col-4 bg-secondary text-center rounded-3 mt-5 p-5 pt-3" id="formRegistrar" method="POST" action="{{route('reg.proceso')}}" name="1">
                @csrf
                <h3 class="fw-bold text-light">REGISTRARSE</h3>
                <p class="text-center text-light fw-bold">Llene los campos para crear una cuenta.</p>
                <div id="seccion1">
                    <label for="Nombres" class="d-block text-white fw-bold col-4">Nombres:</label>
                    <input class="col-9 mb-3" id="txtNombres" name="txtNombres" placeholder="Nombres" type="text" maxlength="50">
    
                    <label for="Apellidos" class="d-block text-white fw-bold col-4">Apellidos:</label>
                    <input class="col-9 mb-3" id="txtApellidos" name="txtApellidos" placeholder="Apellidos" type="text" maxlength="50">
    
                    <label for="correo" class="d-block text-white fw-bold col-4">Correo:</label>
                    <input class="col-9 mb-3" id="txtCorreo" name="txtCorreo" placeholder="Correo" type="text" maxlength="100">
    
                    <label for="telefono" class="d-block text-white fw-bold col-4">Telefono:</label>
                    <input class="col-9 mb-3" id="txtTelefono" name="txtTelefono" placeholder="Telefono" type="text" maxlength="20">
    
                    <label for="Cumpleaños" class="d-block text-white fw-bold col-4">Cumpleaños:</label>
                    <input class="col-9 mb-3" type="date" name="cumpleanios" id="cumpleanios" min="1950-01-01" max="2004-12-31">
                    
    
                    <label for="Tipo" class="d-block text-white fw-bold col-4">Tipo:</label>
                    <select class="col-9 mb-3" name="sTipo" id="sTipo">
                        <option value="0">Seleccione un tipo</option>
                        <option value="Cliente">Cliente</option>
                        <option value="Dueño">Dueño</option>
                    </select>
    
    
                </div>
                <div id="seccion2" class="visually-hidden">
                    <label for="Razon social" class="d-block text-white fw-bold col-4">Razon social:</label>
                    <input class="col-9 mb-3" id="txtRazonSocial" name="txtRazonSocial" placeholder="Razon social" type="text" maxlength="70">
    
                    <label for="Correo empresa" class="d-block text-white fw-bold col-4">Correo empresa:</label>
                    <input class="col-9 mb-3" id="txtCorreoEmpresa" name="txtCorreoEmpresa" placeholder="Correo empresa" type="text" maxlength="100">
    
                    <label for="Telefono empresa" class="d-block text-white fw-bold col-4">Telefono empresa:</label>
                    <input class="col-9 mb-3" id="txtTelefonoEmpresa" name="txtTelefonoEmpresa" placeholder="Telefono empresa" type="text" maxlength="20">
    
                    <label for="Pagina web" class="d-block text-white fw-bold col-4">Pagina web:</label>
                    <input class="col-9 mb-3" id="txtPaginaWeb" name="txtPaginaWeb" placeholder="Pagina web" type="text" maxlength="140">
                </div>

                <div id="seccion3" class="visually-hidden">
                    <label for="Contraseña" class="d-block text-white fw-bold col-4">contraseña:</label>
                    <input class="col-9 mb-3" id="txtClave" name="txtClave" placeholder="contraseña" type="password" minlength="8" maxlength="20">
    
                    <label for="Contraseña2" class="d-block text-white fw-bold col-5">Repetir contraseña:</label>
                    <input class="col-9 mb-3" id="txtClave2" name="txtClave2" placeholder="Repetir contraseña" type="password" minlength="8" maxlength="20">
                    <div class="mx-auto">
                        <label class="container col-6">Mostrar contraseña
                            <input type="checkbox" id="cbMostrarContra">
                            <span class="checkmark mt-1"></span>
                        </label>
                    </div>
                </div>





                <div class="mt-3">
                    <div id="btnsFinalizar" class="d-flex justify-content-around visually-hidden">
                        <input class="col-4 btn btn-success fw-bold border border-dark" type="button" id="btnAnterior2" value="Anterior">
                        <input class="col-4 btn btn-success fw-bold border border-dark" type="submit" id="btnRegistrarse" value="Confirmar">
                    </div>
                    <div id="btnsProcesando" class="d-flex justify-content-around">
                        <input class="col-4 btn btn-success fw-bold border border-dark" type="button" id="btnAnterior" value="Anterior" disabled>
                        <input class="col-4 btn btn-success fw-bold border border-dark" type="button" id="btnSiguiente" value="Siguiente">
                    </div>
                </div>
            </form>
        </article>
    </main>
    <footer>
    </footer>
@endsection
@section('scripts')
    <script src="/js/registrar.js"></script>
    <script src="/js/general/btnLogOut.js"></script>
@endsection