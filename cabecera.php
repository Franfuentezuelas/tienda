<?php

require_once 'login.php';
iniciarSesion();

function pintaCabecera(){
    $cabecera ="<h1>Tienda de coches Fran</h1>
    <p>Bienvenido Registrese para entrar en la tienda</p>";
    if(leerSesion('user')!=""){
        $usuario=leerSesion('user');
        $cabecera = "<h1>Tienda de coches Fran</h1>
                    <p>Bienvenido $usuario
                    <img src='https://ui-avatars.com/api/?name=$usuario'>
                    <form action='index.php' method='POST' name='cabecera'>
                    <button type='submit' name='cabecera' value='logout'>Logout</button>
                    </form></p>";
    }
   return $cabecera;
}
