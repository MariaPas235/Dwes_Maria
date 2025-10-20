<?php
// Definición del trait
trait Registro {
    public function registrarAccion($mensaje) {
        $fecha = date('Y-m-d H:i:s');
        echo "[$fecha] $mensaje<br>";
    }
}


// Clase que usa el trait
class Usuario {
    use Registro; // "inyecta" los métodos del trait


    public function login($nombre) {
        $this->registrarAccion("El usuario '$nombre' ha iniciado sesión.");
    }
}


class Producto {
    


    public function crear($nombre) {
        echo("Se ha creado el producto '$nombre'.");
    }
}


// Uso
$u = new Usuario();
$u->login("Maria");




$p = new Producto();
$p->crear("tenedor ");
?>
