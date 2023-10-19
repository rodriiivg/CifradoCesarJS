<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  
<?php
class Inventario {
    private $articulo = [];

    public function __construct() {
        $this->articulo = [
            ['codigo' => '01', 'descripcion' => 'Tomates', 'existencias' => 10],
            ['codigo' => '02', 'descripcion' => 'Patatas', 'existencias' => 35],
            ['codigo' => '03', 'descripcion' => 'Aceitunas', 'existencias' => 25]
        ];
    }

    // Función para encontrar el artículo con mayor existencia
    public function mayor() {
        $mayorExistencia = 0;
        $nombreArticulo = '';

        foreach ($this->articulo as $item) {
            if ($item['existencias'] > $mayorExistencia) {
                $mayorExistencia = $item['existencias'];
                $nombreArticulo = $item['descripcion'];
            }
        }

        //return $nombreArticulo;
        return $mayorExistencia;
    }

    public function sumar() {
        $totalExistencias = 0;

        foreach ($this->articulo as $item) {
            $totalExistencias += $item['existencias'];
        }

        return $totalExistencias;
    }

    public function mostrar() {
        echo "<table>";
        echo "<tr><th>Código</th><th>Descripción</th><th>Existencias</th></tr>";
        //NO FUNCIONA LA TABLA
        foreach ($this->articulo as $item) {
            echo "<tr>";
            echo "<td>{$item['codigo']}</td>";
            echo "<td>{$item['descripcion']}</td>";
            echo "<td>{$item['existencias']}</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    }
}

$inventario = new Inventario();

echo "El artículo con mayor existencia es: " . $inventario->mayor() . "<br>";
echo "La suma total de existencias es: " . $inventario->sumar() . "<br>";

echo "Contenido del inventario: <br>";
$inventario->mostrar();
?>
  
  </body>
</html>