<?php

namespace Application\App\Controllers\Backend;
use Application\App\Controllers\Controller;

/**
 * Class BackendController
 * @package Application\App\Controllers\Backend
 */

class BackendController extends Controller
{
    /**
     * @var string
     */
    protected $_backendPath = 'backend/master.php';

    /**
     * BackendController constructor.
     */

    public function __construct()
    {
        parent::__construct();

        $this->data('title', $this->makeTitle('Admin'));

    }
}