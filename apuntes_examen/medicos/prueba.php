<?php
require_once 'medico.class.php';
require_once 'familia.class.php';
require_once 'urgencia.class.php';

$medicos = [];

$medicoFamilia1 = new Familia("Dr. Gonzalez", 45, "mañana", 50);
$medicoFamilia2 = new Familia("Dr. Rodriguez", 55, "tarde", 60);
$medicoFamilia3 = new Familia("Dr. Paez", 65, "tarde", 70);

$medicoUrgencia1 = new Urgencia("Dr. Perez", 50, "mañana", "Psiquiatría");
$medicoUrgencia2 = new Urgencia("Dr. Valdes", 70, "tarde", "Neurología");
$medicoUrgencia3 = new Urgencia("Dr. Garcia", 62, "tarde", "Ludopatía");

$medicos[] = $medicoFamilia1;
$medicos[] = $medicoFamilia2;
$medicos[] = $medicoFamilia3;
$medicos[] = $medicoUrgencia1;
$medicos[] = $medicoUrgencia2;
$medicos[] = $medicoUrgencia3;

echo "<h2>Lista de Médicos:</h2>";
foreach ($medicos as $medico) {
    $medico->mostrarDatos();
}

$medicosTardeMas60 = 0;
foreach ($medicos as $medico) {
    if ($medico instanceof Urgencia && $medico->getTurno() == "tarde" && $medico->getEdad() > 60) {
        $medicosTardeMas60++;
    }
}
echo "<h3>Número de médicos de Urgencia con más de 60 años en turno de tarde: $medicosTardeMas60</h3>";

if (isset($_POST['numPacientes'])) {
    $numPacientesBuscados = intval($_POST['numPacientes']);
    echo "<h2>Médicos de Familia con $numPacientesBuscados o más pacientes:</h2>";
    foreach ($medicos as $medico) {
        if ($medico instanceof Familia && $medico->getNumPacientes() >= $numPacientesBuscados) {
            $medico->mostrarDatos();
        }
    }
} else {
    echo '<h2>Ingrese el número de pacientes:</h2>
    <form method="POST">
        <label for="numPacientes">Número de Pacientes:</label>
        <input type="number" name="numPacientes" required>
        <input type="submit" value="Buscar">
    </form>';
}
?>

    
</body>
</html>