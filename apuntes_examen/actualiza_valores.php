<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php

    //ARRAY ASOCIATIVO


    $concesionario =[
            "Seat" => ['Ibiza','Leon','Alhambra','Arona','Ateca','Taraco'],
            "Audi" => ['R8','A4','Q4','A3','Q8'],
            "BMW" => ['M3','318d','320I','330i','M340d']
    ];

    //CAMBIO "FICTICIO"DE UN VALOR

    if (isset($_POST['actualizar'])){
        $marca = $_POST['marca'];
        $coches = $_POST['coches'];
        for($i = 0; $i < sizeof($coches); $i++){
            if($coches[$i] !== $concesionario[$marca][$i]){
                echo $concesionario[$marca][$i] ." ha sido actualizado a " . $coches[$i]."<br>";
            }
        }
    }
    echo "<form action='' method='post'>";
    echo "<label for='marca'>Marca</label><select name='marca'>";
    foreach($concesionario as $marca => $coches){
        echo "<option ";
     if (isset($_POST['marca'])  && $_POST['marca'] == $marca){
        echo " selected='true'";
     }
     echo " value ='" . $marca ."'>". $marca . "</option>"; 
    }
    echo "</select>";
    echo "<button type='submit'>Buscar</button>";
    echo "</form>";

    //ELEGIR UN VALOR DE UNA LISTA (ARRAY)
    if (isset($_POST['marca'])){
        $marca = $_POST['marca'];
        echo "<form action='' method='post'>";
        echo "<input type='hidden' name='marca' value='".$marca."'>";
        foreach($concesionario[$marca] as $coche){
            echo "<input type='text' name = 'coches[]' value='" . $coche ."'><br>";

        }
        echo "<button type='submit' name='actualizar'>Actualizar</button>";
        echo"</form>";
    }
    
    ?>
    
   
</body>
</html>