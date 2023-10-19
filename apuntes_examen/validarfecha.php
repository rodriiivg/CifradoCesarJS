<?php
function validarFecha($fecha) {
    $timestamp = strtotime($fecha);
    return $timestamp !== false && $timestamp != -1;
}

$fecha = "2023-09-30"; 

if (validarFecha($fecha)) {
    echo "$fecha es una fecha válida.";
} else {
    echo "$fecha no es una fecha válida.";
}
?>