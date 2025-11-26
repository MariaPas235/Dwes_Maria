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
        // CORRECCIÓN CLAVE: Permite la entrada si hay sesión de administrador O usuario.
        if (!isset($_SESSION['admin']) && !isset($_SESSION['user'])) { 
            header('Location: index.php?c=authuser&a=login');
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

        if ($marca === '' || $modelo === '' || $tipo === '' || $color === '' || $priceStr === '') {
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

        if ($marca === '' || $modelo === '' || $tipo === '' || $color === '' || $priceStr === '') {
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

   public function exportPdf()
{
    // Cargar FPDF
    require_once __DIR__ . '/../fpdf186/fpdf.php';

    // Cargar modelo y conexión
    require_once __DIR__ . '/../models/Bikes.php';
    require_once __DIR__ . '/../config.php';

    // Obtener conexión SQLite
    $pdo = getPdo();

    // Obtener las bicicletas
    $bikes = Bikes::all($pdo);

    // Crear PDF
    $pdf = new FPDF();
    $pdf->AddPage();

    // Título
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, utf8_decode('Listado de Bicicletas'), 0, 1, 'C');
    $pdf->Ln(5);

    // Encabezados de tabla
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(20, 10, 'ID', 1);
    $pdf->Cell(40, 10, 'Marca', 1);
    $pdf->Cell(40, 10, 'Modelo', 1);
    $pdf->Cell(30, 10, 'Tipo', 1);
    $pdf->Cell(30, 10, 'Color', 1);
    $pdf->Cell(30, 10, 'Precio', 1);
    $pdf->Ln();

    // Contenido
    $pdf->SetFont('Arial', '', 12);

    foreach ($bikes as $b) {
        $pdf->Cell(20, 10, $b['id'], 1);
        $pdf->Cell(40, 10, utf8_decode($b['marca']), 1);
        $pdf->Cell(40, 10, utf8_decode($b['modelo']), 1);
        $pdf->Cell(30, 10, utf8_decode($b['tipo']), 1);
        $pdf->Cell(30, 10, utf8_decode($b['color']), 1);
        $pdf->Cell(30, 10, number_format((float)$b['price'], 2, ',', '.') . '€', 1);
        $pdf->Ln();
    }

    // Forzar descarga del PDF
    $pdf->Output('D', 'bicicletas.pdf');
}



    public function delete(): void
    {
        // Los métodos de CRUD (create, store, edit, update, delete) 
        // solo deben ser accesibles para el administrador. 
        // El chequeo aquí sigue siendo solo 'admin' para estas acciones.
        ensureSession();
        if (!isset($_SESSION['admin'])) {
            // Si el usuario no es admin, redirigir a la vista pública (index)
            header('Location: index.php?c=bikes&a=index'); 
            exit;
        }

        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($id > 0) {
            Bikes::delete($this->pdo, $id);
        }

        header('Location: index.php?c=bikes&a=index');
        exit;
    }
}