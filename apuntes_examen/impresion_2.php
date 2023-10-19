<!DOCTYPE html>
<html>
<head>
    <title>Dibujo de Triángulos</title>
</head>
<body>
    <h1>Dibujo de Triángulos</h1>
    <form method="POST">
        <label for="ancho">Ancho del Triángulo:</label>
        <input type="number" name="ancho" required>
        <input type="submit" value="Dibujar Triángulo">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $ancho = $_POST['ancho'];

        // Dibujar triángulo ascendente
        echo "<h2>Triángulo Ascendente:</h2>";
        for ($i = 1; $i <= $ancho; $i++) {
            for ($j = 1; $j <= $i; $j++) {
                echo "* ";
            }
            echo "<br>";
        }

        // Dibujar triángulo descendente
        echo "<h2>Triángulo Descendente:</h2>";
        for ($i = $ancho; $i >= 1; $i--) {
            for ($j = 1; $j <= $i; $j++) {
                echo "* ";
            }
            echo "<br>";
        }
    }
    ?>
</body>
</html>