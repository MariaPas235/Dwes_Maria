<?php require __DIR__ . '/../layout/header.php'; ?>

<?php
// Si existe $_SESSION['admin'], es administrador
$isAdmin = isset($_SESSION['admin']);
?>

<h1>Listado de bicicletas</h1>

<!-- Botones superiores -->
<p>
    <?php if ($isAdmin): ?>
        <a href="index.php?c=bikes&a=create" class="button">Nueva bicicleta</a>
    <?php endif; ?>

    <!-- Botón para exportar PDF -->
    <a href="index.php?c=bikes&a=exportPdf" class="button">Exportar PDF</a>
</p>

<?php if (empty($bikes)): ?>
    <p>No hay bicicletas todavía.</p>
<?php else: ?>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Tipo</th>
            <th>Color</th>
            <th>Precio (€)</th>
            <?php if ($isAdmin): ?>
                <th>Acciones</th>
            <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($bikes as $b): ?>
            <tr>
                <td><?= htmlspecialchars($b['id']) ?></td>
                <td><?= htmlspecialchars($b['marca']) ?></td>
                <td><?= htmlspecialchars($b['modelo']) ?></td>
                <td><?= htmlspecialchars($b['tipo']) ?></td>
                <td><?= htmlspecialchars($b['color']) ?></td>
                <td><?= number_format((float)$b['price'], 2, ',', '.') ?></td>

                <?php if ($isAdmin): ?>
                <td>
                    <a href="index.php?c=bikes&a=edit&id=<?= urlencode($b['id']) ?>">Editar</a>
                    <a href="index.php?c=bikes&a=delete&id=<?= urlencode($b['id']) ?>"
                       onclick="return confirm('¿Seguro que quieres eliminar este producto?');">
                        Eliminar
                    </a>
                </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php require __DIR__ . '/../layout/footer.php'; ?>
