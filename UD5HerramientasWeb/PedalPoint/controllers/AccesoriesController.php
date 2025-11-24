<?php
declare(strict_types=1);
require_once __DIR__ . '/../models/Accesories.php';

class AccesoriesController
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
        $accessories = Accesories::all($this->pdo);
        require __DIR__ . '/../views/accessories/index.php';
    }

    public function create(): void
    {
        $this->requireLogin();
        $accessories = ['id' => null, 'nombre' => '','descripcion' => '','stock' => '', 'price' => ''];
        $action = 'store';
        require __DIR__ . '/../views/accessories/form.php';
    }

    public function store(): void
    {
        $this->requireLogin();

        $nombre = trim($_POST['nombre'] ?? '');
        $descripcion = trim($_POST['descripcion'] ?? '');
        $stockStr = trim($_POST['stock'] ?? '');
        $priceStr = trim($_POST['price'] ?? '');

        if ($nombre === '' ||$descripcion === '' ||$stockStr === '' || $priceStr === '') {
            $error = 'Todos los campos son obligatorios.';
            $bikes = ['id' => null, 'nombre' => $nombre, 'descripcion' => $descripcion,'stock' => $stockStr, 'price' => $priceStr];
            $action = 'store';
            require __DIR__ . '/../views/accessories/form.php';
            return;
        }
        $stock = (int)$stockStr;
        $price = (float)$priceStr;


        Accesories::create($this->pdo, $nombre, $descripcion, $stock,  $price);

        header('Location: index.php?c=accessories&a=index');
        exit;
    }

    public function edit(): void
    {
        $this->requireLogin();

        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $accessories = Accesories::find($this->pdo, $id);

        if (!$accessories) {
            http_response_code(404);
            echo 'Accesorio no encontrada';
            return;
        }

        $action = 'update';
        require __DIR__ . '/../views/accessories/form.php';
    }

    public function update(): void
    {
        $this->requireLogin();

        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
        $nombre = trim($_POST['nombre'] ?? '');
        $descripcion = trim($_POST['descripcion'] ?? '');
        $stockStr = trim($_POST['stock'] ?? '');
        $priceStr = trim($_POST['price'] ?? '');

        if ($nombre === '' ||$descripcion === '' ||$stockStr === '' || $priceStr === '') {
            $error = 'Todos los campos son obligatorios.';
            $accessories = ['id' => null, 'nombre' => $nombre, 'descripcion' => $descripcion,'stock' => $stockStr,'price' => $priceStr];
            $action = 'update';
            require __DIR__ . '/../views/accessories/form.php';
            return;
        }
        $stock = (int)$stockStr;
        $price = (float)$priceStr;

        Accesories::update($this->pdo, $id, $nombre, $descripcion, $stock,  $price);

        header('Location: index.php?c=accessories&a=index');
        exit;
    }

    public function delete(): void
    {
        $this->requireLogin();

        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($id > 0) {
            Accesories::delete($this->pdo, $id);
        }

        header('Location: index.php?c=accessories&a=index');
        exit;
    }
}