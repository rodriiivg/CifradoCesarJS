<!DOCTYPE html>
<html>
<head>
    <title>Formulario con POST</title>
</head>
<body>
    <form method="post" action="procesar_post.php">
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];

    echo "Nombre: " . $nombre . "<br>";
    echo "Email: " . $email . "<br>";
}
?>