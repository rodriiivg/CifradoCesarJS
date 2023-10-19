<?php
// Definir un array multidimensional de empleados
$empleados = array(
    array("nombre" => "Juan", "puesto" => "Desarrollador", "salario" => 50000),
    array("nombre" => "María", "puesto" => "Diseñador", "salario" => 45000),
    array("nombre" => "Pedro", "puesto" => "Gerente", "salario" => 60000),
    array("nombre" => "Laura", "puesto" => "Analista", "salario" => 55000),
);

// Utilizar un bucle foreach para mostrar la información de los empleados
foreach ($empleados as $empleado) {
    echo "Nombre: " . $empleado["nombre"] . "<br>";
    echo "Puesto: " . $empleado["puesto"] . "<br>";
    echo "Salario: $" . number_format($empleado["salario"], 2) . "<br>";
    echo "<hr>"; 
}?>