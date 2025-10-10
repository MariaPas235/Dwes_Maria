<?php
    print "<br/><br/>  ARGUMENTOS POR valor y por referencia <br  /> ";//ARGUMENTOS POR DEFECTO
    function precio_iva_referencia (&$precio /*le pasas su direcion de memoria 100325*/, $iva=0.21) {
        $precio *= (1 + $iva); 
        RETURN $precio; //devuelve el valor modificado 
    }

    $precio = 10;  //imagina que su MEMORY ADDRESS vale 100325
    print "<br/><br/>1- ANTES de llamar a la función:  El precio con IVA es ".$precio ;  //10

    precio_iva_referencia($precio);

    print "<br/>2- DESPUES de llamar a la función:  El precio con IVA es ". $precio ;  //121
    

?>

<?php
// Versión moderna (PHP 5.6+)
function sumarModern(...$numeros) {
    $suma = 0;
    foreach ($numeros as $n) {
        $suma += $n;
    }
    return $suma;
}

// Versión clásica (PHP <5.6)
function sumarClasico() {
    $args = func_get_args(); // obtiene todos los argumentos como array
    $suma = 0;
    foreach ($args as $n) {
        $suma += $n;
    }
    return $suma;
}

// Ejemplos de uso
echo "Suma moderna (2 + 3): " . sumarModern(2, 3) . "<br>";
echo "Suma moderna (1 + 2 + 3 + 4 + 5): " . sumarModern(1, 2, 3, 4, 5) . "<br>";

echo "Suma clásica (2 + 3): " . sumarClasico(2, 3) . "<br>";
echo "Suma clásica (10 + 20 + 30): " . sumarClasico(10, 20, 30) . "<br>";
?>