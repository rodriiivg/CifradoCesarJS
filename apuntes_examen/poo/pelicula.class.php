<?php

require_once 'actor.class.php';

class Pelicula {

    private string $titulo;
    private string $imagen;
    private array $actores;

    public function __construct($titulo, $imagen, Actor... $actores) {
        $this->titulo = $titulo;
        $this->imagen = $imagen;
        $this->actores = $actores;

    }

    public function setTitulo($nuevoTitulo){
        $this->titulo = $nuevoTitulo;
     }
     public function getTitulo() {
        return $this->titulo;
     }
     public function setImagen($nuevaImagen){
        $this->imagen = $nuevaImagen;
     }
     public function getImagen() {
        return $this->imagen;
     }

     public function setActor($nuevoActor){
        $this->actores = $nuevoActor;
     }
     public function getActor() {
        return $this->actores;
     }
}


?>