<!DOCTYPE html>
<html>
<head>
    <title>Selección de Jugadores y Entrenadores</title>
</head>
<body>
    <h1>Selección de Jugadores y Entrenadores</h1>
    <form method="POST">
        <p>Seleccione una opción:</p>
        <input type="radio" name="opcion" value="jugadores"> Mostrar Jugadores
        <input type="radio" name="opcion" value="entrenadores"> Mostrar Entrenadores<br>

        <p>Seleccione uno o varios equipos:</p>
        <input type="checkbox" name="equipos[]" value="barcelona"> Barcelona
        <input type="checkbox" name="equipos[]" value="madrid"> Madrid<br>

        <input type="submit" value="Mostrar">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $opcion = $_POST['opcion'];
        $equipos = $_POST['equipos'] ?? [];

        if (empty($equipos)) {
            echo "Por favor, seleccione al menos un equipo.";
        } else {
            if (in_array("barcelona", $equipos)) {
                if ($opcion === "jugadores") {
                    echo "<h2>Jugadores del Barcelona:</h2>";
                    echo "1. Lionel Messi<br>";
                    echo "2. Gerard Piqué<br>";
                    echo "3. Sergio Busquets<br>";
                } elseif ($opcion === "entrenadores") {
                    echo "<h2>Entrenadores del Barcelona:</h2>";
                    echo "1. Ronald Koeman<br>";
                }
            }
            if (in_array("madrid", $equipos)) {
                if ($opcion === "jugadores") {
                    echo "<h2>Jugadores del Madrid:</h2>";
                    echo "1. Cristiano Ronaldo<br>";
                    echo "2. Sergio Ramos<br>";
                    echo "3. Luka Modric<br>";
                } elseif ($opcion === "entrenadores") {
                    echo "<h2>Entrenadores del Madrid:</h2>";
                    echo "1. Zinedine Zidane<br>";
                }
            }
        }
    }
    ?>
</body>
</html>