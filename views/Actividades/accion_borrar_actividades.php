<!DOCTYPE html>
<head>
    <link rel="stylesheet"  href="../../CSS/app.css">    
</head>

<?php
require '../../Models/Models.php';
require '../../controllers/conexionDbController.php';
require '../../controllers/baseController.php';
require '../../controllers/appController.php';

use actividadController\ActividadController;


$actividadController = new ActividadController();
$resultado = $actividadController->delete($_GET['id']);
if ($resultado) {
    $mensaje= 'Actividad borrada';
} else {
    $mensaje= 'No se pudo borrar la actividad';
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