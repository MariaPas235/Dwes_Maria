<?php
ensureSession();
$admin = $_SESSION['admin'] ?? null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Productos con Login (PHP + SQLite)</title>
    <style>
            header {
                background-color: #4CAF50; /* Color de fondo */
                padding: 20px;
                color: white;
                text-align: center;
                font-size: 24px;
            }
    </style>
</head>
<body>
<nav class="nav">
    <div class="nav-right">
        <?php if ($admin): ?>
            
            <header>
                <span class="nav-user">Hola, <?= htmlspecialchars($admin['username']) ?></span>
                <a href="index.php?c=bikes&a=index">Bicicletas</a>
                <a href="index.php?c=accessories&a=index">Accesorios</a>
                <a href="index.php?c=authadmin&a=logout">Cerrar sesión</a>
            </header>
            
        <?php else: ?>
            <a href="index.php?c=authadmin&a=login">Login</a>
        <?php endif; ?>
    </div>
</nav>
<main class="container"></main>