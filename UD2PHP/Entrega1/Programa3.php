//Crea un script PHP con diferentes variablesnuméricas y de cadena relacionadas con productos de alguna empresa y muéstralas por pantalla, dos de ellas con 2 decimales, otras dos con 4 decimales, un entero (sin decimales), una tipo cadena, una de ellas en binario, en notación científica, almacena una variable real, con 3 decimales.. todo lo que quieras usar basándote en los ejemplos anteriores

<!DOCTYPE html>
<html lang="es">    
<body>
<html>

    
<?php
// Variables relacionadas con productos de una empresa
$producto = "Laptop HP EliteBook"; // Cadena
$precio = 1299.99; // 2 decimales
$descuento = 0.1532; // 4 decimales
$stock = 25; // Entero
$codigoBinario = decbin(2025); // Binario
$peso = 2.345; // Real con 3 decimales
$iva = 0.21; // 2 decimales
$precioFinal = $precio * (1 - $descuento) * (1 + $iva); // Cálculo con decimales
$volumen = 1.234567; // 4 decimales
$precioCientifico = sprintf("%.2e", $precio); // Notación científica

// Mostrar variables por pantalla
echo "Producto: $producto<br>";
echo "Precio: " . number_format($precio, 2) . " €<br>";
echo "Descuento: " . number_format($descuento, 4) . "<br>";
echo "Stock disponible: $stock unidades<br>";
echo "Código en binario: $codigoBinario<br>";
echo "Peso: " . number_format($peso, 3) . " kg<br>";
echo "IVA: " . number_format($iva, 2) . "<br>";
echo "Precio final: " . number_format($precioFinal, 2) . " €<br>";
echo "Volumen: " . number_format($volumen, 4) . " m³<br>";
echo "Precio en notación científica: $precioCientifico<br>";

?>

</html>
</body>

