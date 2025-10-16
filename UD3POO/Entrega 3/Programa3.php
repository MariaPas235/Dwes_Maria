<?php
class Persona {
    private $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
        echo "Objeto creado con nombre: $this->nombre<br>";
    }

    public function saludar() {
        echo "Hola, soy $this->nombre <br>";
    }

    public function __destruct() {
        echo "<br>Objeto destruido.";
    }
}

$persona1 = new Persona("Maria");
$persona2 = new Persona("Juan");
$persona3 = new Persona("Hugo");

echo $persona1->saludar();
echo $persona2->saludar();
echo $persona3->saludar();
//Crea al menos 3 objetos de la clase persona
// y muestra un saludo para cada uno
?>