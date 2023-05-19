<?php
require '../models/estudiante.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/estudiantesController.php';

use estudiante\Estudiante;
use estudianteController\EstudianteController;

$estudiante = new Estudiante();
$estudiante->setCodigo($_POST['codigo']);
$estudiante->setNombres($_POST['nombre']);
$estudiante->setApellidos($_POST['apellido']);

$estudianteController = new EstudianteController();
$resultado = $estudianteController->update($estudiante->getCodigo(), $estudiante);
if ($resultado) {
    echo '<h1>Usuarios modificados</h1>';
} else {
    echo '<h1>No se pudo modificar el usuario</h1>';
}
?>
<br>
<a href="../index.php">Volver al Inicio</a>