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
    $mensaje= 'Actividad modificada';
} else {
    $mensaje= 'No se pudo modificar la actividad';
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