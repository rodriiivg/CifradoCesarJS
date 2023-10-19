<!DOCTYPE html>
<html>
<head>
    <title>Impresión de Cuadrados</title>
</head>
<body>
    <h1>Impresión de Cuadrados</h1>
    <form method="POST">
        <label for="tamaño">Tamaño del Cuadrado:</label>
        <input type="number" name="tamaño" required>
        <input type="submit" value="Dibujar Cuadrados">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $tamaño = $_POST['tamaño'];

        // Imprimir el primer cuadrado
        echo "<h2>Primer Cuadrado:</h2>";
        for ($i = 1; $i <= $tamaño; $i++) {
            for ($j = 1; $j <= $tamaño; $j++) {
                echo "* ";
            }
            echo "<br>";
        }

        // Imprimir un espacio en blanco entre los cuadrados
        echo "<br>";

        // Imprimir el segundo cuadrado
        echo "<h2>Segundo Cuadrado:</h2>";
        for ($i = 1; $i <= $tamaño; $i++) {
            for ($j = 1; $j <= $tamaño; $j++) {
                echo "&nbsp;&nbsp;&nbsp;";
            }
            for ($j = 1; $j <= $tamaño; $j++) {
                echo "* ";
            }
            echo "<br>";
        }
    }
    ?>
</body>
</html>