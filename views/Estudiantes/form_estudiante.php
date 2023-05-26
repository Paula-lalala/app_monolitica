<?php
require '../../Models/Models.php';
require '../../controllers/conexionDbController.php';
require '../../controllers/baseController.php';
require '../../controllers/appController.php';

use estudiante\Estudiante;
use estudianteController\EstudianteController;


$codigo= empty($_GET['codigo'])?'':$_GET['codigo'];
$titulo='Registrar Estudiante';
$urlAction="accion_registro.php";
$estudiante= new Estudiante();
if(!empty($codigo)){
    $titulo= 'modificar Estudiante';
    $urlAction= 'accion_modificar.php';
    $estudianteController= new EstudianteController();
    $estudiante= $estudianteController ->readRow($codigo);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro Estudiante</title>
    <link rel="stylesheet" href="../../CSS/app.css">
</head>

<body>
    <h1><?php echo $titulo;?></h1>
    <form action="<?php echo $urlAction;?>" method="post">
        <br>
        <label>
            <span class="input">Codigo:</span>
            <input type="number" name="codigo" class="input" min="1" value ="<?php echo $estudiante->getCodigo(); ?>" required>
        </label>
        <br>
        <label>
            <span class="input">Nombre:</span>
            <input type="text" name="nombre" class="input" value ="<?php echo $estudiante->getNombres(); ?>" required>
        </label>
        <br>
        <label>
            <span class="input">Apellidos:</span>
            <input type="text" name="apellido" class="input" value ="<?php echo $estudiante->getApellidos(); ?>" required>
        </label>
        <br>
        <br>
        <br>
        <button type="submit" class="boton">Guardar</button>
    </form>
</body>

</html>