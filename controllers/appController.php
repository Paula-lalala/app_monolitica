<?php

namespace estudianteController;

use baseControler\BaseController;
use conexionDb\ConexionDbController;
use estudiante\Estudiante;

class EstudianteController extends BaseController
{

    function create($estudiante)
    {
        $sql = 'insert into estudiantes ';
        $sql .= '(codigo,nombres,apellidos) values ';
        $sql .= '(';
        $sql .= $estudiante->getCodigo() . ',';
        $sql .= '"' . $estudiante->getNombres() . '",';
        $sql .= '"' . $estudiante->getApellidos() . '"';
        $sql .= ')';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }
    
    function update($codigo, $estudiante){
        $sql="update estudiantes set ";
        $sql .= 'nombres="' . $estudiante->getNombres().'",';
        $sql .= 'apellidos="' . $estudiante->getApellidos().'" ';
        $sql .= ' where codigo=' . $codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }

    function read()
    {
        $sql = 'select * from estudiantes';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $estudiantes = [];
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $estudiante = new Estudiante();
            $estudiante->setCodigo($registro['codigo']);
            $estudiante->setNombres($registro['nombres']);
            $estudiante->setApellidos($registro['apellidos']);
            array_push($estudiantes, $estudiante);
        }
        $conexiondb->close();
        return $estudiantes;
    }


    function readRow($codigo)
    {
        $sql = 'select * from estudiantes';
        $sql .=' where codigo='. $codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $estudiante = new Estudiante();
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $estudiante->setCodigo($registro['codigo']);
            $estudiante->setNombres($registro['nombres']);
            $estudiante->setApellidos($registro['apellidos']);
        }
        $conexiondb->close();
        return $estudiante;
    }

    function delete($codigo)
    {
        $sql = 'delete from estudiantes where codigo=' . $codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }
}

namespace actividadController;
use actividad\Actividad;
use conexionDb\ConexionDbController;
use baseControlerAc\BaseControllerAc;

class ActividadController extends BaseControllerAc
{

    function create($actividad)
    {
         $sql = 'insert into actividades ';
         $sql .= '(id,descripcion,nota,codigoEstudiante) values ';
         $sql .= '(';
         $sql .= $actividad->getId() . ',';
         $sql .= '"' . $actividad->getDescripcion() . '",';
         $sql .= '"' . $actividad->getNota() . '",';
         $sql .= '"' . $actividad->getCodigoEstudiante() . '"';
         $sql .= ')';
         $conexiondb = new ConexionDbController();
         $resultadoSQL = $conexiondb->execSQL($sql);
         $conexiondb->close();
         return $resultadoSQL;
    }
    
    function update($id, $actividad){
        $sql="update actividades set ";
        $sql .= 'descripcion="' . $actividad->getDescripcion().'",';
        $sql .= 'nota="' . $actividad->getNota().'" ';
        $sql .= ' where id=' . $id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }

    function read()
    {
        $sql = 'select * from actividades ';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $actividades = [];
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $actividad = new Actividad();
            $actividad->setId($registro['id']);
            $actividad->setDescripcion($registro['descripcion']);
            $actividad->setNota($registro['nota']);
            array_push($actividades, $actividad);
        }
        $conexiondb->close();
        return $actividades;
    }

    function delete($id)
    {
        $sql = 'delete from actividades where id=' . $id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }
}
