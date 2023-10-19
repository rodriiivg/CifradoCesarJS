<?php
$peliculas = array(
    new Pelicula('El lobo de Wall Street', 'el_lobo_de_wall_street.jpg', new Actor('Leonardo DiCaprio')),
    new Pelicula('El resplandor', 'el-resplandor.jpeg', new Actor('Jack Nicholson')),
    // Agrega más películas y actores aquí
);

$busqueda = '';
$resultados = array();

if (isset($_POST['buscar'])) {
    $busqueda = $_POST['busqueda'];

    foreach ($peliculas as $pelicula) {
        if (stripos($pelicula->getTitulo(), $busqueda) !== false) {
            $resultados[] = $pelicula;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador Películas y Actores</title>
</head>
<body>
    <h1>Buscador de Películas y Actores PHP</h1>
    <form method="post" action="index.php">
        <label for="busqueda">Buscar película:</label>
        <input type="text" id="busqueda" name="busqueda" required value="<?php echo $busqueda; ?>">
        <input type="submit" name="buscar" value="Buscar">
    </form>

    <?php
    if (!empty($resultados)) {
        echo "<h2>Resultados de la búsqueda:</h2>";
        echo "<p>" . count($resultados) . " películas encontradas para: $busqueda</p>";
        echo "<ul>";
        foreach ($resultados as $pelicula) {
            echo "<li>" . $pelicula->getTitulo() . "</li>";
            $actores = $pelicula->getActores();
            if (!empty($actores)) {
                echo "<ul>";
                foreach ($actores as $actor) {
                    echo "<li>" . $actor->getNombre() . "</li>";
                }
                echo "</ul>";
            }
        }
        echo "</ul>";
    } else {
        echo "<p>No se encontraron resultados.</p>";
    }
    ?>
</body>
</html>