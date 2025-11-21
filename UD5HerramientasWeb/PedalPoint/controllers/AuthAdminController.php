<?php
declare(strict_types=1);
require_once __DIR__ . '/../models/Admin.php'; 

class AuthAdminController{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Muestra el formulario de login.
     */
    public function login(): void
    {
        $error = $_GET['error'] ?? null;
        require __DIR__ . '/../views/authAdmin/login.php';
    }

    /**
     * Procesa el login.
     */
    public function doLogin(): void
    {
        ensureSession();

        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if ($username === '' || $password === '') {
            $error = 'Debes rellenar usuario y contraseña.';
            require __DIR__ . '/../views/authAdmin/login.php';
            return;
        }

        $admin = Admin::findByUsername($this->pdo, $username);

        if (!$admin || !password_verify($password, $admin->getPasswordHash())) {
            $error = 'Usuario o contraseña incorrectos.';
            require __DIR__ . '/../views/authAdmin/login.php';
            return;
        }

        $_SESSION['admin'] = [
            'id' => $admin->getId(),
            'username' => $admin->getUsername(),
        ];

        header('Location: index.php?c=product&a=index');
        exit;
    }

    /**
     * Cierra la sesión.
     */
    public function logout(): void
    {
        ensureSession();
        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }
        session_destroy();
        header('Location: index.php?c=authAdmin&a=login');
        exit;
    }
}