<?php

$estudiantes = [
    "Juan" => 20,
    "María" => 22,
    "Carlos" => 18,
    "Ana" => 21,
    "Luis" => 19
];

// Obtener los nombres de los estudiantes utilizando array_keys
$nombres = array_keys($estudiantes);
echo "Nombres de los estudiantes: ";
foreach ($nombres as $nombre) {
    echo $nombre . ", ";
}

echo "<br>";

// Obtener las edades de los estudiantes utilizando array_values
$edades = array_values($estudiantes);
echo "Edades de los estudiantes: ";
foreach ($edades as $edad) {
    echo $edad . ", ";
}

echo "<br>";

// Calcular la edad promedio de los estudiantes
$promedio = array_sum($edades) / count($edades);
echo "Edad promedio de los estudiantes: " . $promedio;

// Encontrar al estudiante más joven
$indiceEstudianteMasJoven = array_search(min($edades), $edades);
$estudianteMasJoven = $nombres[$indiceEstudianteMasJoven];
echo "<br>Estudiante más joven: " . $estudianteMasJoven;

// Encontrar al estudiante más mayor
$indiceEstudianteMasMayor = array_search(max($edades), $edades);
$estudianteMasMayor = $nombres[$indiceEstudianteMasMayor];
echo "<br>Estudiante más mayor: " . $estudianteMasMayor;
?>