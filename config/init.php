<?php

define("DEBUG", 1);
define("ROOT", dirname(dirname(__DIR__) . "/.."));
define("PUB", ROOT . "/public");
define("APP", ROOT . "/app");
define("CORE", ROOT . "/vendor/pfm");
define("HELPERS", ROOT . "/vendor/pfm/helpers");
define("CACHE", ROOT . "/tmp/cache");
define("LOGS", ROOT . "/tmp/logs");
define("CONFIG", ROOT . "/config");
define("LAYOUT", "ishop");
define("PATH", "http://dima.ru:8000");
define("ADMIN", "http://dima.ru:8000");
define("NO_IMAGE", "uploads/no_image.jpg");

require_once ROOT . "/vendor/autoload.php";