@extends('plantillas.plantillaMain')
@section('titulo')
    
@endsection
@section('cuerpo')
   
@endsection
@section('scripts')

@endsection


<?php
session_start();

require_once('./resources/php/clientifyApi.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="resources/css/miEstilo.css">
    <title>Cliente</title>
</head>
<body>
<article class="col-5 bg-success bg-opacity-50 mx-auto mt-5 p-3">
    <?php
        require_once('resources/php/clientifyApi.php');
        $id = $_GET['id'];
        $api = new clientifyApi('contacts/'.$id.'/', 'd0b93d57f44241ba962888a24334ee41a0ac9d5b');
        $arre = $api->llamandoApiTokenGet();
        echo("Nombre: ");        
        echo("<br>");
        echo("<h3>Nombre completo: ");
        echo($arre->first_name . " " . $arre->last_name."</h3>");
        echo("<br>");

        echo("<strong>Estatus: </strong>");
        echo($arre->status);
        echo("<br>");

        echo("<strong>Tipo: </strong>");
        echo($arre->contact_type);
        echo("<br>");

        echo("<strong>Origen: </strong>");
        echo($arre->contact_source);
        echo("<br>");

        echo("<strong>Compañia: </strong>");
        echo($arre->company);
        echo("<br>");

        echo("<strong>Etiquetas: </strong>");
        for ($i=0; $i < count($arre->tags); $i++) { 
            echo($arre->tags[$i]);
            if($i < count($arre->tags) - 1){
                echo(", ");
            }
        }
        echo("<br>");

        echo("<strong>correos electronicos: </strong>");
        for ($i=0; $i < count($arre->emails); $i++) { 
            //echo($arre->emails[$i]->type . ", ");//type, email
            echo($arre->emails[$i]->email);//type, email
            if($i < count($arre->emails) - 1){
                echo(", ");
            }
        }
        echo("<br>");

        echo("<strong>telefonos: </strong>");
        for ($i=0; $i < count($arre->phones); $i++) { 
            //echo($arre->phones[$i]->type . ", ");//type, phone
            echo($arre->phones[$i]->phone);//type, phone
            if($i < count($arre->phones)){
                echo(", ");
            }
        }
        echo("<br>");

        echo("<strong>Dirección: </strong>");
        for ($i=0; $i < count($arre->addresses); $i++) { 
            echo($arre->addresses[$i]->street . ', ');//street, city, state, country, postal_code
            echo($arre->addresses[$i]->city  . ', ');//street, city, state, country, postal_code
            echo($arre->addresses[$i]->state  . ', ');//street, city, state, country, postal_code
            echo($arre->addresses[$i]->country  . ', ');//street, city, state, country, postal_code
            echo($arre->addresses[$i]->postal_code  . ', ');//street, city, state, country, postal_code
            if($i < count($arre->addresses) - 1){
                echo(", "); 
            }
        }
        echo("<br>");

        echo("<strong>Creado: </strong>");
        echo($arre->created);
        echo("<br>");

        echo("<strong>Ultimo contacto: </strong>");
        echo($arre->last_contact);
        echo("<br>");
    ?>
</article>
</body>
</html>