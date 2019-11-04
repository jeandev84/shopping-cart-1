<?php

// ex: http://example.com/about

/**
 * Routes register
 */

/*
$router->get('', 'PagesController@home');
$router->get('about/(\d+)', 'PagesController@about');
$router->get('contact', 'PagesController@contact');
$router->get('test', 'TestController@index');
$router->get('test/(\w+)/(\d+)', 'TestController@message');
$router->get('users', 'UsersController@index');
$router->post('users', 'UsersController@store');
debug($router->routes(), true);
*/


/** Shopping Cart routes */

$router->get('', 'Shop\\FrontController@index');
