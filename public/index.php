<?php

use Pfm\App;
use Pfm\Router;

require_once (dirname(__DIR__) . "/config/init.php");
require_once HELPERS . "/functions.php";
require_once CONFIG . "/routes.php";

new App();

debug(Router::getRoutes());