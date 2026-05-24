<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir Incidente</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background: #f4f4f4; }
        h1 { color: #333; }
        form { background: white; padding: 20px; border-radius: 8px; max-width: 500px; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input, select { width: 100%; padding: 8px; margin-top: 4px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        button { margin-top: 20px; padding: 10px 20px; background: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #218838; }
        a { display: inline-block; margin-top: 10px; color: #007bff; }
        .error { color: red; margin-top: 10px; }
    </style>
</head>
<body>

<h1>Añadir Incidente</h1>

<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_preso    = mysqli_real_escape_string($conexion, $_POST['id_preso']);
    $id_empleado = mysqli_real_escape_string($conexion, $_POST['id_empleado']);
    $fecha       = mysqli_real_escape_string($conexion, $_POST['fecha']);

    $sql = "INSERT INTO incidente (id_preso, id_empleado, fecha)
            VALUES ('$id_preso', '$id_empleado', '$fecha')";

    if (mysqli_query($conexion, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "<p class='error'>Error: " . mysqli_error($conexion) . "</p>";
    }
}

$presos    = mysqli_query($conexion, "SELECT id_preso, nombre FROM preso");
$empleados = mysqli_query($conexion, "SELECT id_empleado, nombre FROM empleado");
?>

<form method="POST">
    <label>Preso:</label>
    <select name="id_preso" required>
        <option value="">-- Selecciona un preso --</option>
        <?php while ($p = mysqli_fetch_assoc($presos)): ?>
            <option value="<?= $p['id_preso'] ?>"><?= htmlspecialchars($p['nombre']) ?></option>
        <?php endwhile; ?>
    </select>

    <label>Empleado:</label>
    <select name="id_empleado" required>
        <option value="">-- Selecciona un empleado --</option>
        <?php while ($e = mysqli_fetch_assoc($empleados)): ?>
            <option value="<?= $e['id_empleado'] ?>"><?= htmlspecialchars($e['nombre']) ?></option>
        <?php endwhile; ?>
    </select>

    <label>Fecha:</label>
    <input type="datetime-local" name="fecha">

    <button type="submit">Guardar</button>
</form>

<a href="index.php">← Volver al listado</a>

</body>
</html>
