<?php
namespace Framework\Templating;


/**
 * Class View
 * @package Framework\Templating
 */
class View
{

    /**
     * @var string
     */
    public static $root;

    /**
     * @param $root
     */
    public static function root($root)
    {
        self::$root = $root;
    }


    /**
     * View render
     *
     * @param $name
     * @param array $data
     */
    public static function render($name, $data = [])
    {
        extract($data);
        $name = trim($name, '/');
        require sprintf('%s/resources/views/%s.php', self::$root, $name);

        /*
        require self::$root ."/resources/views/{$name}.php";
        require "../resources/views/{$name}.view.php";
        */
    }
}