<?php
require '../models/estudiante.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/estudiantesController.php';

use estudiante\Estudiante;
use estudianteController\EstudianteController;


$codigo= empty($_GET['codigo'])?'':$_GET['codigo'];
$titulo='Registrar Estudiante';
$urlAction="accion_registro_estudiante.php";
$estudiante= new Estudiante();
if(!empty($codigo)){
    $titulo= 'modificar Estudiante';
    $urlAction= 'accion_modificar_estudiante.php';
    $estudianteController= new EstudianteController();
    $estudiante= $estudianteController ->readRow($codigo);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro Estudiante</title>
</head>

<body>
    <h1><?php echo $titulo;?></h1>
    <form action="<?php echo $urlAction;?>" method="post">
        <label>
            <span>Codigo:</span>
            <input type="number" name="codigo" min="1" value ="<?php echo $estudiante->getCodigo(); ?>" required>
        </label>
        <br>
        <label>
            <span>Nombre:</span>
            <input type="text" name="nombre" value ="<?php echo $estudiante->getNombres(); ?>" required>
        </label>
        <br>
        <label>
            <span>Apellidos:</span>
            <input type="text" name="apellido" value ="<?php echo $estudiante->getApellidos(); ?>" required>
        </label>
        <button type="submit">Guardar</button>
    </form>
</body>

</html>