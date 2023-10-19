<?php
class Urgencia extends Medico{

    private $unidad;

    public function __construct($nombre, $edad, $turno, $unidad) {
        parent::__construct($nombre, $edad, $turno);
        $this->unidad = $unidad;
    }

    public function getUnidad() {
        return $this->unidad;
    }

    public function mostrarDatos() {
        echo "Médico de Urgencia: {$this->getNombre()}, Edad: {$this->getEdad()}, Turno: {$this->getTurno()}, Unidad: {$this->unidad}<br>";
    }
}

?>