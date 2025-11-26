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
        // CORRECCIÓN CLAVE: Permite la entrada si hay sesión de administrador O usuario.
        if (!isset($_SESSION['admin']) && !isset($_SESSION['user'])) { 
            header('Location: index.php?c=authuser&a=login');
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
        // Los métodos de CRUD (create, store, edit, update, delete) 
        // solo deben ser accesibles para el administrador. 
        ensureSession();
        if (!isset($_SESSION['admin'])) {
            header('Location: index.php?c=authuser&a=login');
            exit;
        }
        
        $accessories = ['id' => null, 'nombre' => '','descripcion' => '','stock' => '', 'price' => ''];
        $action = 'store';
        require __DIR__ . '/../views/accessories/form.php';
    }

    public function store(): void
    {
        // Solo administradores
        ensureSession();
        if (!isset($_SESSION['admin'])) {
            header('Location: index.php?c=authuser&a=login');
            exit;
        }

        $nombre = trim($_POST['nombre'] ?? '');
        $descripcion = trim($_POST['descripcion'] ?? '');
        $stockStr = trim($_POST['stock'] ?? '');
        $priceStr = trim($_POST['price'] ?? '');

        if ($nombre === '' || $descripcion === '' || $stockStr === '' || $priceStr === '') {
            $error = 'Todos los campos son obligatorios.';
            $accessories = ['id' => null, 'nombre' => $nombre, 'descripcion' => $descripcion,'stock' => $stockStr, 'price' => $priceStr];
            $action = 'store';
            require __DIR__ . '/../views/accessories/form.php';
            return;
        }
        $stock = (int)$stockStr;
        $price = (float)$priceStr;


        Accesories::create($this->pdo, $nombre, $descripcion, $stock, $price);

        header('Location: index.php?c=accessories&a=index');
        exit;
    }

    public function edit(): void
    {
        // Solo administradores
        ensureSession();
        if (!isset($_SESSION['admin'])) {
            header('Location: index.php?c=authuser&a=login');
            exit;
        }

        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $accessories = Accesories::find($this->pdo, $id);

        if (!$accessories) {
            http_response_code(404);
            echo 'Accesorio no encontrado';
            return;
        }

        $action = 'update';
        require __DIR__ . '/../views/accessories/form.php';
    }

    public function update(): void
    {
        // Solo administradores
        ensureSession();
        if (!isset($_SESSION['admin'])) {
            header('Location: index.php?c=authuser&a=login');
            exit;
        }

        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
        $nombre = trim($_POST['nombre'] ?? '');
        $descripcion = trim($_POST['descripcion'] ?? '');
        $stockStr = trim($_POST['stock'] ?? '');
        $priceStr = trim($_POST['price'] ?? '');

        if ($nombre === '' || $descripcion === '' || $stockStr === '' || $priceStr === '') {
            $error = 'Todos los campos son obligatorios.';
            $accessories = ['id' => null, 'nombre' => $nombre, 'descripcion' => $descripcion,'stock' => $stockStr,'price' => $priceStr];
            $action = 'update';
            require __DIR__ . '/../views/accessories/form.php';
            return;
        }
        $stock = (int)$stockStr;
        $price = (float)$priceStr;

        Accesories::update($this->pdo, $id, $nombre, $descripcion, $stock, $price);

        header('Location: index.php?c=accessories&a=index');
        exit;
    }

    public function exportPdf()
{
    // Cargar FPDF
    require_once __DIR__ . '/../fpdf186/fpdf.php';
    // Modelo de accesorios
    require_once __DIR__ . '/../models/Accesories.php';
    // Conexión
    require_once __DIR__ . '/../config.php';

    $pdo = getPdo();

    // Obtener todos los accesorios
    $accessories = Accesories::all($pdo);

    // Crear PDF
    $pdf = new FPDF();
    $pdf->AddPage();

    // Título
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, utf8_decode('Listado de Accesorios'), 0, 1, 'C');
    $pdf->Ln(5);

    // Encabezados de tabla
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(20, 10, 'ID', 1);
    $pdf->Cell(50, 10, 'Nombre', 1);
    $pdf->Cell(60, 10, 'Descripción', 1);
    $pdf->Cell(25, 10, 'Stock', 1);
    $pdf->Cell(30, 10, 'Precio', 1);
    $pdf->Ln();

    // Contenido
    $pdf->SetFont('Arial', '', 12);
    foreach ($accessories as $a) {
        $pdf->Cell(20, 10, $a['id'], 1);
        $pdf->Cell(50, 10, utf8_decode($a['nombre']), 1);
        $pdf->Cell(60, 10, utf8_decode($a['descripcion']), 1);
        $pdf->Cell(25, 10, $a['stock'], 1);
        $pdf->Cell(30, 10, number_format((float)$a['price'], 2, ',', '.') . '€', 1);
        $pdf->Ln();
    }

    // Forzar descarga
    $pdf->Output('D', 'accesorios.pdf');
}

    public function delete(): void
    {
        // Los métodos de CRUD (create, store, edit, update, delete) 
        // solo deben ser accesibles para el administrador. 
        ensureSession();
        if (!isset($_SESSION['admin'])) {
            // Si el usuario no es admin, redirigir a la vista pública (index)
            header('Location: index.php?c=accessories&a=index'); 
            exit;
        }

        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($id > 0) {
            Accesories::delete($this->pdo, $id);
        }

        header('Location: index.php?c=accessories&a=index');
        exit;
    }
}