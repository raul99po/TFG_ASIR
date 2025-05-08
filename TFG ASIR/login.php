<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";  // Tu nombre de usuario para MySQL (por lo general es 'root' en localhost)
$password = "Hart4200-";      // Tu contraseña para MySQL (en localhost por lo general está vacía)
$dbname = "nintendo_db"; // Asegúrate de que la base de datos exista

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario (por POST)
$user = $_POST['username'];
$pass = $_POST['password'];

// Encriptar la contraseña antes de guardarla en la base de datos
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

// Preparar la consulta SQL
$sql = "INSERT INTO users (username, password) VALUES (?, ?)";

// Preparar la sentencia
$stmt = $conn->prepare($sql);

// Enlazar los parámetros
$stmt->bind_param("ss", $user, $hashed_password);

// Ejecutar la sentencia
if ($stmt->execute()) {
    echo "Usuario registrado con éxito"; // Mensaje de éxito
} else {
    echo "Error al registrar el usuario: " . $stmt->error; // Mensaje de error
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
