<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
function conjugarVerbos() {
    $verbos = ["comer", "beber", "vivir", "sumar"];
    $terminaciones = [
        "ar" => ["o", "as", "a", "amos", "áis", "an"],
        "er" => ["o", "es", "e", "emos", "éis", "en"],
        "ir" => ["o", "es", "e", "imos", "ís", "en"]
    ];

    $verboRand = $verbos[rand(0, count($verbos) - 1)];
    $terminacion = substr($verboRand, -2);
    $raiz = substr($verboRand, 0, -2);

    if (array_key_exists($terminacion, $terminaciones)) {
        echo "Conjugación de \"$verboRand\":<br>";
        foreach ($terminaciones[$terminacion] as $conjugacion) {
            echo "$raiz$conjugacion<br>";
        }
    } else {
        echo "Ha ocurrido un error: el verbo \"$verboRand\" no es válido.<br>";
    }
}

conjugarVerbos();
?>

</body>
</html>