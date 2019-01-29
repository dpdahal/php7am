<?php


namespace Application\system\repository;


interface ModelRepository
{

    public function Insert(array $data);

    public function Update($data = array(), $bindValue = array());

    public function Delete($criteria);

    public function Select();

    public function SelectBy($criteria);


}