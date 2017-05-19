<?php
/**
 * Created by PhpStorm.
 * User: Vladyslav
 * Date: 19.05.2017
 * Time: 9:36
 */

namespace app\controllers;


use yii\web\Controller;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $this->redirect('request');
    }

}