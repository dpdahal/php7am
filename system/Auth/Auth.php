<?php

namespace Application\system\Auth;

use Application\system\Config;
use Application\System\Cookies;
use Application\system\Database;
use Application\system\Hash;
use Application\system\Session;

trait Auth
{

    public function isLogin($data = array(), $rememberMe = false)
    {
        if (empty($data)) throw new \PDOException("data not set");
        $columns = array_keys($data);
        $criteria = $columns[0];
        $columnsValue = array_values($data);
        $result = $this->getSingle($criteria, $columnsValue[0]);
        if ($result) {
            $oPassword = $columnsValue[1];
            $oldHashPassword = $result->password;
            if (Hash::check($oPassword, $oldHashPassword)) {
                Session::put('auth', $result);
                $hasKey = Hash::make(rand());
                $name = Config::get('cookies.name');
                $time = Config::get('cookies.time');
                $db = Database::Instance();
                $db->Update($this->tableName, ['remember_me' => $hasKey], $this->criteria, array($result->u_id));
                Cookies::set($name, $hasKey, time() + 60 * 60 * 24 * $time);

                $this->isLoginSuccess($result);
            } else {
                $_SESSION['error'] = "Username & password not match";
                return redirect()->back();
            }

        } else {
            $_SESSION['error'] = "Criteria not match";
            return redirect()->back();
        }

        return false;
    }

    public function isLoginSuccess($result)
    {
        Session::put('Auth', $result);
        redirect()->to('admin');

    }

    public function AuthLogout()
    {
        $authData = Session::get('Auth');
        $authId = $authData->u_id;
        $name = Config::get('cookies.name');
        $db = Database::Instance();
        $db->Update($this->tableName, ['remember_me' => ''], $this->criteria, array($authId));
        Cookies::delete($name);
        Session::destroy();
        return true;
    }


}