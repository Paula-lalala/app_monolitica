<?php namespace baseControler;

abstract class BaseController
{
    abstract function create($model);
    abstract function read();
    abstract function update($codigo,$model);
    abstract function delete($codigo);
    abstract function readRow($codigo);
}

namespace baseControlerAc;
abstract class BaseControllerAc
{
    abstract function create($model);
    abstract function read($codigoEstudiante);
    abstract function update($id,$model);
    abstract function delete($id);
    abstract function readRow($id);
}