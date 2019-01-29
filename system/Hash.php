<?php

namespace Application\system;
/**
 * Class Hash
 * @package Application\system
 */

class Hash
{

    /**
     * @param $field
     * @return bool|string
     */
    public static function make($field)
    {
        return password_hash($field, PASSWORD_BCRYPT);
    }

    /**
     * @param $field
     * @param $hash
     * @return bool
     */
    public static function check($field, $hash)
    {
        return password_verify($field, $hash);
    }
}