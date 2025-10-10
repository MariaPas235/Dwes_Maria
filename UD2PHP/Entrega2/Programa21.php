<?php
//Ejemplo Definición de array simple

$array1 = array(
    "playa" => "verano",
    "verano" => "playa",
);

// a partir de PHP 5.4
$array2 = [
    "playa" => "verano",
    "verano" => "playa",
];


//mostrar un valor de cada uno
echo "array1 playa: " . $array1["playa"] . "<br>";
echo "array2 verano: " . $array2["verano"] . "<br>";

//Array creado paso a paso
$modulos1[0] = "Programación";
$modulos1[1] = "Bases de datos";
$modulos1[2] = "Desarrollo web en entorno servidor";

//Array creado paso a paso sin decir posición
$modulos2[] = "Programación";
$modulos2[] = "Bases de datos";
$modulos2[] = "Desarrollo web en entorno servidor";

echo " <br> Modulos 2: ";
print_r($modulos2);

echo " <br>  ";


?>



