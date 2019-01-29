<?php

namespace Application\App\Controllers;
use Application\App\General\General;
use Application\system\BaseModelRepository;

/**
 * Class Controller
 * @package Application\App\Controllers
 */


class Controller extends BaseModelRepository
{
    /**
     * trait general
     */
    use General;

    /**
     * Controller constructor.
     */

    public function __construct()
    {
        parent::__construct();
    }

}