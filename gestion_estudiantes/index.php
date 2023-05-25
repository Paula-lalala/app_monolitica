<?php
require '../Models/Models.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/appController.php';

use estudianteController\EstudianteController;

$estudianteController = new EstudianteController();

$estudiantes = $estudianteController->read();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Estudiantes</title>
    <link rel="stylesheet"  href="../CSS/app.css">
<!-- <style>
    h1 {
    text-align: center;
    margin-top: 40px;
    color: #ff922b;}
    header {
    background-color: #FFC682;
    color: #fff;
    padding: 20px;}
    main {
    padding: 20px;}
    section {
    margin-bottom: 20px;}
    table {
    width: 100%;
    background-color: #fff;
    border-collapse: collapse;
    border-radius: 4px;
    border: 2px solid #FFC682;
    }
    th,td {
    padding: 12px;
    text-align: center;
    border: 2px solid #FFC682}
    th {
    background-color: #FFC682;
    color: #fff;}
    tbody tr:nth-child(even) {
    background-color: #f2f2f2;}
    </style> -->
</head>

<body>
    <main>
        <h1>Lista de estudiantes</h1>
        <a href="form_estudiante.php" class="boton">Registrar estudiante</a>
        <br>
        <table >
        <br>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($estudiantes as $estudiante) {
                    echo '<tr>';
                    echo '  <td>' . $estudiante->getCodigo() . '</td>';
                    echo '  <td>' . $estudiante->getNombres() . '</td>';
                    echo '  <td>' . $estudiante->getApellidos() . '</td>';
                    echo '  <td>';
                    $estiloBoton = true;
                    if ($estiloBoton) {
                        echo '<a href="form_estudiante.php?codigo=' . $estudiante->getCodigo() . '" class="boton" style="text-decoration: none;">Modificar</a>';
                    } else {
                        echo '<a href="form_estudiante.php?codigo=' . $estudiante->getCodigo() . '">Modificar</a>';
                    }
                    echo '      <a href="../views/accion_borrar.php?codigo=' . $estudiante->getCodigo() . '" class="boton">borrar</a>';
                    echo '      <a href="../gestion_actividades/index.php?codigo=' . $estudiante->getCodigo() . '" class="boton">Notas</a>';
                    echo '  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>