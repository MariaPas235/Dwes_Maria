<?php require __DIR__ . '/../layout/header.php'; ?>

<h1>Bienvenido a PedalPoint. Registrese</h1>

<?php if (!empty($error)): ?>
    <div class="alert alert-error">
        <?= htmlspecialchars($error) ?>
    </div>
<?php endif; ?>



<form method="post" action="index.php?c=authuser&a=doRegister" class="form">
    <label>
        Usuario
        <input type="text" name="username" required>
    </label>
    <label>
        Contraseña
        <input type="password" name="password" required>
    </label>
    <button type="submit">Entrar</button>
    <p class="help">
      Registrese con su usuario y contraseña. seguros. 
    </p>
</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>