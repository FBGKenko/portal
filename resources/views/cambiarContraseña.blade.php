@extends('plantillas.plantillaMain')
@section('titulo')
    Cambiar contraseña
@endsection
@section('cuerpo')
    <header class="clearfix border border-3 p-3">
        <button id="btnInicio" name="{{route('index')}}" class='btn bg-success bg-gradient text-white float-end me-5 fw-bold'>Inicio</button>
        <button id="btnLogIn" name="{{route('login')}}" class='btn bg-success bg-gradient text-white float-end me-5 fw-bold'>Iniciar sesión</button>
    </header>
    <main>
        <article class="d-flex justify-content-center">
            <form class="col-4 bg-secondary text-center rounded-3 mt-5 p-5 pt-3" id="formCC" action="{{route('CCC', $token->token)}}" method="POST">
                @csrf
                <h3 class="fw-bold text-white">CAMBIAR CONTRASEÑA</h3>
                <input class="col-9 mb-3" id="txtContra1" name="txtContra1" placeholder="Nueva contraseña" minlength="8" maxlength="20" type="password">
                <input class="col-9 mb-3" id="txtContra2" name="txtContra2" placeholder="Repetir contraseña" minlength="8" maxlength="20" type="password">
                <div class="mx-auto">
                    <label class="container col-6 text-white">Mostrar contraseña
                        <input type="checkbox" id="cbMostrarContra">
                        <span class="checkmark mt-1"></span>
                    </label>
                </div>
                <div class="mt-3">
                    <input class="col-7 btn btn-success fw-bold border border-dark" type="submit" id="btnCC" name="{{route('login')}}" value="Confirmar">
                </div>
            </form>
        </article>
    </main>
    <footer>
    </footer>
@endsection
@section('scripts')
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/cambiarContra.js"></script>
    <script src="/js/general/btnLogOut.js"></script>
@endsection