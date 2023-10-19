<?php

// Bucle for
for ($i = 0; $i < 5; $i++) {
    echo "Iteración for: $i<br>";
}

// Bucle while
$num = 1;
while ($num <= 5) {
    echo "Número while: $num<br>";
    $num++;
}

// Bucle do-while
$num = 1;
do {
    echo "Número do-while: $num<br>";
    $num++;
} while ($num <= 5);

// Bucle foreach con array indexado
$colores = array("Rojo", "Verde", "Azul");
foreach ($colores as $color) {
    echo "Color: $color (foreach array indexado)<br>";
}

// Bucle foreach con array asociativo
$persona = array("nombre" => "Juan", "edad" => 30, "ciudad" => "Madrid");
foreach ($persona as $clave => $valor) {
    echo "$clave: $valor (foreach array asociativo)<br>";
}

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
    echo "<hr>"; // Línea divisoria
}
?>