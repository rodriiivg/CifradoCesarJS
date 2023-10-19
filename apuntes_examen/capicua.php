<?php
function esCapicua($numero) {
    $numeroComoCadena = (string)$numero;
    $numeroInvertido = strrev($numeroComoCadena);
    return $numeroComoCadena === $numeroInvertido;
}

echo "Números capicúa entre 100 y 999: ";

for ($numero = 100; $numero <= 999; $numero++) {
    if (esCapicua($numero)) {
        echo $numero . " ";
    }
}

?>