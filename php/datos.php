<?php
// Establecer la conexión a la base de datos
$conexion = new mysqli("localhost", "id22213017_haise", "Galletita24!", "id22213017_locallifeexperience");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $tema = $_POST['tema'];
    $mensaje = $_POST['mensaje'];

    // Crear la consulta SQL con parámetros preparados
    $consulta = "INSERT INTO locallifeexperience(nombre, email, telefono, tema, mensaje) 
    VALUES (?, ?, ?, ?, ?)";

    // Preparar la consulta
    $stmt = $conexion->prepare($consulta);

    // Verificar si la consulta se preparó correctamente
    if ($stmt === false) {
        echo "Error al preparar la consulta: " . $conexion->error;
    } else {
        // Vincular los parámetros
        $stmt->bind_param("sssss", $nombre, $email, $telefono, $tema, $mensaje);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            header("Location: contacto.html");
            exit(); // Finalizar el script después de redirigir
        } else {
            echo "Error al ejecutar la consulta: " . $stmt->error;
        }

        // Cerrar la consulta
        $stmt->close();
    }
} else {
    echo "Acceso no autorizado";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
