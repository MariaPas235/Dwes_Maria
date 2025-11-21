<?php
declare(strict_types=1);

//Ruta del archivo donde se crea la base de datos SQLite
const DB_PATH = __DIR__ . '/data/app.sqlite';

/**
 * Devuelve una conexión PDO a la base de datos SQLite.
 */

function getPdo(): PDO{
    static $pdo = null;

    if($pdo === null){
        $pdo = new PDO ('sqlite:' . DB_PATH);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    return $pdo;
}

/**
 * Asegura que la sesión esté iniciada.
 */
function ensureSession(): void {
    //si la sesión no está iniciada, la iniciamos
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}