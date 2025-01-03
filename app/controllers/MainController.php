<?php

namespace App\controllers;

use Pfm\Controller;


class MainController extends Controller
{

    public function indexAction() {
        $this->setMeta("Главная страница", "Описание", "Ключевые слова");
        $this->set(["test" => "TEST"]);
    }

}