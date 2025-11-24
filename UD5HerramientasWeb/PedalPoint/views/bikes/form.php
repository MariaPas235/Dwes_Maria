<?php require __DIR__ . '/../layout/header.php'; ?>

<h1><?= $action === 'store' ? 'Nueva bicicleta' : 'Editar bicicleta' ?></h1>

<?php if (!empty($error)): ?>
    <div class="alert alert-error">
        <?= htmlspecialchars($error) ?>
    </div>
<?php endif; ?>

<form method="post" action="index.php?c=bikes&a=<?= htmlspecialchars($action) ?>" class="form">
    <?php if (!empty($bikes['id'])): ?>
        <input type="hidden" name="id" value="<?= htmlspecialchars($bikes['id']) ?>">
    <?php endif; ?>

    <label>
        Marca
        <select name="marca" required>
            <option value="">Selecciona una marca</option>
            <option value="Trek" <?= ($bikes['marca'] ?? '') === 'Trek' ? 'selected' : '' ?>>Trek</option>
            <option value="Specialized" <?= ($bikes['marca'] ?? '') === 'Specialized' ? 'selected' : '' ?>>Specialized
            </option>
            <option value="Giant" <?= ($bikes['marca'] ?? '') === 'Giant' ? 'selected' : '' ?>>Giant</option>
            <option value="Cannondale" <?= ($bikes['marca'] ?? '') === 'Cannondale' ? 'selected' : '' ?>>Cannondale
            </option>
            <option value="Orbea" <?= ($bikes['marca'] ?? '') === 'Orbea' ? 'selected' : '' ?>>Orbea</option>
        </select>
    </label>

    <label>
        Modelo
        <select name="modelo" required>
            <option value="">Selecciona un modelo</option>
            <option value="Marlin 5" <?= ($bikes['modelo'] ?? '') === 'Marlin 5' ? 'selected' : '' ?>>Marlin 5</option>
            <option value="Rockhopper" <?= ($bikes['modelo'] ?? '') === 'Rockhopper' ? 'selected' : '' ?>>Rockhopper
            </option>
            <option value="Escape 3" <?= ($bikes['modelo'] ?? '') === 'Escape 3' ? 'selected' : '' ?>>Escape 3</option>
            <option value="Bad Boy 3" <?= ($bikes['modelo'] ?? '') === 'Bad Boy 3' ? 'selected' : '' ?>>Bad Boy 3</option>
            <option value="Orbea Alma" <?= ($bikes['modelo'] ?? '') === 'Orbea Alma' ? 'selected' : '' ?>>Orbea Alma
            </option>
        </select>
    </label>

    <label>
        Tipo
        <select name="tipo" required>
            <option value="">Selecciona un tipo</option>
            <option value="Montaña" <?= ($bikes['tipo'] ?? '') === 'Montaña' ? 'selected' : '' ?>>Montaña</option>
            <option value="Carretera" <?= ($bikes['tipo'] ?? '') === 'Carretera' ? 'selected' : '' ?>>Carretera</option>
            <option value="Híbrida" <?= ($bikes['tipo'] ?? '') === 'Híbrida' ? 'selected' : '' ?>>Híbrida</option>
            <option value="Eléctrica" <?= ($bikes['tipo'] ?? '') === 'Eléctrica' ? 'selected' : '' ?>>Eléctrica</option>
            <option value="BMX" <?= ($bikes['tipo'] ?? '') === 'BMX' ? 'selected' : '' ?>>BMX</option>
        </select>
    </label>

    <label>
        Color
        <input type="text" name="color"value="<?= htmlspecialchars((string) ($bikes['color'] ?? '')) ?>" required>
    </label>

    <label>
        Precio (€)
        <input type="number" step="0.01" min="0" name="price" value="<?= htmlspecialchars((string) $bikes['price']) ?>"
            required>
    </label>

    <button type="submit">
        <?= $action === 'store' ? 'Crear' : 'Actualizar' ?>
    </button>

    <a href="index.php?c=bikes&a=index" class="button button-secondary">Volver</a>
</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>