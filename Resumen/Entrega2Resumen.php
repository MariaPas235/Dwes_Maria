<?php
// ------------------------------------------
// EJEMPLOS DE CONDICIONALES Y BUCLES EN PHP
// ------------------------------------------

// if, else, elseif
$edad = 20;
echo "<h3>Condicional if, else, elseif</h3>";
if ($edad < 13) {
    echo "Eres un niño.<br>";
} elseif ($edad < 18) {
    echo "Eres adolescente.<br>";
} else {
    echo "Eres adulto.<br>";
}

// switch
$color = "rojo";
echo "<h3>Switch</h3>";
switch ($color) {
    case "rojo": echo "El color es rojo.<br>"; break;
    case "azul": echo "El color es azul.<br>"; break;
    default: echo "Color no reconocido.<br>";
}

// match (PHP 8+)
$nota = 9;
echo "<h3>Match</h3>";
$mensaje = match($nota) {
    10 => "Excelente",
    8, 9 => "Muy bien",
    6, 7 => "Bien",
    default => "Insuficiente"
};
echo "Tu nota es: $mensaje<br>";

// do...while
echo "<h3>do...while</h3>";
$i = 1;
do {
    echo "Número: $i<br>";
    $i++;
} while ($i <= 3);

// for
echo "<h3>for</h3>";
for ($i = 1; $i <= 3; $i++) {
    echo "Iteración $i<br>";
}

// foreach
echo "<h3>foreach</h3>";
$frutas = ["manzana", "pera", "uva"];
foreach ($frutas as $fruta) {
    echo "Fruta: $fruta<br>";
}

// -------------------------
// FUNCIONES
// -------------------------

// Función sin argumentos
echo "<h3>Funciones sin argumentos</h3>";
function saludar() {
    echo "¡Hola desde la función sin argumentos!<br>";
}
saludar();

// Función con argumentos
echo "<h3>Funciones con argumentos</h3>";
function sumar($a, $b) {
    return $a + $b;
}
echo "2 + 3 = " . sumar(2, 3) . "<br>";

// Argumento por valor
echo "<h3>Argumentos por valor</h3>";
function duplicar($x) {
    $x = $x * 2;
}
$num = 5;
duplicar($num);
echo "Valor después de duplicar (por valor): $num<br>";

// Argumento por referencia
echo "<h3>Argumentos por referencia</h3>";
function duplicarReferencia(&$x) {
    $x = $x * 2;
}
duplicarReferencia($num);
echo "Valor después de duplicar (por referencia): $num<br>";

?>


<?php
// --------------------------------------
// ARRAYS NUMÉRICOS Y ASOCIATIVOS EN PHP
// --------------------------------------

// Array numérico
$frutas = ["manzana", "pera", "uva", "naranja"];

// Array asociativo
$persona = [
    "nombre" => "Ana",
    "edad" => 22,
    "ciudad" => "Madrid"
];

// -------------------------------
// MOSTRAR ELEMENTOS INDIVIDUALES
// -------------------------------
echo "<h3>Elementos individuales</h3>";
echo "Segunda fruta: " . $frutas[1] . "<br>";       // pera
echo "Nombre de la persona: " . $persona["nombre"] . "<br><br>"; // Ana

// -------------------------------
// MOSTRAR TODOS LOS ELEMENTOS
// -------------------------------
echo "<h3>Recorrer arrays</h3>";

echo "Array numérico:<br>";
foreach ($frutas as $f) {
    echo "- $f<br>";
}

echo "<br>Array asociativo:<br>";
foreach ($persona as $clave => $valor) {
    echo ucfirst($clave) . ": $valor<br>";
}

// -------------------------------
// FUNCIONES CON ARRAYS
// -------------------------------
echo "<h3>Funciones con arrays (reset, next, prev, end)</h3>";

reset($frutas); // coloca el puntero al primer elemento
echo "Primer elemento: " . current($frutas) . "<br>";

next($frutas); // avanza al segundo
echo "Siguiente elemento: " . current($frutas) . "<br>";

end($frutas); // va al último
echo "Último elemento: " . current($frutas) . "<br>";

prev($frutas); // retrocede uno
echo "Elemento anterior: " . current($frutas) . "<br>";

reset($frutas); // vuelve al inicio
echo "De nuevo al principio: " . current($frutas) . "<br>";
?>



<?php
// ---------------------------------------
// PROCESAMIENTO DEL FORMULARIO
// ---------------------------------------

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir y limpiar los datos
    $nombre = trim($_POST['nombre'] ?? "");
    $clave = trim($_POST['clave'] ?? "");
    $comentario = trim($_POST['comentario'] ?? "");
    $sexo = $_POST['sexo'] ?? "";
    $pais = $_POST['pais'] ?? "";
    $intereses = $_POST['intereses'] ?? [];

    // Validaciones básicas
    if (empty($nombre)) {
        $mensaje .= "⚠️ El campo 'Nombre' es obligatorio.<br>";
    }
    if (empty($clave)) {
        $mensaje .= "⚠️ El campo 'Contraseña' es obligatorio.<br>";
    }

    // Si todo está correcto, mostrar datos
    if (empty($mensaje)) {
        $mensaje .= "<h3>✅ Datos recibidos correctamente:</h3>";
        $mensaje .= "Nombre: $nombre<br>";
        $mensaje .= "Contraseña: $clave<br>";
        $mensaje .= "Comentario: $comentario<br>";
        $mensaje .= "Sexo: $sexo<br>";
        $mensaje .= "País: $pais<br>";
        $mensaje .= "Intereses: " . implode(", ", $intereses) . "<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Formulario en PHP con $_SERVER</title>
<style>
  body { font-family: Arial; margin: 30px; }
  form { background: #f8f8f8; padding: 20px; border-radius: 10px; width: 400px; }
  label { display: block; margin-top: 10px; }
  input, textarea, select { width: 100%; padding: 6px; margin-top: 4px; }
  .boton { margin-top: 15px; background: #4CAF50; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer; }
  .resultado { margin-top: 20px; background: #eef; padding: 10px; border-radius: 8px; }
</style>
</head>
<body>

<h2>Ejemplo de formulario en PHP</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
  <label>Nombre:</label>
  <input type="text" name="nombre">

  <label>Contraseña:</label>
  <input type="password" name="clave">

  <label>Comentario:</label>
  <textarea name="comentario" rows="3"></textarea>

  <label>Sexo:</label>
  <input type="radio" name="sexo" value="Hombre"> Hombre
  <input type="radio" name="sexo" value="Mujer"> Mujer

  <label>País:</label>
  <select name="pais">
    <option value="">Selecciona</option>
    <option value="España">España</option>
    <option value="México">México</option>
    <option value="Argentina">Argentina</option>
  </select>

  <label>Intereses:</label>
  <input type="checkbox" name="intereses[]" value="Música"> Música
  <input type="checkbox" name="intereses[]" value="Deporte"> Deporte
  <input type="checkbox" name="intereses[]" value="Lectura"> Lectura

  <input type="submit" value="Enviar" class="boton">
</form>

<div class="resultado">
  <?= $mensaje ?>
</div>

<hr>
<h3>Información del servidor ($_SERVER)</h3>
<p><strong>Archivo actual:</strong> <?= $_SERVER['PHP_SELF'] ?></p>
<p><strong>Método usado:</strong> <?= $_SERVER['REQUEST_METHOD'] ?></p>
<p><strong>Software del servidor:</strong> <?= $_SERVER['SERVER_SOFTWARE'] ?></p>
<p><strong>Nombre del host:</strong> <?= $_SERVER['HTTP_HOST'] ?></p>

</body>
</html>


