<?php

namespace App\controllers;

use Pfm\Controller;
use RedBeanPHP\R;


class MainController extends Controller
{

    public function indexAction() {

        $names = $this->model->getNames();
        $this->setMeta("Главная страница", "Описание", "Ключевые слова");
        $this->set(compact("names"));
    }

}