<?php
class Usuario {
    private $nombre;
    private $password;
    private $email;

    public function __construct($nombre, $password, $email) {
        $this->nombre = $nombre;
        $this->password = $password;
        $this->email = $email;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEmail() {
        return $this->email;
    }
}

class Registro {
    private $usuarios = [];

    public function agregarUsuario(Usuario $usuario) {
        $this->usuarios[] = $usuario;
    }

    public function buscarUsuarioPorEmail($email) {
        foreach ($this->usuarios as $usuario) {
            if ($usuario->getEmail() === $email) {
                return $usuario;
            }
        }
        return null;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $registro = new Registro();

    if (!$registro->buscarUsuarioPorEmail($email)) {
        $nuevoUsuario = new Usuario($nombre, $password, $email);
        $registro->agregarUsuario($nuevoUsuario);
        echo "Registro exitoso para $nombre.";
    } else {
        echo "Ya existe un usuario registrado con este correo electrónico.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Registro</title>
</head>
<body>
    <h1>Registro de Usuario</h1>
    <form method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required><br>

        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" required><br>

        <input type="submit" value="Registrarse">
    </form>
</body>
</html>