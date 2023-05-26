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

$margen = '10px';
$alineacionTexto = 'center';

$estudianteController = new EstudianteController();
$resultado = $estudianteController->delete($_GET['codigo']);
if ($resultado) {
    echo '<h1 style="margin: ' . $margen . '; text-align: ' . $alineacionTexto . ';">Usuario borrado</h1>';
} else {
    echo '<h1style="margin: ' . $margen . '; text-align: ' . $alineacionTexto . ';">No se pudo borrar el usuario</h1>';
}
?>

<a href="../../index.php" class="boton">Volver al Inicio</a>
</html>