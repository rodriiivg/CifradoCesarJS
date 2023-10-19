<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/ej04.css">
</head>
<body>
    
    
    <?php
    //ARRAY ASOCIATIVO
    $equipos = [
        "Real Madrid" =>[
        "entrenador"=>[["nombre" => "Ancelotti", "imagen"=>"imgequipos/ANCELOTTI.png"]],
        "jugadores"=>[
            ["nombre"=>"Vinicius", "imagen"=>"imgequipos/VINICIUS.jpg"],
            ["nombre"=>"Bellingham", "imagen"=>"imgequipos/BELLINGHAM.jpg"],
            ["nombre"=>"Courtois", "imagen"=>"imgequipos/COURTOIS.png"]
        ]
        ],
        "Barcelona" =>[
        "entrenador"=>[["nombre" => "Xavi", "imagen"=>"imgequipos/Xavi.jpg"]],
        "jugadores"=>[
            ["nombre"=>"Lewandowski", "imagen"=>"imgequipos/lewandowski.jpg"],
            ["nombre"=>"Ferran The Shark", "imagen"=>"imgequipos/ferran.png"],
            ["nombre"=>"Ter Stegen", "imagen"=>"imgequipos/terstegen.jpg"]
        ]
        ]

    
    ];
    $nombresequipos = array_keys($equipos);
    echo "<form action = '' method = 'post'>";
    echo "<label for='equipos'>Equipo</label>";
    echo "<select name = 'equipos'>";
    echo "<option value ='todos'";
    if(isset($_POST["equipos"]) && $_POST["equipos"] == "todos"){
        echo " selected = true ";
    }
    //MOSTRAR TODOS LOS VALORES
    echo ">--Todos--</option>";
    foreach($equipos as $equipo => $puestos){
        echo "<option value= '".$equipo."'";
        if(isset($_POST["equipos"]) && $_POST["equipos"] == $equipo){
            echo " selected = 'true' ";
        }
        echo ">". $equipo . "</option>";
        
    }

    //ELEGIR CHECKBOX
    echo "</select>";
    echo "<label for='puesto'>Puesto</label>";
    foreach($equipos[$nombresequipos[0]] as $puesto => $empleado){
        echo "<input type='radio' name='puesto' value = '".$puesto . "'";
        if(isset($_POST["puesto"]) && $_POST["puesto"] == $puesto){
            echo " checked ";
        }
        echo ">" . $puesto;
        
    }
   echo "<button type='submit'>Buscar</button>";
   echo "</form>";
    if(isset($_POST["equipos"])){
        $equipo = $_POST["equipos"];
        $puesto = $_POST["puesto"];
        if($equipo === "todos"){
            echo "<table>";
            echo "<tr>";
            for($i=0; $i < sizeof($nombresequipos); $i++){
                echo "<td>" . $nombresequipos[$i] ."</td>";
            }
            echo "</tr>";
            echo $equipos[$nombresequipos[0]][$puesto][0]['nombre'];
            for($i=0;$i<sizeof($equipos[$nombresequipos[0]][$puesto]); $i++){
                echo '<tr>';
                for($j = 0; $j < sizeof($equipos); $j++){
                echo "<td>". $equipos[$nombresequipos[$j]][$puesto][$i]['nombre'] . "<br>" . "<img src= '" . $equipos[$nombresequipos[$j]][$puesto][$i]['imagen']  ."'><br>";  
                }
                echo '</tr>';
                
            }
            echo "</table>";
        }
        }else{
            foreach($equipos[$equipo][$puesto] as $plantilla) {
                echo "<td>". $plantilla["nombre"] . "<br>" . "<img src= '" . $plantilla["imagen"] ."'><br>";
            }
        }
    

    

    ?>
    
</body>
</html>