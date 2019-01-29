<?php


namespace Application\App\model;


use Application\system\BaseModelRepository;

class Slider extends BaseModelRepository
{

    protected $tableName = 'tbl_sliders';
    protected $columns = '*';
    protected $criteria = 'id';

}