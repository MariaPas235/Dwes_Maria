<?php
// Programa.php - Textarea (comentarios)
$coment = $_POST['coment'] ?? '';
?>
<!doctype html>
<html lang="es">
<head><meta charset="utf-8"><title>Programa33 - Textarea</title></head>
<body>
<h1>Programa - Comentarios (textarea)</h1>
<form method="post" action="">
  <label>Comentarios:<br>
    <textarea name="coment" rows="5" cols="40"><?php echo htmlspecialchars($coment); ?></textarea>
  </label><br>
  <button type="submit">Enviar</button>
</form>
<?php if ($coment !== ''): ?>
  <p>Has escrito:</p>
  <blockquote><?php echo nl2br(htmlspecialchars($coment)); ?></blockquote>
<?php endif; ?>
</body>
</html>