<?php

namespace app\controllers;

use yii\base\Controller;

class PageController extends Controller
{
public function actionHello(){
    return $this->render("hello");
}
}