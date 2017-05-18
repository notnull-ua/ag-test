<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form ActiveForm */
?>
<div class="request-_form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
        'layout' => 'horizontal',
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => '',
                'offset' => '',
                'wrapper' => 'col-md-12',
            ],
        ],
    ]); ?>

    <div class="row">
        <div class="col-xs-12 col-md-6 name-wrapper">
            <?= $form->field($model, 'name')->textInput(['placeholder' => 'Имя'])->label(false) ?>
        </div>
        <div class=" col-xs-12 col-md-6 email-wrapper">
            <?= $form->field($model, 'email')->textInput(['placeholder' => 'E-mail'])->label(false) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-6 age-wrapper">
            <?= $form->field($model, 'age')->textInput(['placeholder' => 'Возраст (Полных лет)'])->label(false) ?>
        </div>
        <div class="col-xs-12 col-md-6 height-wrapper">
            <?= $form->field($model, 'height')->textInput(['placeholder' => 'Рост'])->label(false) ?></div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-6 weight-wrapper">
            <?= $form->field($model, 'weight')->textInput(['placeholder' => 'Вес'])->label(false) ?>
        </div>
        <div class="col-xs-12 col-md-6 city-wrapper">
            <?= $form->field($model, 'city')->textInput(['placeholder' => 'Город проживания'])->label(false) ?>
        </div>
    </div>
    <?= $form->field($model, 'credit')->radioList([1 => 'нет', 2 => 'да, только камера', 3 => 'да, комп\'ютер и камера'],['inline'=> true,'inlineRadioListTemplate' => '{input}<div></div>'])->label("Нужна ли техника в оренду") ?>
    <?php
    $english = [];
    $english[1] = 'без знания';
    $english[2] = 'базовый';
    $english[3] = 'средний';
    $english[4] = 'высокий';
    $english[5] = 'превосходный';
    echo $form->field($model, 'english')->radioList($english)->label("Знание английского");
    ?>
    <? //= $form->field($model,'photos')->hiddenInput() ?>
    <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*'])->label("Добавить фото (до 5 шт.)") ?>

    <div class="form-group submit-wrapper">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-warning']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- request-_form -->
