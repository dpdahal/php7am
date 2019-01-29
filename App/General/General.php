<?php

namespace Application\App\General;

use Application\system\Config;

/**
 * Trait General
 * @package Application\App\General
 */
trait General
{

    /**
     * @var array
     */
    public $data = [];

    /**
     * @param $key
     * @param null $value
     * @return null
     */
    public function data($key, $value = null)
    {
        if (empty($key)) throw new \PDOException('key not set');

        return $this->data[$key] = $value;
    }

    /**
     * @param $backend
     * @param string $separator
     * @param null $frontend
     * @return string
     */
    public function makeTitle($backend, $separator = " : : ", $frontend = null)
    {
        if (!isset($frontend)) {
            $frontend = Config::get('title.name');
        }

        return $frontend . $separator . $backend;
    }
}