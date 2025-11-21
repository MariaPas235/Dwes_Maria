<?php
declare(strict_types=1);

class Bikes
{
    public int $id;
    public string $marca;
    public string $modelo;
    public string $tipo;
    public string $color;
    public float $price;
    

    /**
     * Obtiene todas las bicicletas.
     */
    public static function all(PDO $pdo): array
    {
        $stmt = $pdo->query('SELECT * FROM bikes ORDER BY id DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Busca una bicicleta por ID.
     */
    public static function find(PDO $pdo, int $id): ?array
    {
        $stmt = $pdo->prepare('SELECT * FROM bikes WHERE id = :id');
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row ?: null;
    }

    /**
     * Crea una nueva bicicleta.
     */
    public static function create(PDO $pdo, string $marca, string $modelo , string $tipo , string $color , float $price): void
    {
        $stmt = $pdo->prepare('
            INSERT INTO bikes (marca, modelo, tipo, color, price)
            VALUES (:marca, :modelo, :tipo, :color, :price)
        ');
        $stmt->execute([
            ':marca' => $marca,
            ':modelo' => $modelo,
            ':tipo' => $tipo,
            ':color' => $color,
            ':price' => $price,
        ]);
    }

    /**
     * Actualiza una bicicleta existente.
     */
    public static function update(PDO $pdo, int $id, string $marca, string $modelo , string $tipo , string $color , float $price): void
    {
        $stmt = $pdo->prepare('
            UPDATE bikes
            SET marca = :marca, modelo = :modelo, tipo = :tipo, color = :color, price = :price
            WHERE id = :id
        ');
        $stmt->execute([
            ':marca' => $marca,
            ':modelo' => $modelo,
            ':tipo' => $tipo,
            ':color' => $color,
            ':price' => $price,
            ':id' => $id,
        ]);
    }

    /**
     * Elimina una bicicleta
     */
    public static function delete(PDO $pdo, int $id): void
    {
        $stmt = $pdo->prepare('DELETE FROM bikes WHERE id = :id');
        $stmt->execute([':id' => $id]);
    }
}