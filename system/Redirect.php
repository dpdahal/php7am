<?php


namespace Application\system;
/**
 * Class Redirect
 * @package Application\system
 */
class Redirect
{
    public function back()
    {

        $headers = getallheaders();
        if (isset($headers['Referer'])) {
            header('Location:' . $headers['Referer']);
            return $this;
        }

        return false;


    }

    public function to($path = null)
    {
        $redirectPath = url($path);
        header("Location:" . $redirectPath);
        return true;


    }

}