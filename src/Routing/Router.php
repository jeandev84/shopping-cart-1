<?php
namespace Framework\Routing;


use Exception;

/**
 * Class Router
 * @package Project\Routing
 */
class Router
{
     /**
      * @var array $routes
     */
     protected $routes = [
         'GET'  => [],
         'POST' => []
     ];

    /**
     * @param string $file
     * @return Router
     */
     public static function load(string $file)
     {
         $router = new static;
         require $file;
         return $router;
     }

    /**
     * Method may be renamed how you want
     * [ register(), api(), get(), post(), put(), patch() ]
     * @param $routes
     */
     public function define($routes)
     {
         $this->routes = $routes;
     }


    /**
     * @param $uri
     * @param $controller
     */
     public function get($uri, $controller)
     {
          // $this->routes['GET'][$uri] = $controller;
         $this->add('GET', $uri, $controller);
     }


    /**
     * @param $uri
     * @param $controller
     */
     public function post($uri, $controller)
     {
         // $this->routes['POST'][$uri] = $controller;
         $this->add('POST', $uri, $controller);
     }


     public function add(string $method, string $uri, string $controller)
     {
          $pattern = '^'. trim($uri, '/') .'$';
          $this->routes[$method][$pattern] = $controller;
     }


    /**
     * Dispatcher routes
     *
     * @param string $uri
     * @param string $requestType
     * @return bool
     * @throws Exception
     */
     public function dispatch(string $uri, string $requestType)
     {
         $url = trim($uri, '/');
         foreach($this->routes[$requestType] as $pattern => $callback)
         {
                if(preg_match('#'.$pattern.'#i', $url, $matches))
                {
                    return $this->callBack($callback);
                }
         }
         throw new Exception('No route defined for this URI.');
     }


    /**
     * @param $callback
     * @throws Exception
     */
    protected function callBack(string $callback)
    {
          list($controller, $action) = explode('@', $callback);
          $controllerClass = sprintf('App\\Controllers\\%s', $controller);
          $controllerObject = new $controllerClass;
          if(! method_exists($controllerObject, $action))
          {
              throw new Exception(
                  sprintf(
                      'Controller : %s does not respond to the Action : %s',
                      $controllerObject,
                      $action
                  ));
          }

          call_user_func([$controllerObject, $action]);
     }


    /**
     * @return array
     */
     public function routes()
     {
         return $this->routes;
     }
}