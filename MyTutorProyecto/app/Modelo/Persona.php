<?php
namespace Modelo;


trait MostrarInfo {
    public function mostrarInfo() {
        echo "Nombre: {$this->nombre}, Email: {$this->email}\n";
    }
} 


abstract class Persona {
    use MostrarInfo; 
    private $nombre;
    private $email;
    private $contraseña;

    public function __construct($nombre, $email, $contraseña) {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->contraseña = $contraseña;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getContraseña() {
        return $this->contraseña;
    }

    public function setContraseña($contraseña) {
        $this->contraseña = $contraseña;
    }

}
?>