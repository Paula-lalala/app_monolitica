<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../CSS/app.css">
</head>
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
    $mensaje= 'Actividad registrada';
} else {
    $mensaje= 'No se pudo registrar la actividad';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/styles_accion.css">
</head>
<header>
        <h1><?php echo($mensaje) ?></h1>
</header>
<br>
<a href="../../index.php" class="registrar">Volver al Inicio</a>