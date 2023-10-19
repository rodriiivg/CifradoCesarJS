<?php
class Actor {
    private $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function setNombre($nuevoActor){
        $this->nombre = $nuevoActor;
    }
    public function getNombre() {
        return $this->nombre;
    }
}

?>