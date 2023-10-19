<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio_dos_hoja03_php05</title>
</head>

<body>
    <h1>Buscador de Películas PHP</h1>

    <form method="post" action="dos.php">
        <label for="busqueda">Buscar película:</label>
        <input type="text" id="busqueda" name="busqueda" required>
        <input type="submit" name="buscar" value="Buscar">
    </form>

    <?php


//ARREGLAR LOWER Y UPPERCASE ( SI PONGO akira no funciona, si pongo Akira si)
    $peliculas = array(
        "El lobo de Wall Street",
        "El resplandor",
        "Akira",
        "The hunt",
        "El padrino",
        "Batman",
        "Venom",
        "Hulk",
        "Thor",
        "Iron Man"
    );

    $imagenes = array(
        "El lobo de Wall Street" => "el_lobo_de_wall_street.jpg",
        "El resplandor" => "el-resplandor.jpeg",
        "Akira" => "akira.jpg",
        "The hunt" => "hunt.jpg",
        "El padrino" => "padrino.jpg",
        "Batman" => "batman.jpg",
        "Venom" => "venom.jpg",
        "Hulk" => "hulk.jpg",
        "Thor" => "thor.jpg",
        "Iron Man" => "iron-man.jpg"
    );

    $resultados = array();

    if (isset($_POST['buscar'])) {
        $busqueda = $_POST['busqueda'];

        foreach ($peliculas as $pelicula) {
            if (strpos($pelicula, $busqueda) !== false) {
                $resultados[] = $pelicula;
            }
        }
    }

    if (!empty($resultados)) {
        echo "<h2>Resultados de la búsqueda:</h2>";
       echo "<p>" . count($resultados) ." películas encontradas de " . $busqueda ."</p>";
        echo "<ul>";
        foreach ($resultados as $resultado) {
            echo "<li>$resultado</li>";

            if (isset($imagenes[$resultado])) {
                $imagen = $imagenes[$resultado];
                echo "<img src='hoja03_php_05/imagenes/$imagen' ";
            }
        }
        echo "</ul>";
    } else {
        echo "<p>No se encontraron resultados.</p>";
    }
    ?>


</body>

<a href='dos.php'>Volver</a>

</html>