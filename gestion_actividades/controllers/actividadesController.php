<?php

namespace actividadController;

use baseControler\BaseController;
use conexionDb\ConexionDbController;
use actividad\Actividad;

class ActividadController extends BaseController
{

    function create($actividad)
    {
        $sql = 'insert into actividades ';
        $sql .= '(id,descripcion,nota) values ';
        $sql .= '(';
        $sql .= $actividad->getId() . ',';
        $sql .= '"' . $actividad->getDescripcion() . '",';
        $sql .= '"' . $actividad->getNota() . '"';
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
        $sql = 'select * from actividades';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $actividades = [];
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $actividad = new Actividad();
            $actividad->setId($registro['id']);
            $actividad->setDescrpcion($registro['descripcion']);
            $actividad->setNota($registro['nota']);
            array_push($actividades, $actividad);
        }
        $conexiondb->close();
        return $actividades;
    }

}