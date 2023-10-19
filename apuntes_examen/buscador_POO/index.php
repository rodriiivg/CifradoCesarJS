
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador Peliculas y Actores</title>
</head>
<body>
<h1>Buscador de Películas y Actores PHP</h1>

<form method="post" action="index.php">
    <label for="busqueda">Buscar película:</label>
    <input type="text" id="busqueda" name="busqueda" required>
    <input type="submit" name="buscar" value="Buscar">
</form>
<?php
require 'actor.class.php';
require 'pelicula.class.php'; // Incluimos el archivo con las clases

// Crear actores
$actor1 = new Actor('S');
$actor2 = new Actor('Z');
$actor3 = new Actor('X');

// Crear películas con actores
$peliculas = array(
    new Pelicula('Pelicula 1', 'imagen1.jpg', $actor1, $actor2),
    new Pelicula('Pelicula 2', 'imagen2.jpg', $actor2, $actor3),
    new Pelicula('Pelicula 3', 'imagen3.jpg', $actor1, $actor3),
    // Agrega más películas aquí
);

// Inicializar el resultado de búsqueda
$resultado = array();

// Procesar el formulario de búsqueda
if (isset($_POST['buscar'])) {
    $termino = $_POST['termino'];

    // Realizar la búsqueda en las películas
    foreach ($peliculas as $pelicula) {
        if (stripos($pelicula->getTitulo(), $termino) !== false) {
            $resultado[] = $pelicula;
        }
    }
}

?>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Búsqueda de Películas</title>
</head>
<body>
    <h1>Búsqueda de Películas</h1>

    <form method="post">
        <label for="termino">Buscar película:</label>
        <input type="text" name="termino" id="termino">
        <input type="submit" name="buscar" value="Buscar">
    </form>

    <?php
    if (isset($_POST['buscar'])) {
        echo "<p>Número de películas encontradas: " . count($resultado) . "</p>";

        foreach ($resultado as $pelicula) {
            echo "<h2>" . $pelicula->titulo . "</h2>";
            echo "<img src='" . $pelicula->imagen . "' alt='Imagen de la película'><br>";

            echo "<p>Actores:</p>";
            echo "<ul>";
            foreach ($pelicula->actores as $actor) {
                echo "<li>" . $actor->nombre . "</li>";
            }
            echo "</ul>";
        }
    }
    ?>
</body>
</html>
