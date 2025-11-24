<?php require __DIR__ . '/../layout/header.php'; ?>

<h1><?= $action === 'store' ? 'Nuevo accesorio' : 'Editar accesorio' ?></h1>

<?php if (!empty($error)): ?>
    <div class="alert alert-error">
        <?= htmlspecialchars($error) ?>
    </div>
<?php endif; ?>

<form method="post" action="index.php?c=accessories&a=<?= htmlspecialchars($action) ?>" class="form">
    <?php if (!empty($accessories['id'])): ?>
        <input type="hidden" name="id" value="<?= htmlspecialchars($accessories['id']) ?>">
    <?php endif; ?>

    <label>
        Nombre
        <input type="text" name="nombre" value="<?= htmlspecialchars((string) ($accessories['nombre'] ?? '')) ?>"
            required>
    </label>

    <label>
        Descripción
        <input type="text" name="descripcion"
            value="<?= htmlspecialchars((string) ($accessories['descripcion'] ?? '')) ?>" required>
    </label>

    

    <label>
        Stock
        <input type="number" step="1" min="0" name="stock" value="<?= htmlspecialchars((string) $accessories['stock']) ?>"
            required>
    </label>

    <label>
        Precio (€)
        <input type="number" step="0.01" min="0" name="price"
            value="<?= htmlspecialchars((string) $accessories['price']) ?>" required>
    </label>

    <button type="submit">
        <?= $action === 'store' ? 'Crear' : 'Actualizar' ?>
    </button>

    <a href="index.php?c=accessories&a=index" class="button button-secondary">Volver</a>
</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>