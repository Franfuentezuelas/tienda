<?php
require_once 'login.php';
require_once 'cabecera.php';
echo pintaCabecera();

$usuario=leerSesion('user');
if(isset($_POST['marca'])){
    guardarSesion('marca', $_POST['marca']);
}
$coches=[];// creo el array vacio
$marca=leerSesion('marca');
if(isset($_POST['coche'])){ // si no hay nada en la sesion guardo el primer valor
    if(leerSesion('coche')==""){// no hay ningun copche guardado
        $coches[]=$_POST['coche'];// meto el coche seleccionado en el array
        guardarSesion('coche', $coches);// guardo el array con la clave coche
    }else{
        $coches=leerSesion('coche'); // guardo el array de coches que tengo en coches
        $coches[]=$_POST['coche'];// meto el coche seleccionado en el array
        guardarSesion('coche', $coches);// guardo el array con la clave coche
}
}
$marca=leerSesion('marca');
echo "Selecciono la marca $marca \n";

//guardarSesion('coche', []);
//isset($_POST['coche'])? $coche=$_POST['coche'];

$cochesMercedes="<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Document</title>
    </head>
    <body>
        <form action='coches.php' method='POST' name='coche'>
        <fieldset>
            <label for='CLA'>CLA</label>
            <button type='submit' name='coche' value='CLA'>Seleccionar</button>
            <label for='Clase C'>Clase C</label>
            <button type='submit' name='coche' value='Clase C'>Seleccionar</button>
        </fieldset>
        </form>
    </body>
    </html>";
$cochesBMW="<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Document</title>
    </head>
    <body>
           <form action='coches.php' method='POST' name='coche'>
        <fieldset>
            <label for='X3'>X3</label>
            <button type='submit' name='coche' value='X3'>Seleccionar</button>
            <label for='X5'>X5</label>
            <button type='submit' name='coche' value='X5'>Seleccionar</button>
        </fieldset>
        </form>
    </body>
    </html>";

echo "Registrado como $usuario \n";
if($marca=="mercedes"){
    echo $cochesMercedes;
 }elseif($marca=="BMW"){
    echo $cochesBMW;
}
echo  "<form action='carrito.php' method='POST' name='carrito'>
        <button type='submit' name='carrito' value='coches'>Carrito</button>
    </form>
<form action='tienda.php' method='POST' name='volver'>
<button type='submit' id='volver' value='volver'>Volver</button>
</form>";


