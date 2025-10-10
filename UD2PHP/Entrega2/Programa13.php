<?php
$videojuego = "Zelda";

$genero = match($videojuego) {
    "FIFA" => "Deportes",
    "Call of Duty" => "Shooter",
    "Zelda" => "Aventura",
    "Minecraft" => "Sandbox",
    default => "Género desconocido",
};

echo "El juego $videojuego pertenece al género: $genero";
?>



<?php
$food = 'cake';

$return_value = match ($food) {
    'apple' => 'This food is an apple',
    'bar' => 'This food is a bar',
    'cake' => 'This food is a cake',
};

echo ($return_value);
?>+

<?php
$videojuego = "Zelda";

$genero = match($videojuego) {
    "FIFA" => "Deportes",
    "Call of Duty" => "Shooter",
    "Zelda" => "Aventura",
    "Minecraft" => "Sandbox",
    default => "Género desconocido",
};

echo "El juego $videojuego pertenece al género: $genero";
?>