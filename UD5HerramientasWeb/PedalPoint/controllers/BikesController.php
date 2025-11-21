<?php
declare(strict_types=1);
require_once __DIR__ . '/../models/Bikes.php';

class BikesController
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
        $bikes = Bikes::all($this->pdo);
        require __DIR__ . '/../views/bikes/index.php';
    }

    public function create(): void
    {
        $this->requireLogin();
        $bike = ['id' => null, 'marca' => '','modelo' => '','tipo' => '','color' => '', 'price' => ''];
        $action = 'store';
        require __DIR__ . '/../views/bikes/form.php';
    }

    public function store(): void
    {
        $this->requireLogin();

        $marca = trim($_POST['marca'] ?? '');
        $modelo = trim($_POST['modelo'] ?? '');
        $tipo = trim($_POST['tipo'] ?? '');
        $color = trim($_POST['color'] ?? '');
        $priceStr = trim($_POST['price'] ?? '');

        if ($marca === '' ||$modelo === '' ||$tipo === '' ||$color === '' || $priceStr === '') {
            $error = 'Todos los campos son obligatorios.';
            $bikes = ['id' => null, 'marca' => $marca, 'modelo' => $modelo,'tipo' => $tipo,'color' => $color, 'price' => $priceStr];
            $action = 'store';
            require __DIR__ . '/../views/bikes/form.php';
            return;
        }

        $price = (float)$priceStr;

        Bikes::create($this->pdo, $marca, $modelo, $tipo, $color, $price);

        header('Location: index.php?c=bikes&a=index');
        exit;
    }

    public function edit(): void
    {
        $this->requireLogin();

        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $bikes = Bikes::find($this->pdo, $id);

        if (!$bikes) {
            http_response_code(404);
            echo 'Bicicleta no encontrada';
            return;
        }

        $action = 'update';
        require __DIR__ . '/../views/bikes/form.php';
    }

    public function update(): void
    {
        $this->requireLogin();

        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
        $marca = trim($_POST['marca'] ?? '');
        $modelo = trim($_POST['modelo'] ?? '');
        $tipo = trim($_POST['tipo'] ?? '');
        $color = trim($_POST['color'] ?? '');
        $priceStr = trim($_POST['price'] ?? '');

        if ($marca === '' ||$modelo === '' ||$tipo === '' ||$color === '' || $priceStr === '') {
            $error = 'Todos los campos son obligatorios.';
            $bikes = ['id' => null, 'marca' => $marca, 'modelo' => $modelo,'tipo' => $tipo,'color' => $color, 'price' => $priceStr];
            $action = 'update';
            require __DIR__ . '/../views/bikes/form.php';
            return;
        }

        $price = (float)$priceStr;

        Bikes::update($this->pdo, $id, $marca, $modelo, $tipo, $color, $price);

        header('Location: index.php?c=bikes&a=index');
        exit;
    }

    public function delete(): void
    {
        $this->requireLogin();

        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($id > 0) {
            Bikes::delete($this->pdo, $id);
        }

        header('Location: index.php?c=bikes&a=index');
        exit;
    }
}