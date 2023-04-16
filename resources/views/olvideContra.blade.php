@extends('plantillas.plantillaMain')
@section('titulo')
    Olvide contraseña
@endsection
@section('cuerpo')
    <header class="clearfix border border-3 p-3">
        <button id="btnInicio" name="{{route('index')}}" class='btn bg-success bg-gradient text-white float-end me-5 fw-bold'>Inicio</button>
        <button id="btnLogIn" name="{{route('login')}}" class='btn bg-success bg-gradient text-white float-end me-5 fw-bold'>Iniciar sesión</button>
    </header>
    <main>
        <article class="d-flex justify-content-center">
            <form class="col-4 bg-secondary text-center rounded-3 mt-5 p-5 pt-3" id="formOlvide" method="POST">
                <h3 class="fw-bold">OLVIDE MI CONTRASEÑA</h3>
                <p class="text-center text-light">Le enviaremos un correo para restaurar su contraseña, ingrese su correo.</p>
                <input class="col-9 mb-3" id="txtCorreo" name="txtCorreo" placeholder="Correo" type="text">
                <div class="mt-3">
                    <input class="col-7 btn btn-success fw-bold border border-dark" type="submit" id="btnOlvide" value="Confirmar">
                </div>
            </form>
        </article>
    </main>
    <footer>
    </footer>
@endsection
@section('scripts')
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="js\olvideContra.js"></script>
    <script src="js\general\btnLogOut.js"></script>
@endsection