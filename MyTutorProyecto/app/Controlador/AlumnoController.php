<?php
use Modelo\Alumno;
require_once __DIR__ . '/../Modelo/Alumno.php';
require_once __DIR__ . '/../Interfaz/AlumnoInterface.php';


class AlumnoController implements AlumnoInterface
{
    public function showForm()
    {
        require_once __DIR__ . '/../Vista/formRegisAlum.php';
    }

    public function handleForm()
    {
        // Validar si el formulario fue enviado desde el botón "Iniciar Sesión"
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnIniciarSesion'])) {
            $nombre = $_POST['nombre'] ?? '';
            $email = $_POST['email'] ?? '';
            $contraseña = $_POST['contraseña'] ?? '';
            $edad = $_POST['edad'] ?? '';

            // Crear un nuevo alumno sin clases todavía
            $alumno = new Alumno($nombre, $email, $contraseña, $edad, []);

            // Ir a la vista de resultado
            require_once __DIR__ . '/../Vista/resultAlum.php';
        } 
        // ✅ Cuando se envía el formulario de selección de clase
        elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clases'])) {
            $nombre = $_POST['nombre'] ?? '';
            $email = $_POST['email'] ?? '';
            $contraseña = $_POST['contraseña'] ?? '';
            $edad = $_POST['edad'] ?? '';
            $clasesImpartidasArray = $_POST['clases'] ?? [];

            $alumno = new Alumno($nombre, $email, $contraseña, $edad, $clasesImpartidasArray);

            // Volver a la MISMA vista (resultAlum) en lugar de ir al index ✅
            require_once __DIR__ . '/../Vista/resultAlum.php';
        } 
        else {
            // Si no hay POST, simplemente inicializa un alumno vacío
            $alumno = new Alumno('', '', '', '', []);
        }

        return $alumno;
    }
}
?>
