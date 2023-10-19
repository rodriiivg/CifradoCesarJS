<?php
require_once 'productos.class.php';

class Electronica extends Productos {
    protected $plazoGarantia;

    public function __construct($codigo, $precio, $nombre, $plazoGarantia) {
        parent::__construct($codigo, $precio, $nombre);
        $this->plazoGarantia = $plazoGarantia;
    }

    public function setPlazoGarantia($plazoGarantia) {
        $this->plazoGarantia = $plazoGarantia;
    }

    public function getPlazoGarantia() {
        return $this->plazoGarantia;
    }
}
?>