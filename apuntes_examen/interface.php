<?php
// Definimos una interfaz llamada "ReproductorMultimedia"
interface ReproductorMultimedia {
    public function play();
    public function pause();
    public function stop();
    public function adelantar($segundos);
    public function retroceder($segundos);
}

// Una clase que implementa la interfaz ReproductorMultimedia
class ReproductorVideo implements ReproductorMultimedia {
    public function play() {
        // Implementación específica para iniciar la reproducción de un video
        echo "Iniciando la reproducción de video." . PHP_EOL;
    }

    public function pause() {
        // Implementación específica para pausar la reproducción de un video
        echo "Pausando la reproducción de video." . PHP_EOL;
    }

    public function stop() {
        // Implementación específica para detener la reproducción de un video
        echo "Deteniendo la reproducción de video." . PHP_EOL;
    }

    public function adelantar($segundos) {
        // Implementación específica para adelantar en el video
        echo "Adelantando $segundos segundos en el video." . PHP_EOL;
    }

    public function retroceder($segundos) {
        // Implementación específica para retroceder en el video
        echo "Retrocediendo $segundos segundos en el video." . PHP_EOL;
    }
}

// Crear una instancia de la clase ReproductorVideo
$reproductor = new ReproductorVideo();

// Utilizar los métodos de la interfaz
$reproductor->play();
$reproductor->adelantar(30);
$reproductor->pause();
$reproductor->retroceder(10);
$reproductor->stop();
?>