@extends('plantillas.plantillaMain')
@section('titulo')
    Inicio
@endsection
@section('cuerpo')
    <header class="clearfix">
        <a href="{{route('login')}}">
            <button class='btn bg-success bg-gradient text-white float-end mt-3 me-5' id='btnAbrirS'><strong>Iniciar sesion</strong></button>
        </a>
        <h2 class="mx-auto mt-5 w-25">Gestos de contactos</h2>
    </header>
<main>

</main>
@endsection
@section('scripts')
    <script src="js\index.js"></script>
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