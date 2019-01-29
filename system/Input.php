<?php


namespace Application\system;


class Input
{

    public static function post($field)
    {
        return filter_input(INPUT_POST, $field, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    public static function get($field)
    {
        return filter_input(INPUT_GET, $field, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

}