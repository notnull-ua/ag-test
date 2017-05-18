<?php
/* @var $this yii\web\View */
/* @var $model app\models\Post */
?>

<?php

echo \app\widgets\Alert::widget();
?>
<div class="content-header">
    <img src="images/feedback-logo.jpg" class="logo" alt="logo">
    <h1 class="title">Подать заявку</h1>
    <p class="description">Все поля обязательны для заполнения. Заявка приходит на имейл.</p>
</div>

<?php
//\yii\widgets\Pjax::begin();
echo $this->render('_form',[
        'model'=>$model
]);

//\yii\widgets\Pjax::end();
?>
