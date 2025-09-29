<?php
define("PI", 3.14);
print "<p>El valor de pi es " . PI . "</p>\n";
?>

<?php
define("LIBRO", ["Don Quijote", "Cervantes", 1605]);
print "<p>" . LIBRO[1] . " escribió " . LIBRO[0] . " en " . LIBRO[2] . ".</p>\n";
?>

// Se pueden definir constantes con const

<?php
const PI2 = 3.14;
print "<p>El valor de pi es " . PI2 . "</p>\n";
?>

<?php
const LIBRO2 = ["Don Quijote", "Cervantes", 1605];
print "<p>" . LIBRO2[1] . " escribió " . LIBRO2[0] . " en " . LIBRO2[2] . ".</p>\n";
?>

//Las constantes definidas con define() se crean en tiempo de ejecución mientras que las constantes definidas con const se crean en tiempo de compilación.


<?php
$decimales = 6;
if ($decimales == 6) {
    define("PI3", 3.141592);
} else {
    define("PI3", 3.14);
}
print "<p>El valor de pi es " . PI3 . "</p>\n";
?>


// no podemos usar const 
<?php
$decimales = 6;
if ($decimales == 6) {
 //   const PI = 3.141592; 
} else {
  //  const PI = 3.14;
}
print "<p>El valor de pi es " . PI . "</p>\n";
?>


//Constantes predefinidas

<?php
print "<p>En este servidor los enteros ocupan " . PHP_INT_SIZE . " bytes.</p>\n";
?>


<?php
print "<p>En este servidor el mayor entero posible es  " . PHP_INT_MAX . ".</p>\n";
?>

<?php
print "<p>En este servidor el menor entero posible es  " . PHP_INT_MIN . ".</p>\n";
?>


<?php
print "<p>En este servidor el mayor decimal posible es  " . PHP_FLOAT_MAX . ".</p>\n";
?>

<?php
print "<p>En este servidor el decimal más próximo a cero posible es  " . PHP_FLOAT_EPSILON . ".</p>\n";
?>