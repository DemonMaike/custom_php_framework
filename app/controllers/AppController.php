<?php
namespace App\controllers;

use Pfm\Controller;

class AppController extends Controller
{

    public function __construct(public $route)
    {
        parent::__construct($route);
    }

    
}