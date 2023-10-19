<!DOCTYPE html>
<html>
<head>
    <title>Formulario con GET</title>
</head>
<body>
    <form method="get" action="procesar_get.php">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $nombre = $_GET["nombre"];
    $email = $_GET["email"];

    echo "Nombre: " . $nombre . "<br>";
    echo "Email: " . $email . "<br>";
}
?>