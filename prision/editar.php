<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Preso</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background: #f4f4f4; }
        h1 { color: #333; }
        form { background: white; padding: 20px; border-radius: 8px; max-width: 500px; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input { width: 100%; padding: 8px; margin-top: 4px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        button { margin-top: 20px; padding: 10px 20px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #0056b3; }
        a { display: inline-block; margin-top: 10px; color: #007bff; }
        .error { color: red; margin-top: 10px; }
    </style>
</head>
<body>

<h1>Editar Preso</h1>

<?php
include 'conexion.php';

$id = mysqli_real_escape_string($conexion, $_GET['id']);

// Actualizar si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dni      = mysqli_real_escape_string($conexion, $_POST['dni_preso']);
    $nombre   = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $fecha    = mysqli_real_escape_string($conexion, $_POST['fecha_nacimiento']);
    $clasif   = mysqli_real_escape_string($conexion, $_POST['clasificacion']);
    $id_celda = mysqli_real_escape_string($conexion, $_POST['id_celda']);

    $sql = "UPDATE preso SET
                dni_preso='$dni',
                nombre='$nombre',
                fecha_nacimiento='$fecha',
                clasificacion='$clasif',
                id_celda='$id_celda'
            WHERE id_preso='$id'";

    if (mysqli_query($conexion, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "<p class='error'>Error: " . mysqli_error($conexion) . "</p>";
    }
}

// Cargar datos actuales
$resultado = mysqli_query($conexion, "SELECT * FROM preso WHERE id_preso='$id'");
$fila = mysqli_fetch_assoc($resultado);

if (!$fila) {
    echo "<p class='error'>Preso no encontrado.</p>";
    exit();
}
?>

<form method="POST">
    <label>DNI:</label>
    <input type="text" name="dni_preso" value="<?= htmlspecialchars($fila['dni_preso']) ?>" required>

    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= htmlspecialchars($fila['nombre']) ?>" required>

    <label>Fecha de Nacimiento:</label>
    <input type="date" name="fecha_nacimiento" value="<?= $fila['fecha_nacimiento'] ?>">

    <label>Clasificación:</label>
    <input type="number" name="clasificacion" value="<?= $fila['clasificacion'] ?>">

    <label>ID Celda:</label>
    <input type="number" name="id_celda" value="<?= $fila['id_celda'] ?>">

    <button type="submit">Actualizar</button>
</form>

<a href="index.php">← Volver al listado</a>

</body>
</html>
