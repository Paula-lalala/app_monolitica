<?php namespace baseControler;

abstract class BaseController
{
    abstract function create($model);
    abstract function read();
    abstract function update($id,$model);
}