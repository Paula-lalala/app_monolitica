<?php
require '../../Models/Models.php';
require '../../controllers/conexionDbController.php';
require '../../controllers/baseController.php';
require '../../controllers/appController.php';


use actividad\Actividad;
use actividadController\ActividadController;


$codigo = $_GET['codigo'];
$id= empty($_GET['id'])?'':$_GET['id'];
$actividad=new Actividad();
if(!empty($id)){
    $titulo= 'modificar Actividad';
    $urlAction = "accion_modificar_actividades.php?codigo=".$codigo."&id=".$id;
    $actividadController= new ActividadController();
    $actividad= $actividadController ->readRow($id);
}else{
    $codigo= $_GET['codigo'];
    $titulo='Registrar Actividad';
    $urlAction="accion_registro_actividad.php?codigo=" .$codigo;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro Actividad</title>
    <link rel="stylesheet" href="../../CSS/app.css">
</head>

<body>
    <header>
    <h1><?php echo $titulo;?></h1>
    </header>
    <br>
    <h3>Codigo: <?php echo($codigo) ?></h3>
    <form action="<?php echo $urlAction;?>" method="post">
        <label>
            <span class="input">Id:</span>
            <br>
            <input type="number" name="id" class="input" min="1" value ="<?php echo $actividad->getId(); ?>" required>
        </label>
        <br>
        <label>
            <span class="input">Nombre:</span>
            <br>
            <input type="text" name="descripcion" class="input" value ="<?php echo $actividad->getDescripcion(); ?>" required>
        </label>
        <br>
        <label>
            <span class="input">Nota:</span>
            <br>
            <input type="number" name="nota" class="input" placeholder="Ingrese nota" step="0.01" min="0" max="5" value ="<?php echo $actividad->getNota(); ?>" required>
        </label>
        <br>
        <button type="submit" class="registrar">Guardar</button>
        <h1 id=salir>O</h1>
        <a href="../../index.php" class="registrar">Volver al Inicio</a>
    </form>
</body>

</html>