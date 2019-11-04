<?php
namespace Framework;


use Exception;

/**
 * Class App
 * @package Project
 */
class App
{
    /** @var array  */
    protected static $registry = [];

    /**
     * @param $key
     * @param $value
     */
    public static function bind($key, $value)
    {
         static::$registry[$key] = $value;
    }

    /**
     * @param $key
     * @return array
     * @throws Exception
     */
    public static function get($key)
    {
        if(! array_key_exists($key, static::$registry))
        {
            throw new Exception(
                sprintf('No %s is bound in the container.', $key)
            );
        }
        return static::$registry[$key];
    }
}