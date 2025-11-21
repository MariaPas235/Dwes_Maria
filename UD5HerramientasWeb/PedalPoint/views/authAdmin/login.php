<?php require __DIR__ . '/../layout/header.php'; ?>

<h1>Bienvenido a PedalPoint. Inicie Sesión</h1>

<?php if (!empty($error)): ?>
    <div class="alert alert-error">
        <?= htmlspecialchars($error) ?>
    </div>
<?php endif; ?>



<form method="post" action="index.php?c=authadmin&a=doLogin" class="form">
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
        Usuario por defecto: <strong>adminMaria</strong> — Contraseña: <strong>adminMaria</strong><br>
        (Se ejecuta <code>create_db.php</code> de forma automatica al carga INDEX).
    </p>
</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>