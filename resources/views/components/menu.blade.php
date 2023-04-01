<div class="d-flex justify-content-between">
    <div>
        <!-- Menu laretal -->
        <button class="btn bg-primary bg-gradient text-white fs-4" onclick="openLeftMenu()">&#9776;</button>
        <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="leftMenu">
            <button onclick="closeLeftMenu()" class="w3-bar-item w3-button w3-large">&times;</button>
            <a href="{{route('perfil')}}" class="w3-bar-item w3-button">Perfil</a>
                @if(session('usuario')->tipo == "Dueño")
                    <a href="{{route('seguidores')}}" class="w3-bar-item w3-button">Seguidores</a>
                @endif
            <a href="{{route('main')}}" class="w3-bar-item w3-button">Temas de interés</a>
            <a href="{{route('config')}}" class="w3-bar-item w3-button">Configuración</a>
        </div>
    </div>
    <h3 class="mx-auto fw-bold" id="welcome">Bienvenido: {{session('usuario')->nombres}}</h3>
    <button class='btn bg-danger bg-gradient text-white float-end mt-3' id='btnCerrarS' name="{{route('mainLogout')}}"><strong>Cerrar sesión</strong></button>
</div>