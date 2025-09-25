<?php
//codigo php
echo "Programa 1";

echo "<h1> Programa 1</h1>";


echo "Esta es la primera línea.\n";
echo "Esta es la segunda línea.\n";
echo "Esta es la tercera línea.\r\n"; // Para mayor compatibilidad

echo "Esta es la primera línea.<br>";
echo "Esta es la segunda línea.<br>";


echo "<h2>PHP Tipos de datos</h2>";
$numero = 42; //Tipo de dato entero 
$precio = 19.99; //Tipo de dato float
$saludo = "Hola, mundo!"; //Tipo de dato string
$booleano = true; //Tipo de dato booleano
$colores = array("rojo", "verde", "azul"); //Tipo de dato array
$objeto =(object) [`nombre` => `Juan`, `edad` => 26];
$nulo = null; 
//$recurso = fopen("archivo.txt","r"); 
$simbolo = "@";


echo "<h2>Muestro los tipos de datos creados arriba </h2>";

echo "Tipo de dato entero: " . gettype($numero) . " con valor: $numero<br>";

echo "Tipo de dato flotante: " . gettype($precio) . " con valor: $precio<br>";

echo "Tipo de dato cadena: " . gettype($saludo) . " con valor: $saludo<br>";

echo "Tipo de dato booleano: " . gettype($booleano) . " con valor: $booleano<br>";

echo "Tipo de dato Array: " . gettype($colores) . " con valor: " . implode("," , $colores) . "<br>";

//echo "Tipo de dato objeto: " . gettype($objeto) . " con valor: " . $objeto->nombre . " , " . $objeto->edad . "<br>" ;

echo "Tipo de dato nulo: " . gettype($nulo) . " con valor: " . var_export($nulo, true) . "<br>";

//echo "Tipo de dato recurso: " . gettype($recurso) . <br>";

echo "Tipo de dato simbolo: " . gettype($simbolo) . " con valor: $simbolo<br>";

echo "<hr>";



echo "<h2>Funciones con variables globales</h2>";

$variableGlobal = "Soy una variable global";
$x = 10;  //Ambito global 

function probarAmbito (){
    global $variableGlobal; //Acceder a la variable global 
    $variableLocal = "Yo soy una variable local";

    echo $variableGlobal . "<br>"; //Accede a la variable global 
    echo $variableLocal . "<br>"; //Accede a la variable local
}


function miFuncion(){
    global $x; //Hace $x accesible dentro de la función 
    echo $x;
}

miFuncion();
probarAmbito();


echo "<h2>Ámbito local</h2>";

function otraFuncion(){
    $y = 5; //Ámbito local
    echo $y;
}

otraFuncion(); //Imprime:5 
echo $y; //Error: $y no está definida fuera de la función 


echo "<h2>Variables estáticas</h2>";

function Contador(){
    static $contador = 0;
    $contador ++;
    echo $contador;
}

Contador(); //Imprime 1 
Contador(); //Imprime 2 
Contador(); //Imprime 3 
















?>