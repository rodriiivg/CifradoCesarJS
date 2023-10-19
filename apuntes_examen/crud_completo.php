<?php

class Libro {
    private $libros = [];

    public function agregarLibro($titulo, $autor, $genero, $anio) {
        $nuevoLibro = [
            'titulo' => $titulo,
            'autor' => $autor,
            'genero' => $genero,
            'anio' => $anio
        ];

        $this->libros[] = $nuevoLibro;
    }

    public function obtenerLibros() {
        return $this->libros;
    }

    public function obtenerLibroPorTitulo($titulo) {
        foreach ($this->libros as $libro) {
            if ($libro['titulo'] === $titulo) {
                return $libro;
            }
        }
        return null;
    }

    public function editarLibro($titulo, $nuevoTitulo, $autor, $genero, $anio) {
        foreach ($this->libros as &$libro) {
            if ($libro['titulo'] === $titulo) {
                $libro['titulo'] = $nuevoTitulo;
                $libro['autor'] = $autor;
                $libro['genero'] = $genero;
                $libro['anio'] = $anio;
                break;
            }
        }
    }

    public function eliminarLibro($titulo) {
        foreach ($this->libros as $key => $libro) {
            if ($libro['titulo'] === $titulo) {
                unset($this->libros[$key]);
                $this->libros = array_values($this->libros);
                break;
            }
        }
    }
}

$libro = new Libro();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["accion"])) {
        switch ($_POST["accion"]) {
            case "agregar":
                $titulo = $_POST["titulo"];
                $autor = $_POST["autor"];
                $genero = $_POST["genero"];
                $anio = $_POST["anio"];
                $libro->agregarLibro($titulo, $autor, $genero, $anio);
                break;
            case "editar":
                $titulo = $_POST["titulo"];
                $nuevoTitulo = $_POST["nuevoTitulo"];
                $autor = $_POST["autor"];
                $genero = $_POST["genero"];
                $anio = $_POST["anio"];
                $libro->editarLibro($titulo, $nuevoTitulo, $autor, $genero, $anio);
                break;
            case "eliminar":
                $titulo = $_POST["titulo"];
                $libro->eliminarLibro($titulo);
                break;
        }
    }
}

$libros = $libro->obtenerLibros();
?>