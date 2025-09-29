<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejemplo PHP con variables</title>
</head>
<body>
    <h1>Ejemplo de variable en PHP</h1>

    <?php
        // Primer bloque PHP: creamos la variable
        $nombre = "Maria"; 
    ?>

    <p>El valor de la variable es:</p>

    <?php
        // Segundo bloque PHP: mostramos la variable
        echo "<strong> $nombre </strong>";
    ?>

    

    <h2>1. Uso básico de echo</h2>
    <?php
    echo "Hola, mundo!";
    ?>

    <h2>2. Uso básico de echo con varias cadenas</h2>
    <?php
    echo "Hola, ", "mundo!";
    ?>

    <h2>3. Uso de print con una cadena</h2>
    <?php
    print "Hola, mundo!";
    ?>

    <h2>4. Uso de echo con variables</h2>
    <?php
    $nombre = "Juan";
    echo "Hola, " . $nombre . "!";
    ?>

    <h2>5. Uso de print con concatenación</h2>
    <?php
    $nombre = "Juan";
    print "Hola, " . $nombre . "!";
    ?>

    <h2>6. Uso de echo con HTML</h2>
    <?php
    echo "<h1>Hola, mundo!</h1>";
    ?>

    <h2>7.Uso de print con HTML</h2>
    <?php
    print "<h1>Hola, mundo!</h1>";
    ?>

    <h2>8. Uso de echo para mostrar números</h2>
    <?php
    echo 10 + 20;
    ?>

    <h2>9.  Uso de print para mostrar números</h2>
    <?php
    print 10 + 20;
    ?>

    <h2>10. Uso de echo con comillas dobles y simples</h2>
    <?php
    echo "Este es un 'ejemplo' con comillas dobles y simples.";  
    ?>       


</body>
</html>  

