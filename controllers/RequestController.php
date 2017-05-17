<?php

namespace app\controllers;

class RequestController extends \yii\web\Controller
{
    public function actionIndex()
    {

        $model = new \app\models\Post();

        if ($model->load(\Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

}
