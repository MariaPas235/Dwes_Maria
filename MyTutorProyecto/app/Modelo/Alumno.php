<?php
namespace Modelo;


require_once __DIR__ . '/Persona.php';

class Alumno extends Persona {

    private $edad;
    private array $clasesAsistidasArray = [];

    public function __construct($nombre, $email, $contraseña, $edad, array $clasesAsistidasArray) {
        parent::__construct($nombre, $email, $contraseña);
        $this->edad = $edad;
        $this -> clasesAsistidasArray = $clasesAsistidasArray;
    }
    public function getEdad() {
        return $this->edad;
    }

    public function setEdad($edad) {
        $this->edad = $edad;
    }
    public function getClasesAsistidasArray() {
        return $this->clasesAsistidasArray;
    }
    public function setClasesAsistidas(array $clasesAsistidasArray) {
        $this->clasesAsistidasArray = $clasesAsistidasArray;
    }
}
?>
