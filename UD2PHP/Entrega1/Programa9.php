<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Funciones de Fecha y Hora en PHP</title>
</head>
<body>
<h2>Uso de la función date()</h2>
<?php
echo "<p>Formato completo (d/m/Y H:i:s): " . date("d/m/Y H:i:s") . "</p>";
echo "<p>Día de la semana (l): " . date("l") . "</p>";
echo "<p>Mes (F): " . date("F") . "</p>";
echo "<p>Año en 4 dígitos (Y): " . date("Y") . "</p>";
echo "<p>Hora en 12h con AM/PM (h:i A): " . date("h:i A") . "</p>";
echo "<p>Hora en 24h (H:i): " . date("H:i") . "</p>";
echo "<p>Timestamp actual (U): " . date("U") . "</p>";
echo "<p>Semana del año (W): " . date("W") . "</p>";
?>

<h2>Uso de la función getdate()</h2>
<?php
$info = getdate();
echo "<pre>";
print_r($info); // Muestra todos los detalles de la fecha/hora actual
echo "</pre>";

// Acceder a valores concretos
echo "<p>Día del mes: " . $info['mday'] . "</p>";
echo "<p>Mes numérico: " . $info['mon'] . "</p>";
echo "<p>Año: " . $info['year'] . "</p>";
echo "<p>Hora actual: " . $info['hours'] . ":" . $info['minutes'] . "</p>";

/*
Con date() muestra al menos 8 formatos distintos (d/m/Y, l, F, Y, h:i A, H:i, U, W).

Con getdate() imprime todos los valores de la fecha actual y luego algunos campos específicos (mday, mon, year, hours, minutes).

¿Quieres que lo prepare también en modo ejercicio para alumnos con huecos (por ejemplo, que deban completar los formatos de date() en vez de verlos resueltos)?
*/
?>
</body>
</html>