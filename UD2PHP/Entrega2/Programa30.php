<?php
// Formulario simple con GET (nombre)
$nombre = $_GET['nombre'] ?? '';
?>
<!doctype html>
<html lang="es">
<head><meta charset="utf-8"><title>Programa25 - GET</title></head>
<body>
<h1>Programa - GET: Hola nombre</h1>
<form method="get" action="">
  <label>Nombre: <input type="text" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>"></label>
  <button type="submit">Enviar</button>
</form>
<?php if ($nombre !== ''): ?>
  <p>Hola, <strong><?php echo htmlspecialchars($nombre); ?></strong></p>
<?php endif; ?>
</body>
</html>