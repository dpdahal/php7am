<?php


namespace Application\App\Middleware;


use Application\system\repository\AuthMiddle;
use Application\system\Session;

class AuthMiddleware implements AuthMiddle
{


    public function run()
    {


        $authData = Session::get('Auth');
        if (empty($authData)) return redirect()->to('@admin/login');
        return true;

    }
}