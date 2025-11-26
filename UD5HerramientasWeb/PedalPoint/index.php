<?php 
declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/models/Admin.php';
require_once __DIR__ . '/models/User.php';
require_once __DIR__ . '/controllers/AuthAdminController.php';
require_once __DIR__ . '/controllers/AuthUserController.php';
require_once __DIR__ . '/controllers/ProductController.php';
require_once __DIR__ . '/controllers/BikesController.php';
require_once __DIR__ . '/controllers/AccesoriesController.php';
require_once __DIR__ . '/controllers/HomeController.php';

// Crear la BD si no existe
if (!file_exists(__DIR__ . '/data/app.sqlite')) {
    require_once __DIR__ . '/create_db.php';
}

// Iniciar sesión
ensureSession();

// =====================
// LIMPIAR SESIONES INCONSISTENTES
// =====================
// Nunca deberían coexistir admin y user al mismo tiempo
if (isset($_SESSION['admin']) && isset($_SESSION['user'])) {
    unset($_SESSION['admin']); // dejamos solo al usuario logueado
}

$pdo = getPdo();

// =====================
// OBTENER CONTROLADOR Y ACCIÓN DESDE LA URL
// =====================
$controllerName = $_GET['c'] ?? null;
$action = $_GET['a'] ?? null;

if ($controllerName === null) {
    if (isset($_SESSION['admin'])) {
        $controllerName = 'product';
    } elseif (isset($_SESSION['user'])) {
        $controllerName = 'product';
    } else {
        $controllerName = 'home';
    }
}



if ($action === null) {
    $action = 'index';
}

// ==========================================
// 2. CONTROL DE ACCESO PRE-SWITCH
// ==========================================
$publicControllers = ['home', 'authadmin', 'authuser'];

// Si no hay sesión de admin ni de usuario
if (!isset($_SESSION['admin']) && !isset($_SESSION['user'])) {
    if (!in_array($controllerName, $publicControllers, true)) {
        $controllerName = 'home';
        $action = 'index';
    }
}

// ==========================================
// 3. INSTANCIAS DE CONTROLADORES
// ==========================================
$authAdminController = new AuthAdminController($pdo);
$authUserController = new AuthUserController($pdo);
$productController = new ProductController($pdo);
$homeController = new HomeController();

// ==========================================
// 4. ROUTER PRINCIPAL
// ==========================================
switch ($controllerName) {

    case 'home':
        $homeController->index();
        break;

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
                echo "Acción de autenticación admin no encontrada";
        }
        break;

    case 'authuser':
        switch ($action) {
            case 'login':
                $authUserController->login();
                break;
            case 'doLogin':
                $authUserController->doLogin();
                break;
            case 'register':
                $authUserController->register();
                break;
            case 'doRegister':
                $authUserController->doRegister();
                break;
            case 'logout':
                $authUserController->logout();
                break;
            default:
                http_response_code(404);
                echo "Acción de usuario no encontrada";
        }
        break;

    case 'product':
        switch ($action) {
            case 'index':
                $productController->index();
                break;
            default:
                http_response_code(404);
                echo "Acción de productos no encontrada";
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
            case 'exportPdf':
                $bikesController->exportPdf();
                break;
            default:
                http_response_code(404);
                echo "Acción de bicicletas no encontrada";
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
            case 'exportPdf':
                $accessoriesController->exportPdf();
                break;
            default:
                http_response_code(404);
                echo "Acción de accesorios no encontrada";
        }
        break;

    default:
        http_response_code(404);
        echo "Controlador no encontrado";
}
