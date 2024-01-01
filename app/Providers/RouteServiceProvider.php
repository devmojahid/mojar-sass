<?php 
namespace App\Providers;

class RouteServiceProvider
{
    private static $routes = [];
    private static $controllerNamespace = "App\\Http\\Controllers\\";
    public static function add($uri,$actions,$method="GET",$middleware=null){
        list($controller,$action) = explode("@",$actions);
        self::$routes[] = [
            "uri" => $uri,
            "controller" => $controller,
            "action" => $action,
            "method" => $method,
            "middleware" => $middleware
        ];
    }

    public static function get($uri,$actions,$method="GET",$middleware=null){
        self::add($uri,$actions,$method,$middleware);
    }

    public static function handle(){
       
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        foreach(self::$routes as $route){
            if($route['uri'] == $uri && $route['method'] == $method){
                // if($route['middleware'] != null){
                //     $middleware = self::$controllerNamespace . $route['middleware'];
                //     $middleware = new $middleware;
                //     $middleware->handle();
                // }
                $controller = self::$controllerNamespace . $route['controller'];
                $controller = new $controller;
                $action = $route['action'];
                $controller->$action();
                return;
            }
            echo "404 from Handler ROite Service Provider";
        }
    }

}