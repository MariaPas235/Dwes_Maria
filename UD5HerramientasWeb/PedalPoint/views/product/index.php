<?php 
require __DIR__ . '/../layout/header.php'; 

// Nombre de la cookie
$cookie_name = "visitas";
$visitas = 1;

// Si la cookie ya existe, incrementamos el contador
if(isset($_COOKIE[$cookie_name])){
    $visitas = $_COOKIE[$cookie_name] + 1;
}

// Guardamos la cookie por 1 año
setcookie($cookie_name, $visitas, time() + (365 * 24 * 60 * 60), "/"); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>

    <h1>Bienvenido a PedalPoint !!!</h1>
    <p>Seleccione en el menú hacia donde quiere ir</p>
    <p style="text-align:center; color:#333;">Esta página ha sido visitada <strong><?php echo $visitas; ?></strong> veces.</p>

</body>
</html>

<?php require __DIR__ . '/../layout/footer.php'; ?>
