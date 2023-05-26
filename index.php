<?php
require 'Models/Models.php';
require 'controllers/conexionDbController.php';
require 'controllers/baseController.php';
require 'controllers/appController.php';

use estudianteController\EstudianteController;

$estudianteController = new EstudianteController();

$estudiantes = $estudianteController->read();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Estudiantes</title>
    <link rel="stylesheet"  href="CSS/app.css">
</head>

<body>
    <main>
        <h1>Lista de estudiantes</h1>
        <a href="views/Estudiantes/form_estudiante.php" class="boton">Registrar estudiante</a>
        <br>
        <table >
        <br>
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
                        echo '<a href="views/Estudiantes/form_estudiante.php?codigo=' . $estudiante->getCodigo() . '" class="boton" style="text-decoration: none;">Modificar</a>';
                    } else {
                        echo '<a href="views/Estudiantes/form_estudiante.php?codigo=' . $estudiante->getCodigo() . '">Modificar</a>';
                    }
                    echo '      <a href="views/Estudiantes/accion_borrar.php?codigo=' . $estudiante->getCodigo() . '" class="boton">borrar</a>';
                    echo '      <a href="Actividades.php?codigo=' . $estudiante->getCodigo() . '" class="boton">Notas</a>';
                    echo '  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>