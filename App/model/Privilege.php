<?php


namespace Application\App\model;

use Application\system\BaseModelRepository;

/**
 * Class Privilege
 * @package Application\App\model
 */
class Privilege extends BaseModelRepository
{

    protected $tableName = 'tbl_privilege';
    protected $columns = '*';
    protected $criteria = 'id';

}