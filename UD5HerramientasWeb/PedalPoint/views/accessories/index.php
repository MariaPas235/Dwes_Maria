<?php require __DIR__ . '/../layout/header.php'; ?>

<?php
// El usuario es admin si existe la sesión 'admin'
$isAdmin = isset($_SESSION['admin']);

// Calculamos el total de stock si hay accesorios
$totalStock = 0;
if (!empty($accessories)) {
    foreach ($accessories as $a) {
        $totalStock += (int)$a['stock'];
    }
}
?>

<h1>Listado de accesorios</h1>

<!-- Botón de crear accesorio: solo para admin -->
<?php if ($isAdmin): ?>
    <p>
        <a href="index.php?c=accessories&a=create" class="button">Nuevo accesorio</a>
    </p>
<?php endif; ?>
<a href="index.php?c=accessories&a=exportPdf" class="button">Exportar PDF</a>

<?php if (empty($accessories)): ?>
    <p>No hay accesorios todavía.</p>
<?php else: ?>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Stock</th>
            <th>Precio (€)</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($accessories as $a): ?>
            <tr>
                <td><?= htmlspecialchars($a['id']) ?></td>
                <td><?= htmlspecialchars($a['nombre']) ?></td>
                <td><?= htmlspecialchars($a['descripcion']) ?></td>
                <td><?= number_format((int)$a['stock']) ?></td>
                <td><?= number_format((float)$a['price'], 2, ',', '.') ?></td>
                <td>
                    <?php if ($isAdmin): ?>
                        <a href="index.php?c=accessories&a=edit&id=<?= urlencode($a['id']) ?>">Editar</a>
                        <a href="index.php?c=accessories&a=delete&id=<?= urlencode($a['id']) ?>"
                           onclick="return confirm('¿Seguro que quieres eliminar este producto?');">
                            Eliminar
                        </a>
                    <?php else: ?>
                        <p>--</p>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Recuento total de stock -->
    <p style="text-align:right; font-weight:bold;">
        Total de stock: <?= number_format($totalStock) ?>
    </p>

<?php endif; ?>

<?php require __DIR__ . '/../layout/footer.php'; ?>
