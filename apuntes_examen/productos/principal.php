<?php
require_once 'productos.class.php';
require_once 'alimentacion.class.php';
require_once 'electronica.class.php';
$alimentacion = new Alimentacion('AL123', 10.99, 'Leche', '12', '2024');
$alimentacion->setNombre('Leche desnatada');
echo "Nombre: " . $alimentacion->getNombre() . "<br>";
echo "Precio: " . $alimentacion->getPrecio() . "<br>";
echo "Código: " . $alimentacion->getCodigo() . "<br>";
echo "Mes de Caducidad: " . $alimentacion->getMesCadu() . "<br>";
echo "Año de Caducidad: " . $alimentacion->getAnioCadu() . "<br>";

// Crear una instancia de Electronica
$electronica = new Electronica('EL456', 499.99, 'Smartphone', '2 años');
$electronica->setPrecio(549.99);
echo "Nombre: " . $electronica->getNombre() . "<br>";
echo "Precio: " . $electronica->getPrecio() . "<br>";
echo "Código: " . $electronica->getCodigo() . "<br>";
echo "Plazo de Garantía: " . $electronica->getPlazoGarantia() . "<br>";
?>