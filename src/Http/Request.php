<?php
namespace Framework\Http;


/**
 * Class Request
 * @package Project\Http
 */
class Request
{

     /**
      * @return string
     */
     public static function uri()
     {
         # On recupere l'URI et on retire seulemenent le path
         /*
         $uri = trim($_SERVER['REQUEST_URI'], '/');
         return parse_url($uri, PHP_URL_PATH);
         */

         return trim(
             parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
         , '/');
     }


     /**
      * @return mixed
     */
     public function method()
     {
       return $_SERVER['REQUEST_METHOD'];
     }
}