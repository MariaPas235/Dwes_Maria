<?php
// ------------------------
// Declaración de variables
// ------------------------
$nombre = "Ana";
$edad = 22;
$altura = 1.68;

// ------------------------
// Uso de echo y print
// ------------------------
echo "<h2>Ejemplo de echo y print</h2>";
echo "Hola, mi nombre es $nombre y tengo $edad años.<br>";
print("Mido $altura metros.<br>");

// ------------------------
// Uso de printf con formatos
// ------------------------
printf("Entero: %d<br>", $edad);
printf("Decimal: %.2f<br>", $altura);
printf("Cadena: %s<br>", $nombre);
printf("Binario de 10: %b<br>", 10);
printf("Hexadecimal de 255: %x<br>", 255);
printf("Octal de 8: %o<br><br>", 8);

// ------------------------
// Constantes
// ------------------------
define("PI", 3.1416);
const SALUDO = "¡Bienvenido al resumen de PHP!";
echo SALUDO . "<br>";
echo "El valor de PI es " . PI . "<br><br>";

// ------------------------
// Formatos de fecha
// ------------------------
echo "<h2>Fecha y hora actuales</h2>";
echo date("d/m/Y H:i:s") . "<br><br>";

// ------------------------
// Variables Superglobales
// ------------------------
echo "<h2>Variables Superglobales</h2>";
echo "Tu navegador es: " . $_SERVER['HTTP_USER_AGENT'] . "<br>";
echo "Estás ejecutando el script: " . $_SERVER['PHP_SELF'] . "<br><br>";

// ------------------------
// Constantes predefinidas
// ------------------------
echo "<h2>Constantes predefinidas</h2>";
echo "Versión de PHP: " . PHP_VERSION . "<br>";
echo "Sistema operativo: " . PHP_OS . "<br>";
echo "Archivo actual: " . __FILE__ . "<br>";
echo "Línea actual: " . __LINE__ . "<br>";
echo "Directorio: " . __DIR__ . "<br>";
?>