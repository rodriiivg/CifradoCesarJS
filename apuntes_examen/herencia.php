<?php

class Vehiculo {
    public $marca;
    public $modelo;

    public function __construct($marca, $modelo) {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    public function arrancar() {
        echo "El vehículo está arrancando." . PHP_EOL;
    }

    public function detener() {
        echo "El vehículo se ha detenido." . PHP_EOL;
    }
}

class Coche extends Vehiculo {
    public $numeroPuertas;

    public function __construct($marca, $modelo, $numeroPuertas) {
        parent::__construct($marca, $modelo);
        $this->numeroPuertas = $numeroPuertas;
    }

    public function abrirPuertas() {
        echo "Abriendo las puertas del coche." . PHP_EOL;
    }
}

// Crear una instancia de la clase Coche
$miCoche = new Coche("Toyota", "Corolla", 4);

// Acceder a las propiedades y métodos heredados de la clase Vehiculo
echo "Marca: " . $miCoche->marca . PHP_EOL;
echo "Modelo: " . $miCoche->modelo . PHP_EOL;

$miCoche->arrancar();
$miCoche->abrirPuertas();

// También se pueden acceder a las propiedades y métodos propios de la clase Coche
echo "Número de puertas: " . $miCoche->numeroPuertas . PHP_EOL;
?>