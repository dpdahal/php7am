<?php

namespace Application\App\model;

use Application\system\Auth\Auth;
use Application\system\BaseModelRepository;

/**
 * Class User
 * @package Application\App\model
 */
class User extends BaseModelRepository
{
    use Auth;
    /**
     * @var string
     */
    protected $tableName = 'tbl_users';
    protected $columns = '*';
    protected $criteria = 'u_id';

}