<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Presos</title>
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

<h1>Lista de Presos</h1>
<a class="btn btn-crear" href="crear.php">+ Añadir Preso</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Fecha Nacimiento</th>
            <th>Clasificación</th>
            <th>ID Celda</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include 'conexion.php';
        $resultado = mysqli_query($conexion, "SELECT * FROM preso");
        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<tr>
                <td>{$fila['id_preso']}</td>
                <td>{$fila['dni_preso']}</td>
                <td>{$fila['nombre']}</td>
                <td>{$fila['fecha_nacimiento']}</td>
                <td>{$fila['clasificacion']}</td>
                <td>{$fila['id_celda']}</td>
                <td>
                    <a class='btn btn-editar' href='editar.php?id={$fila['id_preso']}'>Editar</a>
                    <a class='btn btn-eliminar' href='eliminar.php?id={$fila['id_preso']}' onclick='return confirm(\"¿Eliminar este preso?\")'>Eliminar</a>
                </td>
            </tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>
