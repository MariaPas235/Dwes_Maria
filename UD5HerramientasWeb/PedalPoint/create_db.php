<?php
declare(strict_types=1);

require_once __DIR__ . '/config.php';

//Creamos la carpeta data si no existe 
$dataDir = __DIR__ . '/data';
if (!is_dir($dataDir)) {
    mkdir($dataDir, 0777, true);
}

$pdo = getPdo();

//Crearción tabla admin
$pdo->exec("
    CREATE TABLE IF NOT EXISTS admins (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL UNIQUE,
    password_hash TEXT NOT NULL
    )
");

//Crearción tabla usuarios 
$pdo->exec("
    CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL UNIQUE,
    password_hash TEXT NOT NULL
    )
");


// Crear tabla de bicicletas 
$pdo->exec("
    CREATE TABLE IF NOT EXISTS bikes (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        marca TEXT NOT NULL,
        modelo TEXT NOT NULL,
        tipo TEXT NOT NULL,
        color TEXT NOT NULL,
        price REAL NOT NULL
    )
");

// Crear tabla de accesorios
$pdo->exec("
    CREATE TABLE IF NOT EXISTS accessories (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nombre TEXT NOT NULL,
        descripcion TEXT NOT NULL,
        stock REAL NOT NULL,
        price REAL NOT NULL
    )
");


//Creación de admin por defecto si no existe 

$stmt = $pdo->prepare('SELECT COUNT(*) FROM users WHERE username = :u');
$stmt->execute([':u' => 'adminMaria']);
$exists = (int)$stmt->fetchColumn();

if ($exists === 0) {
    $passwordHash = password_hash('adminMaria', PASSWORD_DEFAULT);
    $insert = $pdo->prepare('INSERT INTO users (username, password_hash) VALUES (:u, :p)');
    $insert->execute([
        ':u' => 'adminMaria',
        ':p' => $passwordHash,
    ]);
    echo "Base de datos creada y usuario 'adminMaria' con contraseña 'adminMaria' generado." . PHP_EOL;
} else {
    echo "Base de datos ya existente. Usuario 'admin' ya creado." . PHP_EOL;
}
