<?php

$conexion = new mysqli("localhost", "id22213017_haise", "Galletita24!", "id22213017_locallifeexperience");

if ($conexion->connect_error) {
    die("La conexión ha fallado: " . $conexion->connect_error);
}

echo "La conexión se ha establecido correctamente.";

$conexion->close();

?>