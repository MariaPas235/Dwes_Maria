<?php
// Asegúrate de que ensureSession() está definida y se ejecuta antes
// Aquí asumo que ensureSession() ya se ejecutó en index.php
ensureSession();

// Determina la sesión activa y el nombre de usuario
$admin_session = $_SESSION['admin'] ?? null;
$user_session = $_SESSION['user'] ?? null;

$logged_in = $admin_session || $user_session; // True si hay sesión de admin O usuario
$current_user = $admin_session ?? $user_session; // Usa la sesión de admin o, si no, la de usuario

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Productos con Login (PHP + SQLite)</title>
   <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
<nav class="nav">
    <div class="nav-right">
        <?php if ($logged_in): ?>
            
            <header>
                <!-- Usa $current_user para saludar -->
                <span class="nav-user">Hola, <?= htmlspecialchars($current_user['username']) ?></span>
                
                <!-- Enlaces DE ADMIN (con CRUD) -->
                <?php if ($admin_session): ?>
                    <a href="index.php?c=bikes&a=index">Bicicletas (Admin)</a>
                    <a href="index.php?c=accessories&a=index">Accesorios (Admin)</a>
                    <!-- El logout de admin se puede reutilizar para cerrar todas las sesiones -->
                    <a href="index.php?c=authadmin&a=logout">Cerrar sesión (Admin)</a> 
                <?php endif; ?>

                <!-- Enlaces de USUARIO NORMAL (solo vista) -->
                <?php if ($user_session): ?>
                    <!-- CAMBIO: Se sustituye el enlace genérico 'Productos' por 'Bicicletas' y 'Accesorios' -->
                    <a href="index.php?c=bikes&a=index">Bicicletas</a>
                    <a href="index.php?c=accessories&a=index">Accesorios</a>
                    <a href="index.php?c=authuser&a=logout">Cerrar sesión</a>
                <?php endif; ?>

            </header>
            
        
        <?php endif; ?>
    </div>
</nav>
<main class="container">
<!-- El resto de la vista debe empezar aquí, no incluir <html>, <head>, etc. de nuevo -->