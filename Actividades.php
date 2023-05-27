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
        <header>
        <h1>LISTA DE ACTIVIDADES</h1>
        </header>
        <br>
        <br>
        <br>
        <a id= "registrar" href="<?php echo $urlAction?>" class="registrar">Registrar actividades</a>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Actividad</th>
                    <th>Nota</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php     
                    echo '  <h3>Codigo:  ' . $estudiante->getCodigo() . '</h3>'; 
                    echo '  <h3>Nombres:   ' . $estudiante->getNombres() . '</h3>'; 
                $sumatoria = 0.0;    
                foreach ($actividades as $actividad) {
                    echo '<tr>';
                    echo '  <td>' . $actividad->getId() . '</td>';
                    echo '  <td>' . $actividad->getDescripcion() . '</td>';
                    echo '  <td type = "number" step = "0.1">' . $actividad->getNota() . '</td>';
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
                    $sumatoria += $actividad->getNota(); 
                }
                $notificacion = "No hay notas";
                $menPromedio = '<h1 id="notas" >0.0</h1>';
                if(!empty($sumatoria)){
                $prom = $sumatoria/count($actividades);
                if($prom < 3){
                    $notificacion = "Lo sentimos esta perdiendo la materia con: ";
                    $menPromedio = '<h2 id = "perdio">'.$prom.'</h2>';
                }else {
                    $notificacion = "Felicidades esta pasando la materia con: ";
                    $menPromedio = '<h2 id = "paso">'.$prom.'</h2>';
                }
                }
                ?>
            </tbody>
        </table>
        <div>
            <h2 id = "notificacion"><?php echo($notificacion)?></h2>
            <h2><?php echo($menPromedio)?></h2>
        </div>
        <br>
        <br>
        <a class = "registrar" href="index.php">Estudiantes</a>
    </main>
</body>

</html>