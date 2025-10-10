<?php
// Programa.php - Validación simple (requeridos)
$errores = [];
$nombre = $_POST['nombre'] ?? '';
$email  = $_POST['email'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($nombre === '') { $errores[] = 'El nombre es obligatorio.'; }
    if ($email === '')  { $errores[] = 'El email es obligatorio.'; }
}
?>
<!doctype html>
<html lang="es">
<head><meta charset="utf-8"><title>Programa35 - Validación simple</title></head>
<body>
<h1>Programa - Validación: campos obligatorios</h1>
<?php if (!empty($errores)): ?>
  <ul style="color:crimson;">
    <?php foreach ($errores as $e): ?><li><?php echo htmlspecialchars($e); ?></li><?php endforeach; ?>
  </ul>
<?php endif; ?>
<form method="post" action="">
  <p><label>Nombre: <input type="text" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>"></label></p>
  <p><label>Email: <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>"></label></p>
  <button type="submit">Enviar</button>
</form>
<?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errores)): ?>
  <p>OK Datos recibidos.</p>
<?php endif; ?>
</body>
</html>