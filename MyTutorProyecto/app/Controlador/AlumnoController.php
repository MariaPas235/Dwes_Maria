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
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnIniciarSesion'])) {
            $nombre = $_POST['nombre'] ?? '';
            $email = $_POST['email'] ?? '';
            $contraseña = $_POST['contraseña'] ?? '';
            $edad = $_POST['edad'] ?? '';

            
            $alumno = new Alumno($nombre, $email, $contraseña, $edad, []);

            require_once __DIR__ . '/../Vista/resultAlum.php';
        } 
        elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clases'])) {
            $nombre = $_POST['nombre'] ?? '';
            $email = $_POST['email'] ?? '';
            $contraseña = $_POST['contraseña'] ?? '';
            $edad = $_POST['edad'] ?? '';
            $clasesImpartidasArray = $_POST['clases'] ?? [];

            $alumno = new Alumno($nombre, $email, $contraseña, $edad, $clasesImpartidasArray);

            require_once __DIR__ . '/../Vista/resultAlum.php';
        } 
        else {
            
            $alumno = new Alumno('', '', '', '', []);
        }

        return $alumno;
    }
}
?>
