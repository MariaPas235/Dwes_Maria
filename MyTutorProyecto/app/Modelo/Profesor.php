<?php
namespace Modelo;


require_once __DIR__ . '/Persona.php';
class Profesor extends Persona
{
    private $asignatura;
    private array $clasesimpaertidadarray = [];

    public function __construct($nombre, $email, $contraseña, $asignatura, array $clasesimpaertidadarray)
    {
        parent::__construct($nombre, $email, $contraseña);
        $this->asignatura = $asignatura;
        $this->clasesimpaertidadarray = $clasesimpaertidadarray;
    }
    public function getAsignatura()
    {
        return $this->asignatura;
    }

    public function setAsignatura($asignatura)
    {
        $this->asignatura = $asignatura;
    }


    public function getClasesimpaertidadarray()
    {
        return $this->clasesimpaertidadarray;
    }

    public function setClasesimpartidadarray($clasesimpartidadarray)
    {
        $this->clasesimpartidadarray = $clasesimpartidadarray;
    }

}
?>