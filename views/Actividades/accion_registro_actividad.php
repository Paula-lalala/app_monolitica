<?php
require '../../Models/Models.php';
require '../../controllers/conexionDbController.php';
require '../../controllers/baseController.php';
require '../../controllers/appController.php';

use actividad\Actividad;
use actividadController\ActividadController;


$actividad = new Actividad();
$actividad->setId($_POST['id']);
$actividad->setDescripcion($_POST['descripcion']);
$actividad->setNota($_POST['nota']);
$actividad->setCodigoEstudiante($_GET['codigo']);

$actividadController = new ActividadController();
$resultado = $actividadController->create($actividad);
if ($resultado) {
    echo '<h1>Actividad registrado</h1>';
} else {
    echo '<h1>No se pudo registrar la actividad</h1>';
}
?>
<br>
<a href="../../index.php" class="boton">Volver al Inicio</a>