@extends('plantillas.plantillaMain')
@section('titulo')
    Configuración
@endsection
@section('cuerpo')
    <header class="clearfix border border-3 p-2">
        <x-menu></x-menu>
    </header>
    <main>
        
        <!--
        FORMULARIO CAMBIAR INFORMACION PERSONAL 
        -->
        <form action="{{route('config.infoP')}}" id="formInfoPersonal" method="POST" class="col-6 text-center rounded-3 mt-3 p-5 pt-3 mx-auto">
            @csrf
            <h3 class="fw-bold">Datos personales</h3>
            <div class="d-flex justify-content-center">
                <div>
                    <input type="email" class="col-9 mb-3 fs-5" placeholder="Correo" name="txtCorreo" id="txtCorreo" 
                    minlength="4" maxlength="50">
                    <input type="text" class="col-9 mb-3 fs-5" placeholder="Telefono" name="txtTelefono" id="txtTelefono" 
                    minlength="10" maxlength="15">
                </div>
                <div>
                    <input type="text" class="col-9 mb-3 fs-5" placeholder="Nombres" name="txtNombres" id="txtNombres" 
                    minlength="3" maxlength="50">
                    <input type="text" class="col-9 mb-3 fs-5" placeholder="Apellidos" name="txtApellidos" id="txtApellidos" 
                    minlength="3" maxlength="50">
                </div>
            </div>
            <div class="mt-3">
                <input type="submit" id="btnCambiar" value="Cambiar información" class="col-5 btn btn-primary fw-bold border border-dark">
            </div>
        </form>
        <!-- 
        FORMULARIO CAMBIAR CONTRASEÑA
        -->
        <form action="{{route('config.cC')}}" id="formCC" method="POST" class="col-4 text-center rounded-3 mt-3 p-5 pt-3 mx-auto">
            @csrf
            <h3 class="fw-bold">Cambiar contraseña</h3>
            <input type="password" class="col-9 mb-3 fs-5" placeholder="Contraseña nueva" name="txtContra1" id="txtContra1" 
            minlength="8" maxlength="20">
            <input type="password" class="col-9 mb-3 fs-5" placeholder="Repetir contraseña nueva" name="txtContra2" id="txtContra2"
            minlength="8" maxlength="20">
            <div class="mx-auto">
                <label class="container col-6">Mostrar contraseña
                    <input type="checkbox" id="cbMostrarContra">
                    <span class="checkmark mt-1"></span>
                </label>
            </div>
            <div class="mt-3">
                <input type="submit" id="btnCC" value="Cambiar contraseña" class="col-5 btn btn-primary fw-bold border border-dark">
            </div>
        </form>
        <!-- 
        BOTON PARA CAMBIAR AVISO DE PRIVACIDAD
        -->
        <form action="{{route('config.privacidad')}}" class="mt-5 mx-auto col-5" method="GET" id="formCPrivacidad" name="formCPrivacidad">
            <h3 class="fw-bold text-center">Aviso de privacidad</h3>
            <label class="container col-7">Que las empresas tengan acceso a mis datos personales
                @if ($config->datosPrivados == "N")
                    <input name="cbPrivacidad" type="checkbox" id="cbPrivacidad" checked>                        
                @else
                    <input name="cbPrivacidad" type="checkbox" id="cbPrivacidad">
                @endif
                <span class="checkmark mt-2"></span>
            </label>
        </form>
        
        
        <!--
        CAMBIAR CMODO OSCURO
            <article class="mt-5 mx-auto col-5">
                <h3 class="fw-bold text-center">Modo oscuro</h3>
                <label class="container col-7">Activar modo oscuro
                    <input type="checkbox" id="cbModoOscuro">
                    <span class="checkmark mt-2"></span>
                </label>
            </article>
        -->
   </main>
@endsection
@section('scripts')
    <script src="js\principal.js"></script>
    <script src="js\configuracion.js"></script>
    <script>
        function openLeftMenu() {
        document.getElementById("leftMenu").style.display = "block";
        }

        function closeLeftMenu() {
        document.getElementById("leftMenu").style.display = "none";
        }
    </script>
@endsection
