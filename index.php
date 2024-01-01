<?php
define('APP_ROOT', __DIR__);

require_once APP_ROOT . "/vendor/autoload.php";

/**
 * @var autoloader $loader classes
 * 
 */
spl_autoload_register(function ($class) {
   $classFile = str_replace('\\', DIRECTORY_SEPARATOR, $class.'.php');
   $classPath = APP_ROOT . DIRECTORY_SEPARATOR ."app". DIRECTORY_SEPARATOR. $classFile;
    if (file_exists($classPath)) {
         require_once $classPath;
    }
});

session_start();

use App\Providers\Route;

$routeInstance = new Route();
require_once APP_ROOT . "/routes/web.php";
$routeInstance::handle();
