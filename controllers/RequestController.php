<?php

namespace app\controllers;

use app\models\Image;
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
                $images = json_decode($model->photos);
                foreach ($images as $key=>$value){
                    $image = Image::find()->where(['id' => $key])->one();
                    /* @var $image Image*/
                    $image->id_post = $model->id;
                    $image->save();
                }

                $message = \Yii::$app->mailer->compose('request', ['model' => $model])
                    ->setTo([$model->email => $model->name])
                    ->setFrom([\Yii::$app->params['adminEmail'] => 'Administrator'])
                    ->setSubject("Request");

//                foreach ($model->getImages()->all() as $image){
//                    $filename = \Yii::$app->urlManager->createAbsoluteUrl(['images/uploads/'.$image->name]);
//                    $message->attach($filename);
//                }
                $message->send();
                \Yii::$app->session->setFlash('success','Запрос успешно отправлен');
                return $this->redirect('/');
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
            return json_encode($model->upload());

        }
    }

    public function actionDeleteImage($id){
        $model = Image::find()->where(['id'=>$id])->one();
        /* @var $model Image*/
        unlink('images/uploads/' . $model->name);
        $model->delete();
        return true;
    }

}
