<?php
require_once "conexion.php";

if (mysqli_connect_errno()){
    echo "Error de conexión:" .mysqli_connect_errno();
}

$SQL="INSERT INTO credenciales (usuario,contraseña) VALUES('".$_POST['usuario']."','".$_POST['contraseña']."')";
mysqli_query($conex,$SQL);
mysqli_close($conex);
header("Location: index.php"); // Asegúrate de incluir comillas
exit();
?>