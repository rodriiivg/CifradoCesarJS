<?php
class Familia extends Medico{
    private $numPacientes;

    public function __construct($nombre, $edad, $turno, $numPacientes) {
        parent::__construct($nombre, $edad, $turno);
        $this->numPacientes = $numPacientes;
    }

    public function getNumPacientes() {
        return $this->numPacientes;
    }


    //TOSTRING
    public function mostrarDatos() {
        echo "Médico de Familia: {$this->getNombre()}, Edad: {$this->getEdad()}, Turno: {$this->getTurno()}, Pacientes: {$this->numPacientes}<br>";
    }
}


?>