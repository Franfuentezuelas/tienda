<?php
require_once 'cabecera.php';
require_once 'login.php';
//iniciarSesion();
$usuario=leerSesion('user');
$tienda="
    <form action='coches.php' method='POST' name='marcas'>
        <fieldset>
            <label for='mercedes'>Mercedes</label>
            <button type='submit' name='marca' value='mercedes'>Seleccionar</button>
        </fieldset>
        <fieldset>
            <label for='BMW'>BMW</label>
            <button type='submit' name='marca' value='BMW'>Seleccionar</button>
        </fieldset>
    </form>
    <form action='carrito.php' method='POST' name='carrito'>
        <button type='submit' name='carrito' value='tienda'>Carrito</button>
    </form>";

    echo pintaCabecera();
    //echo "Registrado como $usuario";
    echo $tienda;
