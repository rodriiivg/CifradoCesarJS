<?php
class Producto {
    public $codigo;
    public function vender() {
        echo "Producto vendido." . PHP_EOL;
    }
}

class Articulo extends Producto {
    public $nombre;
}

// Crear una instancia de la clase Producto
$producto = new Producto();

// Comprobar si $producto es una instancia de Producto
if ($producto instanceof Producto) {
    echo "El objeto \$producto es una instancia de la clase Producto." . PHP_EOL;
}

// Comprobar si la clase Producto existe
if (class_exists('Producto')) {
    echo "La clase Producto existe." . PHP_EOL;
}

// Crear un alias para la clase Producto
class_alias('Producto', 'Articulo');
$articulo = new Articulo();

// Obtener los métodos de la clase Producto
$metodos = get_class_methods('Producto');
print_r($metodos);

// Comprobar si el método 'vender' existe en la clase Producto
if (method_exists('Producto', 'vender')) {
    echo "El método 'vender' existe en la clase Producto." . PHP_EOL;
}

// Comprobar si el atributo 'codigo' existe en la clase Producto
if (property_exists('Producto', 'codigo')) {
    echo "El atributo 'codigo' existe en la clase Producto." . PHP_EOL;
}
?>