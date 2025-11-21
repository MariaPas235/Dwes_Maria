<?php
declare(strict_types=1);

class ProductController
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    private function requireLogin(): void
    {
        ensureSession();
        if (!isset($_SESSION['admin'])) {
            header('Location: index.php?c=authadmin&a=login');
            exit;
        }
    }

    public function index(): void
    {
        $this->requireLogin();
        require __DIR__ . '/../views/product/index.php';
    }

   
}