<?php
class Pelicula {
   private $titulo;
   private $imagen;
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

   public function setActores($nuevosActores){
       $this->actores = $nuevosActores;
   }
   public function getActores() {
       return $this->actores;
   }
}

?>