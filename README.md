# Base de Datos - Control y Supervisión de una Prisión

## Descripción
Base de Datos orientada al control y supervisión de una prisión.
Incluye gestión de presos, empleados, visitas, incidentes, programas de rehabilitación,
ubicaciones, artículos y más.

## Tecnologías utilizadas
- PHP
- MySQL
- XAMPP (entorno de desarrollo local)
- Infinity Free (hosting en producción)

## Estructura del proyecto
/prision       --> CRUD de la tabla 'preso'
/incidente     --> CRUD de la tabla 'incidente' (relación muchos a muchos entre preso y empleado)

## Instalación en local (XAMPP)
1. Instalar XAMPP y arrancar Apache y MySQL
2. Abrir phpMyAdmin (http://localhost/phpmyadmin)
3. Crear una base de datos llamada 'prision'
4. Importar el fichero 'prision.sql' en la base de datos creada
5. Copiar las carpetas 'prision' e 'incidente' dentro de C:\xampp\htdocs\
6. Acceder desde el navegador:
   - http://localhost/prision/index.php
   - http://localhost/incidente/index.php

## Configuración de la conexión
Editar el fichero 'conexion.php' de cada carpeta con los datos correctos:
   $host = "localhost";
   $usuario = "root";
   $password = "";
   $base_datos = "prision";

## Acceso en producción (Infinity Free)
- URL: http://prision.infinityfreeapp.com/prision/index.php
- URL: http://prision.infinityfreeapp.com/incidente/index.php

## Tablas de la base de datos
- preso
- empleado
- visitante
- visita
- incidente
- programa
- salud
- ubicacion
- articulo
- cargo
- tipo_articulo
- tipo_programa
- tipo_ubicacion

## Funcionalidades del CRUD
Tabla 'preso':
  - Listar todos los presos
  - Añadir un nuevo preso
  - Editar un preso existente
  - Eliminar un preso

Tabla 'incidente' (muchos a muchos entre preso y empleado):
  - Listar todos los incidentes mostrando nombre del preso y nombre del empleado
  - Añadir un nuevo incidente
  - Editar un incidente existente
  - Eliminar un incidente

## Autor
Alejandro Ibáñez
