<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
</head>

<body>
    <?php

    // Miramos el valor de la variable "action", si existe. Si no, le asignamos una acción por defecto
    if (isset($_REQUEST["action"])) {
        $action = $_REQUEST["action"];
    } else {
        $action = "mostrarListaLibros";  // Acción por defecto
    }

    // Creamos un objeto de tipo Biblioteca y llamamos al método $action()
    $biblio = new Biblioteca();
    $biblio->$action();

    class Biblioteca {
        private $libros = [];  // Array para simular libros
        private $autores = [];  // Array para simular autores

        public function __construct() {
            $this->inicializarDatos();  // Inicializa los datos de prueba
        }

        // Inicializa datos de prueba
        private function inicializarDatos() {
            $this->libros[] = [
                "idLibro" => 1,
                "titulo" => "El Señor de los Anillos",
                "genero" => "Fantasía",
                "numPaginas" => 1000,
                "autores" => [1, 2]
            ];
            $this->libros[] = [
                "idLibro" => 2,
                "titulo" => "Cien años de soledad",
                "genero" => "Realismo mágico",
                "numPaginas" => 400,
                "autores" => [3]
            ];

            $this->autores[] = [
                "idAutor" => 1,
                "nombre" => "J.R.R.",
                "apellido" => "Tolkien"
            ];
            $this->autores[] = [
                "idAutor" => 2,
                "nombre" => "C.S.",
                "apellido" => "Lewis"
            ];
            $this->autores[] = [
                "idAutor" => 3,
                "nombre" => "Gabriel",
                "apellido" => "García Márquez"
            ];
        }

        // --------------------------------- MOSTRAR LISTA DE LIBROS ----------------------------------------
        public function mostrarListaLibros() {
            echo "<h1>Biblioteca</h1>";

            // Muestra la lista de libros
            echo "<table border='1'>";
            echo "<tr><th>Título</th><th>Género</th><th>Número de Páginas</th><th>Autores</th></tr>";

            foreach ($this->libros as $libro) {
                echo "<tr>";
                echo "<td>{$libro['titulo']}</td>";
                echo "<td>{$libro['genero']}</td>";
                echo "<td>{$libro['numPaginas']}</td>";
                echo "<td>" . $this->obtenerAutores($libro['autores']) . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        }

        // Obtiene los nombres de los autores para un libro
        private function obtenerAutores($autoresIds) {
            $nombresAutores = [];
            foreach ($autoresIds as $autorId) {
                $autor = $this->obtenerAutorPorId($autorId);
                if ($autor) {
                    $nombresAutores[] = "{$autor['nombre']} {$autor['apellido']}";
                }
            }
            return implode(', ', $nombresAutores);
        }

        // Obtiene un autor por su ID
        private function obtenerAutorPorId($autorId) {
            foreach ($this->autores as $autor) {
                if ($autor['idAutor'] === $autorId) {
                    return $autor;
                }
            }
            return null;
        }

        // Otros métodos (formularioInsertarLibros, insertarLibro, borrarLibro, formularioModificarLibro, modificarLibro, buscarLibros) deberían ser implementados de manera similar, simulando las operaciones correspondientes en los arrays de datos.

     // class
    public function mostrarListaAutores() {
        echo "<h1>Autores</h1>";

        // Muestra la lista de autores
        echo "<table border='1'>";
        echo "<tr><th>Nombre</th><th>Apellido</th></tr>";

        foreach ($this->autores as $autor) {
            echo "<tr>";
            echo "<td>{$autor['nombre']}</td>";
            echo "<td>{$autor['apellido']}</td>";
            echo "</tr>";
        }

        echo "</table>";
    }

    // --------------------------------- INSERTAR AUTOR ----------------------------------------
    public function insertarAutor($nombre, $apellido) {
        $idAutor = count($this->autores) + 1; // Genera un nuevo ID
        $this->autores[] = [
            "idAutor" => $idAutor,
            "nombre" => $nombre,
            "apellido" => $apellido
        ];
        echo "Autor insertado con éxito.";
    }

    // --------------------------------- BORRAR AUTOR ----------------------------------------
    public function borrarAutor($idAutor) {
        $index = $this->encontrarIndiceAutor($idAutor);
        if ($index !== -1) {
            unset($this->autores[$index]);
            $this->autores = array_values($this->autores); // Reindexar el array
            echo "Autor borrado con éxito.";
        } else {
            echo "No se encontró el autor con el ID proporcionado.";
        }
    }

    // --------------------------------- MODIFICAR AUTOR ----------------------------------------
    public function modificarAutor($idAutor, $nombre, $apellido) {
        $index = $this->encontrarIndiceAutor($idAutor);
        if ($index !== -1) {
            $this->autores[$index]["nombre"] = $nombre;
            $this->autores[$index]["apellido"] = $apellido;
            echo "Autor modificado con éxito.";
        } else {
            echo "No se encontró el autor con el ID proporcionado.";
        }
    }

    // Encuentra el índice de un autor en el array de autores
    private function encontrarIndiceAutor($idAutor) {
        foreach ($this->autores as $index => $autor) {
            if ($autor['idAutor'] === $idAutor) {
                return $index;
            }
        }
        return -1;
    }
}
    ?>
//INSERTAR
<form action="index.php" method="post">
    <input type="hidden" name="action" value="insertarAutor">
    <label for="nombre">Nombre del Autor:</label>
    <input type="text" name="nombre" required>
    <label for="apellido">Apellido del Autor:</label>
    <input type="text" name="apellido" required>
    <button type="submit">Insertar Autor</button>
</form>
Formulario para Borrar Autor:
Este formulario permitirá al usuario borrar un autor existente de la biblioteca.

<form action="index.php" method="post">
    <input type="hidden" name="action" value="borrarAutor">
    <label for="idAutor">ID del Autor a Borrar:</label>
    <input type="number" name="idAutor" required>
    <button type="submit">Borrar Autor</button>
</form>
Formulario para Modificar Autor:
Este formulario permitirá al usuario modificar los detalles de un autor existente.

<form action="index.php" method="post">
    <input type="hidden" name="action" value="modificarAutor">
    <label for="idAutor">ID del Autor a Modificar:</label>
    <input type="number" name="idAutor" required>
    <label for="nombre">Nuevo Nombre del Autor:</label>
    <input type="text" name="nombre" required>
    <label for="apellido">Nuevo Apellido del Autor:</label>
    <input type="text" name="apellido" required>
    <button type="submit">Modificar Autor</button>
</form>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
</head>

<body>
    <?php
    // Incluye tu clase Biblioteca y crea una instancia
    include "Biblioteca.php";
    $biblio = new Biblioteca();

    if (isset($_GET["action"])) {
        $action = $_GET["action"];

        // Maneja las acciones en función de lo que se haya seleccionado
        if ($action === "mostrarListaAutores") {
            $biblio->mostrarListaAutores();
        } elseif ($action === "formularioInsertarAutor") {
            // Muestra el formulario para insertar un autor
            echo "<h1>Insertar Autor</h1>";
            echo "<form action='index.php' method='post'>
                    <input type='hidden' name='action' value='insertarAutor'>
                    Nombre del Autor: <input type='text' name='nombre' required><br>
                    Apellido del Autor: <input type='text' name='apellido' required><br>
                    <input type='submit' value='Insertar Autor'>
                </form>";
        } elseif ($action === "formularioBorrarAutor") {
            // Muestra el formulario para borrar un autor
            echo "<h1>Borrar Autor</h1>";
            echo "<form action='index.php' method='post'>
                    <input type='hidden' name='action' value='borrarAutor'>
                    ID del Autor a Borrar: <input type='number' name='idAutor' required><br>
                    <input type='submit' value='Borrar Autor'>
                </form>";
        } elseif ($action === "formularioModificarAutor") {
            // Muestra el formulario para modificar un autor
            echo "<h1>Modificar Autor</h1>";
            echo "<form action='index.php' method='post'>
                    <input type='hidden' name='action' value='modificarAutor'>
                    ID del Autor a Modificar: <input type='number' name='idAutor' required><br>
                    Nuevo Nombre del Autor: <input type='text' name='nombre' required><br>
                    Nuevo Apellido del Autor: <input type='text' name='apellido' required><br>
                    <input type='submit' value='Modificar Autor'>
                </form>";
        }

        // Maneja los métodos correspondientes según la acción
        if ($action === "insertarAutor" && isset($_POST["nombre"]) && isset($_POST["apellido"])) {
            $biblio->insertarAutor($_POST["nombre"], $_POST["apellido"]);
        } elseif ($action === "borrarAutor" && isset($_POST["idAutor"])) {
            $biblio->borrarAutor($_POST["idAutor"]);
        } elseif ($action === "modificarAutor" && isset($_POST["idAutor"]) && isset($_POST["nombre"]) && isset($_POST["apellido"])) {
            $biblio->modificarAutor($_POST["idAutor"], $_POST["nombre"], $_POST["apellido"]);
        }
    }
    ?>

    <!-- Agrega botones o enlaces para interactuar con los métodos -->
    <button><a href="index.php?action=mostrarListaAutores">Mostrar Lista de Autores</a></button>
    <button><a href="index.php?action=formularioInsertarAutor">Insertar Autor</a></button>
    <button><a href="index.php?action=formularioBorrarAutor">Borrar Autor</a></button>
    <button><a href="index.php?action=formularioModificarAutor">Modificar Autor</a></button>

</body>
</html>

</body>
</html>