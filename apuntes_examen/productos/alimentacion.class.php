<?php

require_once 'productos.class.php';
class ALimentacion extends Producto {

    protected $mesCadu;
    protected $anioCadu;

    public function __construct($codigo, $precio, $nombre, $mesCadu, $anioCadu) {
        parent::__construct($codigo, $precio, $nombre);
        $this->mesCadu = $mesCadu;
        $this->anioCadu = $anioCadu;
    }


public function setMesCadu($mesCadu) {
    $this->mesCadu = $mesCadu;
}
public function getMesCadu() {
    return $this->mesCadu;
}
public function setAnioCadu($anioCadu) {
    $this->anioCadu = $anioCadu;
}

public function getAnioCadu() {
    return $this->anioCadu;
}

public function mostrar($codigo, $precio, $nombre, $mesCadu, $anioCadu){
    $this->codigo = $codigo;
    $this->precio = $precio;
    $this->nombre = $nombre;
    $this->mesCadu = $mesCadu;
    $this->anioCadu = $anioCadu;
    
}
}



?>