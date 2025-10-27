<?php

require_once __DIR__ . '/app/Controlador/AlumnoController.php';

$controller = new AlumnoController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->handleForm();
} else {
    $controller->showForm();
}

?>