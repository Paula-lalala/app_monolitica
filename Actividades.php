<?php
require 'Models/Models.php';
require 'controllers/conexionDbController.php';
require 'controllers/baseController.php';
require 'controllers/appController.php';

use estudianteController\EstudianteController;
$estudianteController = new EstudianteController();
use estudiante\Estudiante;

use actividadController\ActividadController;
$actividadController = new ActividadController();

$codigoEstudiante=$_GET['codigo'];
$codigo=$codigoEstudiante;
$actividades=$actividadController->read($codigoEstudiante);
$urlAction="views/Actividades/form_actividad.php?codigo=".$codigoEstudiante;
$estudiante= new Estudiante();
$estudiante=$estudianteController->readRow($codigo);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Actividades</title>
    <link rel="stylesheet" href="CSS/app.css">
</head>

<body>
    <main>
        <h1>Lista de actividades</h1>
        <a id= "registrar" href="<?php echo $urlAction?>" class="boton">Registrar actividades</a>
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
                    echo '  <h3>Codigo:' . $estudiante->getCodigo() . '</h1>'; 
                    echo '  <h3>Nombres: ' . $estudiante->getNombres() . '</h1>';     
                foreach ($actividades as $actividad) {
                    echo '<tr>';
                    echo '  <td>' . $actividad->getId() . '</td>';
                    echo '  <td>' . $actividad->getDescripcion() . '</td>';
                    echo '  <td>' . $actividad->getNota() . '</td>';
                    echo '  <td>';
                    $estiloBoton = true;
                     if ($estiloBoton) {
                         echo '<a href="views/Actividades/accion_borrar_actividades.php?id=' . $actividad->getId() . '" class="boton";">Borrar</a>';
                     } else {
                         echo '<a href="views/Actividades/accion_borrar_actividades.php?id=' . $actividad->getId() . '">Borrar</a>';
                     }
                    echo '      <a href="views/Actividades/form_actividad.php?id=' . $actividad->getId() . '&codigo= '. $codigoEstudiante .'" class="boton">Modificar</a>';
                    echo '  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </main>

</body>

</html>