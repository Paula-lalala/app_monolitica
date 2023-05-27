<!DOCTYPE html>
<head>
    <link rel="stylesheet"  href="../../CSS/app.css">    
</head>

<?php
require '../../Models/Models.php';
require '../../controllers/conexionDbController.php';
require '../../controllers/baseController.php';
require '../../controllers/appController.php';

use estudianteController\EstudianteController;

$estudianteController = new EstudianteController();
$resultado = $estudianteController->delete($_GET['codigo']);
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
    <title>Borrar Estudiante</title>
    <link rel="stylesheet" href="../CSS/styles_accion.css">
</head>
<header>
        <h1><?php echo($mensaje) ?></h1>
</header>
<br>
<a href="../../index.php" class="registrar">Volver al Inicio</a>