<?php

require_once 'login.php';
require_once 'cabecera.php';
$BD = 'basededatos.csv';
$actual = file_get_contents($BD);

//verifico si si quiere deslogar
if(isset($_POST['cabecera'])){
    logout();
}

$principal="<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Document</title>
    </head>
    <body>
        <form action='index.php' method='POST' name='registro'>
            <fieldset name='formulario'>
                <label for='usuario'>Usuario</label>
                <input type='text' id='user' name='user'><br>
                <label for='contraseña'>Contraseña</label>
                <input type='text' id='pass' name='pass'><br>
            </fieldset>
            <button type='submit' id='enviar' value='enviar'>Enviar</button>
        </form>
    </body>
    </html>";



$origin = $_SERVER['REQUEST_URI'];
if(isset($_SESSION['user']) && $_SESSION['user']!=""){
    header('Location: tienda.php');
}else{

if ($origin=="/servidor%20proyectos/tienda/index.php" && !isset($_POST['user']) && !isset($_POST['pass'])){
    echo pintaCabecera();
    echo $principal;
}elseif((isset($_POST['user']) && isset($_POST['pass'])) && ($_POST['user']!="" && $_POST['pass']!="")){
    $array = explode("\n", $actual);
    $datos=[];
        foreach($array as $persona){
            $partes=explode(",",trim($persona));// tengo que hacer un trim ya que de alguna forma se guarda un caracter de espacio que no esta
            //tengo que poner la key y ademas la otra dimension para guardar todos los datos???
            $datos[$partes[3]] = [$partes[0],$partes[1],$partes[2],$partes[3],$partes[4]];
            
        }
        if(isset($datos[$_POST['user']][4]) && $datos[$_POST['user']][4] == $_POST['pass']){
        // realizo el login
        login($_POST['user']);
        header('Location: tienda.php');
        }else{
            echo pintaCabecera();
            echo $principal;
            echo "Usuario o contraseña erronea";
        }
}else{
    echo pintaCabecera();
    echo $principal;
    echo "Usuario o contraseña erronea";
}

}