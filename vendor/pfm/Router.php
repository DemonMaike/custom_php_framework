<?php

namespace Pfm;

class Router
{

    protected static array $routes = [];
    protected static array $route = [];

    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes(): array
    {
        return self::$routes;
    }

    public static function getRoute(): array
    {
        return self::$route;
    }

    protected static function removeQueryString(string $url)
    {
        if ($url) {
            $params = explode('&', $url, 2);
            if (false === str_contains($params[0], "=")) {
                return rtrim($params[0], '/');
            }
        }
        return "";
    }

    public static function dispatch($query)
    {
        $query = self::removeQueryString($query);
        if (self::matchRoute($query)) {
            $controller ="App\controllers\\" . self::$route["admin_prefix"] . self::$route["controller"] . "Controller";
            if (class_exists($controller)) {
                $controllerObject = new $controller(self::$route);
                $controllerObject->getModel();
                $action = self::lowerCamelCase(self::$route["action"] . "Action");
                if (method_exists($controller, $action)) {
                    $controllerObject->$action();
                    $controllerObject->getView();

                    } else {
                        throw new \Exception("Метод ". $controller ." ". $action ."не найден.");
                    }
            } else {
                throw new \Exception("Контроллер {$controller} не найден", 404); 
            }
        } else {
            throw new \Exception("Страница не найдена", 404);
        }
    }

    public static function matchRoute($url): bool
    {
        foreach (self::$routes as $pattern=>$route){
            if (preg_match("#{$pattern}#", $url, $matches)){
                foreach ($matches as $k => $v){
                    if (is_string($k)){
                        $route[$k] = $v;
                    }
                }
                if (empty($route["action"])){
                    $route["action"] = "index";
                }
                if (!isset($route["admin_prefix"])){
                    $route["admin_prefix"] = "";
                } else {
                    $route["admin_prefix"] .= "\\";
                }
                $route["controller"] = self::upperCamelCase($route["controller"]);
                self::$route = $route;

                return true;
            }
        }
        return false;
    }


    protected static function upperCamelCase($name): string 
    {
        $name = str_replace("-", " ", $name);
        $name = ucwords($name);
        $name = str_replace(" ", "", $name);

        return $name;
    }

    protected static function lowerCamelCase($name): string
    {
        return lcfirst(self::upperCamelCase(($name)));
    }
}