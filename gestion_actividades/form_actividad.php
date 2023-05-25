<?php
require '../Models/Models.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/appController.php';


use actividad\Actividad;
use actividadController\ActividadController;



$id= empty($_GET['id'])?'':$_GET['id'];
$actividad=new Actividad();
if(!empty($id)){
    $titulo= 'modificar Actividad';
    $urlAction= 'accion_modificar_estudiante.php?';
    $actividadController= new ActividadController();
    $actividad= $actividadController ->readRow($id);
}else{
    echo($_GET['codigo']);
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
</head>

<body>
    <h1><?php echo $titulo;?></h1>
    <form action="<?php echo $urlAction;?>" method="post">
        <label>
            <span>Id:</span>
            <input type="number" name="id" min="1" value ="<?php echo $actividad->getId(); ?>" required>
        </label>
        <br>
        <label>
            <span>Nombre:</span>
            <input type="text" name="descripcion" value ="<?php echo $actividad->getDescripcion(); ?>" required>
        </label>
        <br>
        <label>
            <span>Nota:</span>
            <input type="number" name="nota" placeholder="Ingrese nota" step="0.01" min="0" max="5" value ="<?php echo $actividad->getNota(); ?>" required>
        </label>
        <button type="submit">Guardar</button>
    </form>
</body>

</html>