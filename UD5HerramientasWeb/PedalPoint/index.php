<?php
declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/models/Admin.php';
require_once __DIR__ . '/controllers/AuthAdminController.php';
require_once __DIR__ . '/controllers/ProductController.php';
require_once __DIR__ . '/controllers/BikesController.php';
require_once __DIR__ . '/controllers/AccesoriesController.php';
//si no se ha creado la base de datos, la creamos
if (!file_exists(__DIR__ . '/data/app.sqlite')) {
    require_once __DIR__ . '/create_db.php';
}

//iniciamos la sesión si no está iniciada
ensureSession();

$pdo = getPdo();

// Obtenermos el controlador y la acción desde la URL
$controllerName = $_GET['c'] ?? null;
$action = $_GET['a'] ?? null;

// Si no hay usuario autenticado, forzamos ir al login
//in_array($action, ['login', 'doLogin'], true sirve para permitir acceder a
// esas acciones sin estar autenticado
if (!isset($_SESSION['admin']) && !($controllerName === 'authadmin' && in_array($action, ['login', 'doLogin'], true))) {
    $controllerName = 'authadmin';
    $action = 'login';
}

// Valores por defecto
// Si no hay sesión, vamos a auth/login
if ($controllerName === null) {
    $controllerName = isset($_SESSION['admin']) ? 'product' : 'auth';
}
if ($action === null) {
    $action = ($controllerName === 'authadmin') ? 'login' : 'index';
}

//creamos las instancias de los controladores
$authAdminController = new AuthAdminController($pdo);
$productController = new ProductController($pdo);

switch ($controllerName) {
    case 'authadmin':
        switch ($action) {
            case 'login':
                $authAdminController->login();
                break;
            case 'doLogin':
                $authAdminController->doLogin();
                break;
            case 'logout':
                $authAdminController->logout();
                break;
            default:
                http_response_code(404);
                echo 'Acción de autenticación no encontrada';
        }
        break;

    case 'product':
        switch ($action) {
            case 'index':
                $productController->index();
                break;
        }
        break;

    case 'bikes':
        $bikesController = new BikesController($pdo);
        switch ($action) {
            case 'index':
                $bikesController->index();
                break;
            case 'create':
                $bikesController->create();
                break;
            case 'store':
                $bikesController->store();
                break;
            case 'edit':
                $bikesController->edit();
                break;
            case 'update':
                $bikesController->update();
                break;
            case 'delete':
                $bikesController->delete();
                break;
            default:
                http_response_code(404);
                echo 'Acción de bicicletas no encontrada';
        }
        break;

     case 'accessories':
        $accessoriesController = new AccesoriesController($pdo);
        switch ($action) {
            case 'index':
                $accessoriesController->index();
                break;
            case 'create':
                $accessoriesController->create();
                break;
            case 'store':
                $accessoriesController->store();
                break;
            case 'edit':
                $accessoriesController->edit();
                break;
            case 'update':
                $accessoriesController->update();
                break;
            case 'delete':
                $accessoriesController->delete();
                break;
            default:
                http_response_code(404);
                echo 'Acción de accesorios no encontrado';
        }
        break;

    default:
        http_response_code(404);
        echo 'Controlador no encontrado';
}