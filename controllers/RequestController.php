<?php

namespace app\controllers;

use app\models\Post;
use app\models\UploadForm;
use yii\web\UploadedFile;

class RequestController extends \yii\web\Controller
{
    public function actionIndex()
    {

        $model = new \app\models\Post();

        if ($model->load(\Yii::$app->request->post())) {
            //$model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->validate()) {
                //$model->upload();
                $model->save(false);
                \Yii::$app->mailer->compose('request', ['model' => $model])
                    ->setTo([$model->email => $model->name])
                    ->setFrom([\Yii::$app->params['adminEmail'] => 'Administrator'])
                    ->setSubject("Request")
                    ->send();
                \Yii::$app->session->setFlash('success','Запрос успешно отправлен');
                return $this->render('index',[
                    'model'=>$model
                ]);
            }
            else {
                \Yii::$app->session->setFlash('error','Ошибка при отправлении запроса. Проверьте данные и повторите попытку');
            }
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function  actionUploadImages(){
        $model = new UploadForm();
        if($model->load(\Yii::$app->request->post())){
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            return $model->upload();
        }
    }

    public function actionDeleteImage($name){
        unlink('images/uploads/' . $name);
        return true;
    }

}
