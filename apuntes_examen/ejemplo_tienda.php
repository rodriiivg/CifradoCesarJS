<?php

class Producto {
    private $nombre;
    private $precio;
    private $stock;

    public function __construct($nombre, $precio, $stock) {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getStock() {
        return $this->stock;
    }
}

class Tienda {
    private $productos = [];

    public function agregarProducto(Producto $producto) {
        $this->productos[] = $producto;
    }

    public function eliminarProductoPorNombre($nombre) {
        foreach ($this->productos as $key => $producto) {
            if ($producto->getNombre() === $nombre) {
                unset($this->productos[$key]);
            }
        }
    }

    public function listarProductos() {
        return $this->productos;
    }

    public function calcularValorTotal() {
        $total = 0;
        foreach ($this->productos as $producto) {
            $total += $producto->getPrecio() * $producto->getStock();
        }
        return $total;
    }

    public function buscarProductos($termino) {
        $resultados = [];
        foreach ($this->productos as $producto) {
            if (stripos($producto->getNombre(), $termino) !== false) {
                $resultados[] = $producto;
            }
        }
        return $resultados;
    }
}

// Crear productos
$producto1 = new Producto('Laptop', 800, 5);
$producto2 = new Producto('Teléfono', 400, 10);
$producto3 = new Producto('Tablet', 300, 8);

// Crear una tienda y agregar productos
$tienda = new Tienda();
$tienda->agregarProducto($producto1);
$tienda->agregarProducto($producto2);
$tienda->agregarProducto($producto3);

// Buscar productos por nombre
$terminoBusqueda = 'Laptop';
$resultadosBusqueda = $tienda->buscarProductos($terminoBusqueda);

// Calcular el valor total de la tienda
$valorTotal = $tienda->calcularValorTotal();