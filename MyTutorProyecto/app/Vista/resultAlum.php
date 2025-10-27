<?php

use Modelo\Profesor;
use Modelo\Clase;

require_once __DIR__ . '/../Modelo/Profesor.php';
require_once __DIR__ . '/../Modelo/Alumno.php';
require_once __DIR__ . '/../Modelo/Clase.php';
require_once __DIR__ . '/../Controlador/AlumnoController.php';

$clase1 = new Clase("POO", "24/10/25");
$clase2 = new Clase("HTML", "25/10/25");
$clase3 = new Clase("CSS", "26/10/25");
$clase4 = new Clase("Array", "27/10/25");


$clasesDeProfe1 = [$clase1, $clase4];
$clasesDeProfe2 = [$clase2, $clase3];

$profesor1 = new Profesor("Juan", "juan@gmail.com", "123", "Programador", $clasesDeProfe1);
$profesor2 = new Profesor("Maria", "maria@gmail.com", "123", "Interfaces", $clasesDeProfe2);

$arrayprofesor = [$profesor1, $profesor2];

$controller = new AlumnoController();
$alumnologgueado = $controller->handleForm();



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Alumno</title>
</head>

<body>

    <h1>Datos Recibidos</h1>

    <p><strong>Nombre:</strong> <?= htmlspecialchars($alumnologgueado->getNombre()) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($alumnologgueado->getEmail()) ?></p>
    <p><strong>Contraseña:</strong> <?= htmlspecialchars($alumnologgueado->getContraseña()) ?></p>
    <p><strong>Edad:</strong> <?= htmlspecialchars($alumnologgueado->getEdad()) ?></p>
    <?php
    if (!empty($alumnologgueado->getClasesAsistidasArray())) {
        echo "<h2>Clases Seleccionadas:</h2>";
        echo "<ul>";
        foreach ($alumnologgueado->getClasesAsistidasArray() as $claseSeleccionada) {
            echo "<li>" . htmlspecialchars($claseSeleccionada) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<h2>No se han seleccionado clases aún.</h2>";
    }
    ?>
    <br>

    <form action="" method="POST">
        <input type="hidden" name="nombre" value="<?= htmlspecialchars($alumnologgueado->getNombre()) ?>">
        <input type="hidden" name="email" value="<?= htmlspecialchars($alumnologgueado->getEmail()) ?>">
        <input type="hidden" name="contraseña" value="<?= htmlspecialchars($alumnologgueado->getContraseña()) ?>">
        <input type="hidden" name="edad" value="<?= htmlspecialchars($alumnologgueado->getEdad()) ?>">

        <?php
        foreach ($arrayprofesor as $profesor) {
            echo '<h1>Profesor/a ' . htmlspecialchars($profesor->getNombre()) . '</h1>';
            echo '<h3>Próximas clases:</h3>';

            foreach ($profesor->getClasesimpaertidadarray() as $clase) {
                $descripcion = htmlspecialchars($clase->getDescripcion());
                $fecha = htmlspecialchars($clase->getFecha());
                echo '<label>';
                echo '<input type="radio" name="clases[]" value="' . "$descripcion - $fecha" . '">';
                echo "$descripcion - $fecha";
                echo '</label><br>';
            }

            echo '<hr>';
        }
        ?>


        <br>
        <input type="submit" value="Guardar selección">
    </form>

    <br>
    <a href="index.php">Volver al formulario</a>
</body>

</html>