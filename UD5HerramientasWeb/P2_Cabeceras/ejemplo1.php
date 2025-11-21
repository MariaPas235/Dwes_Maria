<?php
    header('Content-Type: application/json');


    $data = [
        "nombre" => "Juan",
        "edad" => 25,
        "ciudad" => "Madrid"
    ];


    echo json_encode($data);




?>
