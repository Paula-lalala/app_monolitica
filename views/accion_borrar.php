<!DOCTYPE html>
<head>
    <link rel="stylesheet"  href="../../CSS/app.css">
<style>
    header {
    background-color: #FFC682;
    color: #fff;
    padding: 20px;}
    main {
    padding: 20px;}
    section {
    margin-bottom: 20px;}
    h1 {
    text-align: center;
    margin-top: 40px;
    color: #ff922b;}
    </style>
    
</head>
<?php
require '../Models/Models.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/appController.php';

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

<a href="../gestion_estudiantes/index.php" class="boton">Volver al Inicio</a>
</html>