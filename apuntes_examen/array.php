// Array indexado
$nombres = array("Juan", "María", "Pedro", "Laura", "Carlos");

// Acceder a elementos del array por índice
echo "Primer nombre: " . $nombres[0] . "<br>"; // Juan
echo "Segundo nombre: " . $nombres[1] . "<br>"; // María

// Recorrer el array con un bucle foreach
foreach ($nombres as $nombre) {
    echo "Nombre: " . $nombre . "<br>";
}