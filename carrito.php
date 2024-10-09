<?php
require_once 'login.php';
require_once 'cabecera.php';

$usuario=leerSesion('user');
if(isset($_POST['carrito'])){
    $procedencia=$_POST['carrito'];
        guardarSesion('procedencia', $procedencia);
}
if(isset($_POST['car'])){
    $borrar=$_POST['car'];
    $coches=leerSesion('coche');// guardo el array de coches que tengo en coches
    unset($coches[$borrar]);// quito el coche seleccionado en el array
    guardarSesion('coche', $coches);// guardo el array con la clave coche
}
$procedencia=leerSesion('procedencia');

$origin = $_SERVER['REQUEST_URI'];
$coches=leerSesion('coche');
// verifico que hay coches
$carrito="<h2>Compra de coches</h2><br";
if($coches!=""){
    foreach($coches as $key=>$car){
        $carrito = "$carrito <p>$car <form action='carrito.php' method='POST' name='volver'>
        <button type='submit' id='$key' name='car' value='$key'>Eliminar</button>
        </form></p>";
        }
}
echo pintaCabecera();
echo $carrito;
echo "Registrado como $usuario \n";
echo "aqui va el carrito";
echo"<form action='$procedencia.php' method='POST' name='volver'>
<button type='submit' id='volver' value='volver'>Volver</button>
</form>";


