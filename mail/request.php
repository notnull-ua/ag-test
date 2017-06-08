<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \app\models\Post */
/* @var $message \yii\mail\BaseMessage instance of newly created mail message */
?>
<div class="Request">
<p>Имя: <?=$model->name?></p>
<p>Возраст: <?=$model->age?></p>
<p>Рост: <?=$model->height?></p>
<p>Вес: <?=$model->weight?></p>
<p>Город проживания: <?=$model->city?></p>
<p>Нужна техника в аренду: <?=$model->credit?></p>
<p>Знание английского: <?=$model->english?></p>
    <?php
    /* @var $images array Image*/
    $images = $model->getImages()->all();

    foreach ($images as $image){
        /* @var $image \app\models\Image*/
        echo Html::img($message->embed(\Yii::$app->urlManager->createAbsoluteUrl(['images/uploads/'.$image->name])));
    }
    ?>
</div>
