<?php
class Animal {
    public $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function hacerSonido() {
        return "El animal hace un sonido ";
    }
}

// Clase Perro que hereda de Animal
class Perro extends Animal {
    public function hacerSonido() {
       $padrehabla = parent::hacerSonido();
    return $padrehabla."y además este animal, que es un PERRO dice GUAU GUAU";
    }
}

$perro = new Perro("Max");
echo $perro->hacerSonido(); // Salida: Guau Guau


?>