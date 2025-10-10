<?php
// Programa.php - Envío mixto (texto + radio + select)
$nombre = $_POST['nombre'] ?? '';
$turno = $_POST['turno'] ?? '';
$pais = $_POST['pais'] ?? '';
$paises = ['España','Francia','Italia'];
?>
<!doctype html>
<html lang="es">
<head><meta charset="utf-8"><title>Programa34 - Mixto</title></head>
<body>
<h1>Programa - Formulario mixto</h1>
<form method="post" action="">
  <p><label>Nombre: <input type="text" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>"></label></p>
  <p>Turno:
    <label><input type="radio" name="turno" value="mañana" <?php if($turno==='mañana') echo 'checked'; ?>> Mañana</label>
    <label><input type="radio" name="turno" value="tarde" <?php if($turno==='tarde') echo 'checked'; ?>> Tarde</label>
  </p>
  <p><label>País:
    <select name="pais">
      <option value="">-- Selecciona --</option>
      <?php foreach ($paises as $p): ?>
        <option value="<?php echo htmlspecialchars($p); ?>" <?php if($pais===$p) echo 'selected'; ?>><?php echo htmlspecialchars($p); ?></option>
      <?php endforeach; ?>
    </select>
  </label></p>
  <button type="submit">Enviar</button>
</form>
<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
  <h2>Resumen</h2>
  <ul>
    <li>Nombre: <strong><?php echo htmlspecialchars($nombre); ?></strong></li>
    <li>Turno: <strong><?php echo htmlspecialchars($turno ?: '—'); ?></strong></li>
    <li>País: <strong><?php echo htmlspecialchars($pais ?: '—'); ?></strong></li>
  </ul>
<?php endif; ?>
</body>
</html>