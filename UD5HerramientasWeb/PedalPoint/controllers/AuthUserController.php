<?php
declare(strict_types=1);
require_once __DIR__ . '/../models/User.php'; 

class AuthUserController{
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
        require __DIR__ . '/../views/authuser/login.php';
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
            require __DIR__ . '/../views/authuser/login.php';
            return;
        }

        $user = User::findByUsername($this->pdo, $username);

        if (!$user || !password_verify($password, $user->getPasswordHash())) {
            $error = 'Usuario o contraseña incorrectos.';
            require __DIR__ . '/../views/authuser/login.php';
            return;
        }

        $_SESSION['user'] = [
            'id' => $user->getId(),
            'username' => $user->getUsername(),
        ];

        header('Location: index.php?c=product&a=index');
        exit;
    }

    /**
     * Muestra formulario de registro.
     */
    public function register(): void
    {
        $error = $_GET['error'] ?? null;
        require __DIR__ . '/../views/authuser/register.php';
    }

    /**
     * Procesa el registro de usuario.
     */
    public function doRegister(): void
    {
        ensureSession();

        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if ($username === '' || $password === '') {
            $error = 'Debes rellenar ambos campos.';
            require __DIR__ . '/../views/authuser/register.php';
            return;
        }

        // Comprobar si existe
        $exists = User::findByUsername($this->pdo, $username);
        if ($exists) {
            $error = 'Ese usuario ya existe.';
            require __DIR__ . '/../views/authuser/register.php';
            return;
        }

        // Crear usuario
        $stmt = $this->pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->execute([
            $username,
            password_hash($password, PASSWORD_BCRYPT)
        ]);

        header("Location: index.php?c=authuser&a=login");
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
        header('Location: index.php?c=authuser&a=login');
        exit;
    }
}