class Usuario {
    private $usuarios = array();

    public function crearUsuario($nombre, $email) {
        $usuario = array(
            'nombre' => $nombre,
            'email' => $email,
        );
        $this->usuarios[] = $usuario;
        return true;
    }

    public function obtenerUsuarios() {
        return $this->usuarios;
    }

    public function obtenerUsuarioPorEmail($email) {
        foreach ($this->usuarios as $usuario) {
            if ($usuario['email'] === $email) {
                return $usuario;
            }
        }
        return null;
    }

    public function actualizarUsuario($email, $nuevoNombre) {
        foreach ($this->usuarios as &$usuario) {
            if ($usuario['email'] === $email) {
                $usuario['nombre'] = $nuevoNombre;
                return true;
            }
        }
        return false;
    }

    public function eliminarUsuario($email) {
        foreach ($this->usuarios as $key => $usuario) {
            if ($usuario['email'] === $email) {
                unset($this->usuarios[$key]);
                return true;
            }
        }
        return false;
    }
}
Luego, crea un archivo PHP para manejar las solicitudes GET y POST:

php
Copy code
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = new Usuario();

    if (isset($_POST['accion'])) {
        switch ($_POST['accion']) {
            case 'crear':
                $nombre = $_POST['nombre'];
                $email = $_POST['email'];
                $usuario->crearUsuario($nombre, $email);
                break;
            case 'actualizar':
                $email = $_POST['email'];
                $nuevoNombre = $_POST['nuevoNombre'];
                $usuario->actualizarUsuario($email, $nuevoNombre);
                break;
            case 'eliminar':
                $email = $_POST['email'];
                $usuario->eliminarUsuario($email);
                break;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $usuario = new Usuario();
    $usuarios = $usuario->obtenerUsuarios();
    $emailParaEditar = isset($_GET['editar']) ? $_GET['editar'] : '';

    // Aquí puedes generar la interfaz HTML para mostrar la lista de usuarios y permitir las operaciones CRUD.
}
Finalmente, crea un formulario HTML para interactuar con tu aplicación:

html
Copy code
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD de Usuarios</title>
</head>
<body>
    <h1>CRUD de Usuarios</h1>

    <h2>Crear Usuario</h2>
    <form method="POST" action="tu_script.php">
        <input type="hidden" name="accion" value="crear">
        Nombre: <input type="text" name="nombre" required>
        Email: <input type="email" name="email" required>
        <button type="submit">Crear</button>
    </form>

    <h2>Editar Usuario</h2>
    <form method="POST" action="tu_script.php">
        <input type="hidden" name="accion" value="actualizar">
        Email del usuario a editar: <input type="email" name="email" required>
        Nuevo Nombre: <input type="text" name="nuevoNombre" required>
        <button type="submit">Actualizar</button>
    </form>

    <h2>Eliminar Usuario</h2>
    <form method="POST" action="tu_script.php">
        <input type="hidden" name="accion" value="eliminar">
        Email del usuario a eliminar: <input type="email" name="email" required>
        <button type="submit">Eliminar</button>
    </form>

    <!-- Mostrar lista de usuarios y manejar operaciones CRUD -->
</body>
</html>
Asegúrate de reemplazar "tu_script.php" con el nombre de tu archivo PHP que maneja las solicitudes GET y POST. Este ejemplo proporciona la estructura básica para un CRUD de usuarios utilizando POO, POST y GET, pero puedes personalizarlo según tus necesidades específicas.