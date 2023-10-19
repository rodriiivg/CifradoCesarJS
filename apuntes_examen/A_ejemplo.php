// index.php
<?php
session_start();
require_once 'Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['registro'])) {
        $usuario = new Usuario();
        $registroExitoso = $usuario->registrar($_POST['nombre'], $_POST['email'], $_POST['password']);
        if ($registroExitoso) {
            $_SESSION['usuario'] = $_POST['nombre'];
            header('Location: perfil.php');
            exit;
        }
    } elseif (isset($_POST['login'])) {
        $usuario = new Usuario();
        $inicioSesionExitoso = $usuario->iniciarSesion($_POST['email'], $_POST['password']);
        if ($inicioSesionExitoso) {
            $_SESSION['usuario'] = $usuario->getNombre();
            header('Location: perfil.php');
            exit;
        }
    }
}
?>

<!-- Formulario de Registro en registro.php -->
<form method="POST" action="index.php">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="email" name="email" placeholder="Correo Electrónico" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <input type="submit" name="registro" value="Registrarse">
</form>

<!-- Formulario de Inicio de Sesión en login.php -->
<form method="POST" action="index.php">
    <input type="email" name="email" placeholder="Correo Electrónico" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <input type="submit" name="login" value="Iniciar Sesión">
</form>

<!-- Página de Perfil en perfil.php -->
<?php
if (isset($_SESSION['usuario'])) {
    echo '<h1>Bienvenido, ' . $_SESSION['usuario'] . '</h1>';
    echo '<a href="cerrar_sesion.php">Cerrar Sesión</a>';
} else {
    echo 'Debes iniciar sesión para ver tu perfil.';
}
?>

// tienda.php
<?php
session_start();

// Función para buscar productos (simulada)
function buscarProductos($busqueda) {
    $productos = [
        ['id' => 1, 'nombre' => 'Producto 1', 'precio' => 20],
        ['id' => 2, 'nombre' => 'Producto 2', 'precio' => 30],
        // Más productos
    ];

    $resultados = [];
    foreach ($productos as $producto) {
        if (stripos($producto['nombre'], $busqueda) !== false) {
            $resultados[] = $producto;
        }
    }

    return $resultados;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['busqueda'])) {
        $resultados = buscarProductos($_GET['busqueda']);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['agregar_al_carrito'])) {
        $producto_id = $_POST['producto_id'];
        // Agregar producto al carrito (lógica necesaria)
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        // Obtener información del producto (simulada)
        $producto = obtenerProductoPorId($producto_id);

        if ($producto) {
            $_SESSION['carrito'][] = $producto;
        }
    } elseif (isset($_POST['procesar_pago'])) {
        // Procesar el pago (lógica necesaria)
    }
}

function obtenerProductoPorId($id) {
    $productos = [
        ['id' => 1, 'nombre' => 'Producto 1', 'precio' => 20],
        ['id' => 2, 'nombre' => 'Producto 2', 'precio' => 30],
        // Más productos
    ];

    foreach ($productos as $producto) {
        if ($producto['id'] == $id) {
            return $producto;
        }
    }

    return null;
}
?>

<!-- Formulario de Búsqueda en tienda.php -->
<form method="GET" action="tienda.php">
    <input type="text" name="busqueda" placeholder="Buscar productos">
    <input type="submit" value="Buscar">
</form>

<!-- Lista de Productos en tienda.php -->
<?php
if (isset($resultados)) {
    foreach ($resultados as $producto) {
        echo '<div class="producto">';
        echo '<h2>' . $producto['nombre'] . '</h2>';
        echo '<p>Precio: $' . $producto['precio'] . '</p>';
        echo '<form method="POST" action="tienda.php">';
        echo '<input type="hidden" name="producto_id" value="' . $producto['id'] . '">';
        echo '<input type="submit" name="agregar_al_carrito" value="Agregar al Carrito">';
        echo '</form>';
        echo '</div>';
    }
}
?>

<!-- Carrito de Compras en tienda.php -->
<?php
if (isset($_SESSION['carrito'])) {
    echo '<h2>Carrito de Compras</h2>';
    echo '<ul>';
    foreach ($_SESSION['carrito'] as $item) {
        echo '<li>' . $item['nombre'] . ' - Precio: $' . $item['precio'] . '</li>';
    }
    echo '</ul>';
}
?>

<!-- Formulario de Procesamiento de Pagos en tienda.php -->
<form method="POST" action="tienda.php">
    <input type="submit" name="procesar_pago" value="Procesar Pago">
</form>
