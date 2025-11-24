<?php
declare(strict_types=1);

class Accesories
{
    public int $id;
    public string $nombre;
    public string $descripcion;
    public int $stock;
    public float $price;
    

    /**
     * Obtiene todos los accesorios.
     */
    public static function all(PDO $pdo): array
    {
        $stmt = $pdo->query('SELECT * FROM accessories  ORDER BY id DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Busca un accesorio por ID.
     */
    public static function find(PDO $pdo, int $id): ?array
    {
        $stmt = $pdo->prepare('SELECT * FROM accessories WHERE id = :id');
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row ?: null;
    }

    /**
     * Crea un nuevo accesorio.
     */
    public static function create(PDO $pdo, string $nombre, string $descripcion , int $stock , float $price): void
    {
        $stmt = $pdo->prepare('
            INSERT INTO accessories (nombre, descripcion, stock, price)
            VALUES (:nombre, :descripcion, :stock, :price)
        ');
        $stmt->execute([
            ':nombre' => $nombre,
            ':descripcion' => $descripcion,
            ':stock' => $stock,
            ':price' => $price,
        ]);
    }

    /**
     * Actualiza un accesorio existente.
     */
    public static function update(PDO $pdo, int $id, string $nombre, string $descripcion , int $stock , float $price): void
    {
        $stmt = $pdo->prepare('
            UPDATE accessories
            SET nombre = :nombre, descripcion = :descripcion, stock = :stock, price = :price
            WHERE id = :id
        ');
        $stmt->execute([
            ':nombre' => $nombre,
            ':descripcion' => $descripcion,
            ':stock' => $stock,
            ':price' => $price,
            ':id' => $id,
        ]);
    }

    /**
     * Elimina un accesorio
     */
    public static function delete(PDO $pdo, int $id): void
    {
        $stmt = $pdo->prepare('DELETE FROM accessories WHERE id = :id');
        $stmt->execute([':id' => $id]);
    }
}