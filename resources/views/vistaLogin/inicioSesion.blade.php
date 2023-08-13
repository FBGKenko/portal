@extends('plantillas.plantillaMain')
@section('titulo', 'Inicio sesión')
@section('cuerpo')
    <header class="clearfix border border-3 p-3">
        <button id="btnInicio" name="{{route('index')}}" class='btn bg-success bg-gradient text-white
        float-end me-5 fw-bold'>Inicio</button>
    </header>
    <main>
        <article class="d-flex justify-content-center">
            <form action="{{route('login.auth')}}" id="formInicio" method="POST" class="col-4 bg-secondary
                text-center rounded-3 mt-5 p-5 pt-3">
                @csrf
                <h3 class="fw-bold text-white">INICIO DE SESIÓN</h3>
                <input type="text" class="col-9 mb-3" placeholder="Correo" name="txtCorreo" id="txtCorreo"
                    minlength="4" maxlength="50">
                <input type="password" class="col-9 mb-3" placeholder="Contraseña" name="txtContra" id="txtContra"
                    minlength="8" maxlength="20">
                <div class="mx-auto">
                    <label class="container col-6 text-white">Mostrar contraseña
                        <input type="checkbox" id="cbMostrarContra">
                        <span class="checkmark mt-1"></span>
                    </label>
                </div>
                <div class="mt-3">
                    <input type="submit" id="btnIniciar" value="Iniciar sesión" class="col-7 btn btn-success
                        fw-bold border border-dark">
                    <a href="{{route('reg')}}">
                        <input type="button" id="btnRegistrar" value="Registrarse" class="col-7 btn btn-success
                            fw-bold border border-dark mt-2">
                    </a>
                </div>
                <div class="container pt-2">
                    <a id="linkOlvideContra" href="{{route('olvideC')}}" class="text-white text-decoration-none">
                        Olvide contraseña
                    </a>
                </div>
            </form>
        </article>
    </main>
    <footer>
    </footer>
@endsection
@section('scripts')
    <script src="/js/inicioSesion.js"></script>
    <script src="/js/general/btnLogOut.js"></script>
@endsection



<?php
/*
session_start();
if(isset($_SESSION['idUsuario'])){
    header('Location:/Experimentos/Proyecto02-Clientify/vPrincipal.php');
}
require_once('./resources/php/clientifyApi.php');
*/
?>
