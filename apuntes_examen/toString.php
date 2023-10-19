<?php 

class Autor {
    private $nombre;
    private $nacionalidad;

    public function __construct($nombre, $nacionalidad) {
        $this->nombre = $nombre;
        $this->nacionalidad = $nacionalidad;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getNacionalidad() {
        return $this->nacionalidad;
    }

    public function __toString() {
        return "Autor: {$this->nombre} ({$this->nacionalidad})";
    }
}

class Libro {
    private $titulo;
    private $autor;
    private $publicacion;

    public function __construct($titulo, Autor $autor, $publicacion) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->publicacion = $publicacion;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getPublicacion() {
        return $this->publicacion;
    }

    public function __toString() {
        return "Libro: {$this->titulo}, " . $this->autor . ", Publicado en {$this->publicacion}";
    }
}

// Crear autores
$autor1 = new Autor("J.K. Rowling", "Reino Unido");
$autor2 = new Autor("George Orwell", "Reino Unido");

// Crear libros
$libro1 = new Libro("Harry Potter y la Piedra Filosofal", $autor1, 1997);
$libro2 = new Libro("1984", $autor2, 1949);

// Mostrar información de los autores y libros
echo $autor1 . "\n";
echo $autor2 . "\n";
echo $libro1 . "\n";
echo $libro2 . "\n";
?>