<?php

namespace App\models;
use RedBeanPHP\R;

class Main extends \Pfm\Model
{
    public function getNames():array
    {
        return R::findAll("name");
    }
}