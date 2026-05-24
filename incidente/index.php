<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Incidentes</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background: #f4f4f4; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th { background: #333; color: white; padding: 10px; }
        td { padding: 10px; border-bottom: 1px solid #ddd; text-align: center; }
        tr:hover { background: #f1f1f1; }
        a.btn { padding: 6px 12px; text-decoration: none; border-radius: 4px; color: white; }
        a.btn-crear { background: #28a745; margin-bottom: 15px; display: inline-block; }
        a.btn-editar { background: #007bff; }
        a.btn-eliminar { background: #dc3545; }
    </style>
</head>
<body>

<h1>Lista de Incidentes</h1>
<a class="btn btn-crear" href="crear.php">+ Añadir Incidente</a>

<table>
    <thead>
        <tr>
            <th>ID Incidente</th>
            <th>Preso</th>
            <th>Empleado</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include 'conexion.php';

        $sql = "SELECT incidente.id_incidente, incidente.fecha,
                       preso.nombre AS nombre_preso,
                       empleado.nombre AS nombre_empleado
                FROM incidente
                JOIN preso ON incidente.id_preso = preso.id_preso
                JOIN empleado ON incidente.id_empleado = empleado.id_empleado";

        $resultado = mysqli_query($conexion, $sql);

        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<tr>
                <td>{$fila['id_incidente']}</td>
                <td>{$fila['nombre_preso']}</td>
                <td>{$fila['nombre_empleado']}</td>
                <td>{$fila['fecha']}</td>
                <td>
                    <a class='btn btn-editar' href='editar.php?id={$fila['id_incidente']}'>Editar</a>
                    <a class='btn btn-eliminar' href='eliminar.php?id={$fila['id_incidente']}' onclick='return confirm(\"¿Eliminar este incidente?\")'>Eliminar</a>
                </td>
            </tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>
