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

$id = $_GET['id'];
$codigo = $_GET['codigo'];
$actividad = new Actividad();
$actividad ->setId($_POST['id']);
$actividad ->setDescripcion($_POST['descripcion']);
$actividad ->setNota($_POST['nota']);

$actividadController = new ActividadController();
$resultado = $actividadController->update($actividad->getId(), $actividad);
if ($resultado) {
    echo '<h1>Actividad modificada</h1>';
} else {
    echo '<h1>No se pudo modificar la actividad</h1>';
}
?>
<br>
<a href="../../index.php" class="boton">Volver al Inicio</a>