<?PHP
class MiClase {
    // Atributo estático
    public static $contador = 0;

    // Método estático para incrementar el contador
    public static function incrementarContador() {
        self::$contador++;
    }

    // Método estático para obtener el valor del contador
    public static function obtenerContador() {
        return self::$contador;
    }
}

// Acceso al atributo estático sin crear una instancia de la clase
echo "El contador es: " . MiClase::$contador . PHP_EOL;

// Llamada al método estático para incrementar el contador
MiClase::incrementarContador();
MiClase::incrementarContador();

// Acceso al atributo estático nuevamente
echo "El contador es: " . MiClase::obtenerContador() . PHP_EOL;







//CONSTANTES

class BaseDatos{
 const USUARIO = "dwes";
}
echo BaseDatos::USUARIO;
?>