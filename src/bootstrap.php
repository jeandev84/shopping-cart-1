<?php
/** Facotry File */

use Framework\App;
use Framework\Database\Connection;
use Framework\Database\QueryBuilder;

// Helpers
require '../libs/functions.php';

// Dependency Injection
App::bind('config', require '../config/app.php');

App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));


// Load view
function view($name, $data = [])
{
    extract($data);
    $name = trim($name, '/');
    ob_start();
    require "../resources/views/{$name}.php";
    $content = ob_get_clean();
    @require "../resources/views/layouts/default.php";
}


function redirect($path)
{
    header("Location : /{$path}");
    exit;
}