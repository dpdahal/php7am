<?php

namespace Application\App\Controllers\Frontend;


use Application\App\Controllers\Controller;

/**
 * Class FrontendController
 * @package Application\App\Controllers\Frontend
 */
class FrontendController extends Controller
{
    /**
     * @var string
     */
    protected $_frontPath = 'frontend/master.php';

    /**
     * BackendController constructor.
     */

    public function __construct()
    {
        parent::__construct();

        $this->data('title', $this->makeTitle('Home'));

    }


}