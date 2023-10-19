<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba Cuenta</title>
</head>

<body>
    <?php


   

    //REVISAR, NO FUNCIONA LAS LLAMADAS A LOS METODOS
    //CREO.... CREO QUE LAS FUNCIONES ESTAN BIEN PERO NO SE POR QUÉ NO SE MUESTRAN
   require_once 'cuenta.class.php';

    echo "Información cuenta:</br>";
    $cuenta = new Cuenta(444442, "Rodrigo", 1500); //MIRAR POR QUE SI ES ABSTRACT NO ME DEJA DECLARAR LA CLASE
    echo "{$cuenta}</br>";
echo "Información ingreso:</br>";

    $cuenta->ingreso(200);
    //echo "{$cuenta->ingreso()}</br>";
    echo "{$cuenta}</br>";//ESTA BIEN PERO HACER QUE MUESTRE SOLO EL SALDO

    echo "Información reintegro:</br>";
    $cuenta->reintegro(300);
    echo "{$cuenta}</br>";

    echo "Información si el saldo es mayor que la cantidad:</br>";
    $cuenta->esPreferencial(1600);
     echo "{$cuenta} </br>";

    //echo "{$cuenta->esPreferencial()}</br>";
    echo "Información si el saldo es menor que la cantidad:</br>";
    $cuenta->esPreferencial(1400);
    echo "{$cuenta}</br>";







    ?>
</body>

</html>