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
    $images = explode('|',$model->photos);

    foreach ($images as $image){
        echo Html::img($message->embed(\Yii::$app->urlManager->createAbsoluteUrl(['images/uploads/'.$image])));
    }
    ?>
</div>
