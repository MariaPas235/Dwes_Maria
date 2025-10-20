<?php

//Registrar la función de autoload
spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name .'.php'; 
});

//Instanciar las clases

$user = new User(); //Output: clase user cargado
$producto = new Product(); //Output: clase product cargada


?>