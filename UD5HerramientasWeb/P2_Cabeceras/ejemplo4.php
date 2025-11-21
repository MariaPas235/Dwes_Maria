<?php

header('Content-Type: application/json; charset=utf-8');
header("Expires: Sun, 31 Jan 2021 23:59:59 GMT");


$now = time();
$horas3 = gmdate("D, d M Y H:i:s", $now + 60 * 60 * 3) . " GMT";
header("Expires: {$horas3}");


$anyo1 = gmdate("D, d M Y H:i:s", $now + 365 * 86400) . " GMT";
 // Nota: 86400 segundos = 1 día
header("Expires: {$anyo1}");

echo print_r (headers_list());

echo "Cabeceras enviadas correctamente.";

?>
