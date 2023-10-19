<?php

class Producto {
    public $nombre;
    public $codigo;

    public function __clone() {
        $this->codigo = $this->nuevoCodigo();
    }

    private function nuevoCodigo() {
        return uniqid(); // Genera un nuevo código único
    }
}

// Crear una instancia de la clase Producto
$p = new Producto();
$p->nombre = 'Xiaomi 13';

// Clonar el objeto $p
$a = clone $p;

// Verificar la igualdad de los objetos usando el operador ==
if ($a == $p) {
    echo "Los objetos son iguales en términos de atributos.\n";
} else {
    echo "Los objetos son diferentes en términos de atributos.\n";
}

// Verificar la igualdad de los objetos usando el operador ===
$a = $p; // Asignar la misma referencia a $a
if ($a === $p) {
    echo "Los objetos son la misma referencia.\n";
} else {
    echo "Los objetos son referencias diferentes.\n";
}
?>