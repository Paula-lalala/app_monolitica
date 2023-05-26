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
$resultado = $estudianteController->create($estudiante);
if ($resultado) {
    echo '<h1>Estudiante registrado</h1>';
} else {
    echo '<h1>No se pudo registrar al estudiante</h1>';
}
?>
<br>
<a href="../../index.php" class="boton">Volver al Inicio</a>