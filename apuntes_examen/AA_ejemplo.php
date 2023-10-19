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
session_start();
if (isset($_SESSION['usuario'])) {
    echo '<h1>Bienvenido, ' . $_SESSION['usuario'] . '</h1>';
    echo '<a href="cerrar_sesion.php">Cerrar Sesión</a>';
} else {
    echo 'Debes iniciar sesión para ver tu perfil.';
}
?>
Práctica 2: Uso Avanzado de GET/POST (Búsqueda, Carrito de Compras y Procesamiento de Pagos)

php
Copy code
<!-- Formulario de Búsqueda en tienda.php -->
<form method="GET" action="tienda.php">
    <input type="text" name="busqueda" placeholder="Buscar productos">
    <input type="submit" value="Buscar">
</form>

<!-- Lista de Productos en tienda.php -->
<?php
if (isset($_GET['busqueda'])) {
    // Realizar búsqueda de productos y mostrar resultados
    $resultados = buscarProductos($_GET['busqueda']);
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
if (isset($_POST['agregar_al_carrito'])) {
    $producto_id = $_POST['producto_id'];
    // Agregar producto al carrito (lógica necesaria)
}

if (isset($_SESSION['carrito'])) {
    echo '<h2>Carrito de Compras</h2>';
    echo '<ul>';
    foreach ($_SESSION['carrito'] as $item) {
        echo '<li>' . $item['nombre'] . ' - Precio: $' . $item['precio'] . '</li>';
    }
    echo '</ul>';
}
?>

<!-- Procesamiento de Pagos en tienda.php -->
<?php
if (isset($_POST['procesar_pago'])) {
    // Procesar el pago (lógica necesaria)
}
?>

<!-- Formulario de Procesamiento de Pagos en tienda.php -->
<form method="POST" action="tienda.php">
    <input type="submit" name="procesar_pago" value="Procesar Pago">
</form>