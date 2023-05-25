<?php
namespace estudiante;

class Estudiante
{
    private $codigo;
    private $nombres;
    private $apellidos;

    public function getCodigo()
    {
        return $this->codigo;
    }
    public function setCodigo($value)
    {
        $this->codigo = $value;
    }

    public function getNombres()
    {
        return $this->nombres;
    }
    public function setNombres($value)
    {
        $this->nombres = $value;
    }
    public function getApellidos()
    {
        return $this->apellidos;
    }
    public function setApellidos($value)
    {
        $this->apellidos = $value;
    }

}

namespace actividad;

class Actividad
{
    private $id;
    private $descripcion;
    private $nota;
    private $codigoEstudiante;

    public function getId()
    {
        return $this->id;
    }
    public function setId($value)
    {
        $this->id = $value;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function setDescripcion($value)
    {
        $this->descripcion = $value;
    }

    public function getNota()
    {
        return $this->nota;
    }
    public function setNota($value)
    {
        $this->nota = $value;
    }

    public function getCodigoEstudiante()
    {
        return $this->codigoEstudiante;
    }
    public function setCodigoEstudiante($value)
    {
        $this->codigoEstudiante = $value;
    }

}
