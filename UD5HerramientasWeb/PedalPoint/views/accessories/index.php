<?php require __DIR__ . '/../layout/header.php'; ?>

<h1>Listado de accesorios</h1>

<p>
    <a href="index.php?c=accessories&a=create" class="button">Nuevo accesorio</a>
</p>

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
                    <a href="index.php?c=accessories&a=edit&id=<?= urlencode($a['id']) ?>">Editar</a>
                    <a href="index.php?c=accessories&a=delete&id=<?= urlencode($a['id']) ?>"
                       onclick="return confirm('¿Seguro que quieres eliminar este producto?');">
                        Eliminar
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php require __DIR__ . '/../layout/footer.php'; ?>