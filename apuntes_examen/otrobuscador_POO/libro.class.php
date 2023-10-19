<?php
class Libro {
    private $titulo;
    private $autor;

    public function __construct($titulo, Autor $autor) {
        $this->titulo = $titulo;
        $this->autor = $autor;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getAutor() {
        return $this->autor;
    }
}
?>