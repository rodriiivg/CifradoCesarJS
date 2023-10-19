<?php
class CarritoDeCompras {
    private $productos = [];

    public function agregarProducto($producto) {
        $this->productos[] = $producto;
    }

    public function calcularTotal() {
        $total = 0;
        foreach ($this->productos as $producto) {
            $total += $producto->getPrecio();
        }
        return $total;
    }
}

class Producto {
    private $nombre;
    private $precio;

    public function __construct($nombre, $precio) {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPrecio() {
        return $this->precio;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $precio = floatval($_POST['precio']);

    $producto = new Producto($nombre, $precio);
    $carrito = new CarritoDeCompras();
    $carrito->agregarProducto($producto);

    echo "Producto agregado al carrito.";
}
?>
<!-- Formulario HTML para el ejercicio -->
<!DOCTYPE html>
<html>
<head>
    <title>Registro de Pedidos</title>
</head>
<body>
    <h1>Tienda en Línea</h1>
    <h2>Agregar Producto al Carrito</h2>
    <form method="POST">
        <label for="nombre">Nombre del Producto:</label>
        <input type="text" name="nombre" required><br>

        <label for="precio">Precio del Producto:</label>
        <input type="number" name="precio" step="0.01" required><br>

        <input type="submit" value="Agregar al Carrito">
    </form>

    <h2>Carrito de Compras</h2>
    <p>Total a pagar: $<?php echo number_format($carrito->calcularTotal(), 2); ?></p>
</body>
</html>