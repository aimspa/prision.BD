<?php
$host = "sql302.infinityfree.com";
$usuario = "if0_41888934";
$password = "avgragepasswd";
$base_datos = "if0_41888934_mydb";

$conexion = mysqli_connect($host, $usuario, $password, $base_datos);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

mysqli_set_charset($conexion, "utf8");
?>