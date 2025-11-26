<?php
require_once 'models/User.php';

class AuthUserController
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    // ============================
    //   FORMULARIO LOGIN
    // ============================
    public function login()
    {
        include 'views/authUser/login.php';
    }


    // ============================
    //   FORMULARIO REGISTRO
    // ============================
    public function register()
    {
        include 'views/authUser/register.php';
    }


    // ============================
    //   PROCESAR REGISTRO USUARIO
    // ============================
    public function doRegister()
    {
        if (!isset($_POST["username"], $_POST["password"])) {
            die("Error: faltan datos del formulario.");
        }

        $username = trim($_POST["username"]);
        $password = $_POST["password"];

        // Encriptar contraseña
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        try {
            $query = $this->pdo->prepare("
                INSERT INTO users (username, password_hash) 
                VALUES (:username, :password_hash)
            ");

            $query->bindParam(":username", $username);
            $query->bindParam(":password_hash", $passwordHash);

            $query->execute();

            header("Location: index.php?c=authuser&a=login");
            exit;

        } catch (PDOException $e) {
            die("Error al registrar usuario: " . $e->getMessage());
        }
    }


    // ============================
    //   PROCESAR LOGIN USUARIO
    // ============================
   


    public function doLogin(): void
    {
        ensureSession();

        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if ($username === '' || $password === '') {
            $error = 'Debes rellenar usuario y contraseña.';
            require __DIR__ . '/../views/authUser/login.php';
            return;
        }

        $user = User::findByUsername($this->pdo, $username);

        if (!$user || !password_verify($password, $user->getPasswordHash())) {
            $error = 'Usuario o contraseña incorrectos.';
            require __DIR__ . '/../views/authUser/login.php';
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
        header('Location: index.php?c=home&a=index');
        exit;
    }
}