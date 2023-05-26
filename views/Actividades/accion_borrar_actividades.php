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

$margen = '10px';
$alineacionTexto = 'center';

$actividadController = new ActividadController();
$resultado = $actividadController->delete($_GET['id']);
if ($resultado) {
    echo '<h1 style="margin: ' . $margen . '; text-align: ' . $alineacionTexto . ';">Actividad borrada</h1>';
} else {
    echo '<h1style="margin: ' . $margen . '; text-align: ' . $alineacionTexto . ';">No se pudo borrar la Actividad</h1>';
}
?>

<a href="../../index.php" class="boton">Volver al Inicio</a>
</html>