<div class="d-flex justify-content-between">
    <div>
        <!-- Menu laretal -->
        <button class="btn bg-primary bg-gradient text-white fs-4" onclick="openLeftMenu()">&#9776;</button>
        <div class="menuLateral" id="leftMenu">
            <button onclick="closeLeftMenu()" class="d-block py-2 ps-3">&times;</button>
            <a href="{{route('main')}}" class="d-block py-2 ps-3">Inicio</a>
            <a href="{{route('perfil')}}" class="d-block py-2 ps-3">Perfil</a>
            @if(session('usuario')->tipo == "Dueño")
                <a href="{{route('seguidores')}}" class="d-block py-2 ps-3">Mi Comunidad</a>
            @endif
            <a href="{{route('seguimiento')}}" class="d-block py-2 ps-3">Negocios</a>
            <a href="{{route('config')}}" class="d-block py-2 ps-3">Configuración</a>
            <a href="{{route('serviciosCliente')}}" class="d-block py-2 ps-3">Mis Servicios</a>

        </div>
    </div>
    <h3 class="mx-auto fw-bold" id="welcome">Bienvenido: {{session('usuario')->nombres}}</h3>
    <button class='btn bg-danger bg-gradient text-white float-end mt-3' id='btnCerrarS' name="{{route('mainLogout')}}">
        <strong>Cerrar sesión</strong>
    </button>
</div>
