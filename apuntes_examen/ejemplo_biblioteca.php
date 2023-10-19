<?php

class Libro {
    private $titulo;
    private $autor;
    private $isbn;

    public function __construct($titulo, $autor, $isbn) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->isbn = $isbn;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getISBN() {
        return $this->isbn;
    }
}

class Biblioteca {
    private $libros = [];

    public function agregarLibro(Libro $libro) {
        $this->libros[] = $libro;
    }

    public function eliminarLibroPorISBN($isbn) {
        foreach ($this->libros as $key => $libro) {
            if ($libro->getISBN() === $isbn) {
                unset($this->libros[$key]);
            }
        }
    }

    public function listarLibros() {
        return $this->libros;
    }

    public function buscarLibros($termino) {
        $resultados = [];
        foreach ($this->libros as $libro) {
            if (stripos($libro->getTitulo(), $termino) !== false || stripos($libro->getAutor(), $termino) !== false) {
                $resultados[] = $libro;
            }
        }
        return $resultados;
    }
}

// Crear libros
$libro1 = new Libro('El Gran Gatsby', 'F. Scott Fitzgerald', '978-3-16-148410-0');
$libro2 = new Libro('Cien años de soledad', 'Gabriel García Márquez', '978-0-06-083757-3');
$libro3 = new Libro('Don Quijote de la Mancha', 'Miguel de Cervantes', '978-0-312-170317-6');

// Crear una biblioteca y agregar libros
$biblioteca = new Biblioteca();
$biblioteca->agregarLibro($libro1);
$biblioteca->agregarLibro($libro2);
$biblioteca->agregarLibro($libro3);

// Buscar libros por título o autor
$terminoBusqueda = 'Cien años de soledad';
$resultadosBusqueda = $biblioteca->buscarLibros($terminoBusqueda);