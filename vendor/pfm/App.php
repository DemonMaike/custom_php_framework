<?php


namespace Pfm;
class App
{
    public static $app;

    public function __construct()
    {
        $query = trim(urldecode($_SERVER["QUERY_STRING"]), "/");
        new ErrorHandler();
        self::$app = Registry::getInstance();
        $this->getParams();
        Router::dispatch($query);
    }

    protected function getParams()
    {
        try {
            $params = require_once CONFIG . "/params.php";
        } catch (\Exception $e) {
            die ("". $e->getMessage());
        }
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                self::$app->setProperty($key, $value);
            }
        }
        
    }
}