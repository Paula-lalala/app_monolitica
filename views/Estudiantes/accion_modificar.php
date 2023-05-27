<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../CSS/app.css">
</head>
<html>
<?php
require '../../Models/Models.php';
require '../../controllers/conexionDbController.php';
require '../../controllers/baseController.php';
require '../../controllers/appController.php';

use estudiante\Estudiante;
use estudianteController\EstudianteController;

$estudiante = new Estudiante();
$estudiante->setCodigo($_POST['codigo']);
$estudiante->setNombres($_POST['nombre']);
$estudiante->setApellidos($_POST['apellido']);

$estudianteController = new EstudianteController();
$resultado = $estudianteController->update($estudiante->getCodigo(), $estudiante);
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
    <title>Modificar estudiante</title>
    <link rel="stylesheet" href="../CSS/styles_accion.css">
</head>
<header>
        <h1><?php echo($mensaje) ?></h1>
</header>
<br>
<a href="../../index.php" class="registrar">Volver al Inicio</a>