<?php
namespace Modelo;
final class Clase {
    private $descripcion;
    private $fecha;


    public function __construct($descripcion, $fecha) {
        $this->descripcion = $descripcion;
        $this->fecha = $fecha;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    } 


    
}
?>