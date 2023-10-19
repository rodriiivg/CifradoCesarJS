<?php
require_once 'autor.class.php';
require_once 'libro.class.php';

// Crear autores

//FUNCIONA BUSCANDO AL AUTOR


$autor1 = new Autor('Autor 1');
$autor2 = new Autor('Autor 2');
$autor3 = new Autor('Autor 3');

// Crear libros con autores
$libros = array(
    new Libro('Libro 1', $autor1),
    new Libro('Libro 2', $autor2),
    new Libro('Libro 3', $autor1),
    new Libro('Libro 4', $autor3),
);

// Inicializar el resultado de búsqueda
$resultado = array();

// Procesar el formulario de búsqueda
if (isset($_POST['buscar'])) {
    $nombreAutor = $_POST['nombreAutor'];

    // Realizar la búsqueda de libros por autor
    foreach ($libros as $libro) {
        if ($libro->getAutor()->getNombre() === $nombreAutor) {
            $resultado[] = $libro;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Búsqueda de Libros por Autor</title>
</head>
<body>
    <h1>Búsqueda de Libros por Autor</h1>

    <form method="post">
        <label for="nombreAutor">Buscar libros del autor:</label>
        <input type="text" name="nombreAutor" id="nombreAutor">
        <input type="submit" name="buscar" value="Buscar">
    </form>

    <?php
    if (isset($_POST['buscar'])) {
        echo "<p>Número de libros encontrados: " . count($resultado) . "</p>";

        foreach ($resultado as $libro) {
            echo "<h2>" . $libro->getTitulo() . "</h2>";
            echo "<p>Autor: " . $libro->getAutor()->getNombre() . "</p>";
        }
    }
    ?>
</body>
</html>