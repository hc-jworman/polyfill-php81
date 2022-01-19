<?php

use Zf1s\Polyfill\Php81 as p;

if (\PHP_VERSION_ID >= 80100) {
    return;
}

if (\defined('MYSQLI_REFRESH_SLAVE') && !\defined('MYSQLI_REFRESH_REPLICA')) {
    \define('MYSQLI_REFRESH_REPLICA', 64);
}

if (!\function_exists('array_is_list')) {
    function array_is_list(array $array)
    {
        return p\Php81::array_is_list($array);
    }
}

if (!\function_exists('enum_exists')) {
    /**
     * @param string $enum
     * @param bool $autoload
     * @return false
     */
    function enum_exists($enum, $autoload = true)
    {
        $autoload && \class_exists($enum);
        return false;
    }
}
