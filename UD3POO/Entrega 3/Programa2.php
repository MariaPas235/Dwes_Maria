<?php
class Persona {
    // Propiedades de la clase
    public $nombre;
    public $edad;

    // Constructor de la clase
    public function __construct($nombre, $edad) {
        $this->nombre = $nombre;  // Asigna el valor del parámetro $nombre a la propiedad $nombre del objeto
        $this->edad = $edad;      // Asigna el valor del parámetro $edad a la propiedad $edad del objeto
    }

    // Método para mostrar información de la persona
    public function mostrarInfo() {
        return "Nombre: $this->nombre, Edad: $this->edad";
    }
}

// Crear una instancia de la clase Persona usando el constructor
$persona1 = new Persona("Juan", 26);
echo $persona1->mostrarInfo(); // Salida: Nombre: Juan, Edad: 26

$persona2 = new Persona("María", 22);
echo $persona2->mostrarInfo(); // Salida: Nombre: María, Edad: 22
?>


<?php
class Coche {
    public $marca;
    public $modelo;

    public function __construct($marca, $modelo) {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    public function obtenerInformacion() {
        return "Este es un coche de la marca $this->marca, modelo $this->modelo.";
    }
}

$coche1 = new Coche("Toyota", "Corolla");
$coche2 =  new Coche("Ford", "Focus");

echo $coche1-> obtenerInformacion();  // Salida: "Este es un coche de la marca Toyota, modelo Corolla."
echo $coche2-> obtenerInformacion(); // Salida: "Este es un coche de la marca Ford, modelo Focus."

?>