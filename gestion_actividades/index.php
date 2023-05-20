<?php
require 'models/actividad.php';
require 'controllers/conexionDbController.php';
require 'controllers/baseController.php';
require 'controllers/actividadesController.php';

use actividadController\ActividadController;

$actividadController = new ActividadController();

$actividades = $actividadController->read();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Actividades</title>
</head>

<body>
    <main>
        <h1>Lista de actividades</h1>
        <a href="" class="boton">Registrar Actividades</a>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Actividad</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($actividades as $actividad) {
                    echo '<tr>';
                    echo '  <td>' . $actividad->getId() . '</td>';
                    echo '  <td>' . $actividad->getDescripcion() . '</td>';
                    echo '  <td>' . $actividad->getNota() . '</td>';
                    echo '  <td>';
                    //$estiloBoton = true;
                    // if ($estiloBoton) {
                    //     echo '<a href="views/accion_borrar_estudiante.php?codigo=' . $estudiante->getId() . '" class="boton" style="text-decoration: none;">Borrar</a>';
                    // } else {
                    //     echo '<a href="views/accion_borrar_estudiante.php?codigo=' . $estudiante->getCodigo() . '">Modificar</a>';
                    // }
                    // echo '      <a href="views/accion_borrar_estudiante.php?codigo=' . $estudiante->getCodigo() . '" class="boton">borrar</a>';
                    echo '  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>