<?php
include 'conexion.php';

$id = mysqli_real_escape_string($conexion, $_GET['id']);

$sql = "DELETE FROM preso WHERE id_preso='$id'";

if (mysqli_query($conexion, $sql)) {
    header("Location: index.php");
    exit();
} else {
    die("Error al eliminar: " . mysqli_error($conexion));
}
?>
