<?php
class ClaseSencilla
{
    // Declaración de una propiedad
    private $var = 'Maria dice que esto es una clase';

    // Declaración de un método
    public function mostrarVar() {
        echo $this->var;
    }
}

// Crear un objeto de la clase
$obj = new ClaseSencilla();
$obj->mostrarVar(); // Muestra 'María dice que esto es una clase'

?>