//if 

<?php
$a = 5;
$b = 2;
if ($a > $b) {
  echo "a es más grande que b";
  $b = $a;
}
?>

//else 
<?php
if ($a > $b) {
  echo "a es más grande que b";
} else {
  echo "a es más pequeño que b";
}
?>

//elseif
<?php
if ($a > $b) {
    echo "a es más grande que b";
} elseif ($a == $b) {
    echo "a es igual a b";
} else {
    echo "a es más pequeño que b";
}
?>

<?php

/* Buena práctica: */
if ($a > $b):
    echo $a." es más grande que ".$b;
elseif ($a == $b): // Las dos palabras están unidas, cuando va con 2 puntos, es necesario unir las palabras
    echo $a." igual ".$b;
else:
    echo $a." es más grande o igual a ".$b;
endif;

?>


//sintaxis alternativa
<?php if ($a == 5): ?>
A igual 5
<?php endif; ?>

<?php
if ($a == 5):
    echo "a igual 5";
    echo "...";
elseif ($a == 6):
    echo "a igual 6";
    echo "!!!";
else:
    echo "a no vale ni 5 ni 6";
endif;
?>