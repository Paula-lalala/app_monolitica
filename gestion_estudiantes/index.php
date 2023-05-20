<?php
require 'models/estudiante.php';
require 'controllers/conexionDbController.php';
require 'controllers/baseController.php';
require 'controllers/estudiantesController.php';

use estudianteController\EstudianteController;

$estudianteController = new EstudianteController();

$estudiantes = $estudianteController->read();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Estudiantes</title>
    <link rel="stylesheet" type="text/css" href="gestion_estudiantes.css">
</head>

<body>
    <main>
        <h1>Lista de estudiantes</h1>
        <a href="views/form_estudiante.php" class="boton">Registrar usuario</a>
        <table>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($estudiantes as $estudiante) {
                    echo '<tr>';
                    echo '  <td>' . $estudiante->getCodigo() . '</td>';
                    echo '  <td>' . $estudiante->getNombres() . '</td>';
                    echo '  <td>' . $estudiante->getApellidos() . '</td>';
                    echo '  <td>';
                    $estiloBoton = true;
                    if ($estiloBoton) {
                        echo '<a href="views/accion_borrar_estudiante.php?codigo=' . $estudiante->getCodigo() . '" class="boton" style="text-decoration: none;">Modificar</a>';
                    } else {
                        echo '<a href="views/accion_borrar_estudiante.php?codigo=' . $estudiante->getCodigo() . '">Modificar</a>';
                    }
                    echo '      <a href="views/accion_borrar_estudiante.php?codigo=' . $estudiante->getCodigo() . '" class="boton">borrar</a>';
                    echo '      <a href="../gestion_actividades/index.php" class="boton">Notas</a>';
                    echo '  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>