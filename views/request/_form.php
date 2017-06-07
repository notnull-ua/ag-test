<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form ActiveForm */
?>
<div class="request-_form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data',
            'data' => ['pjax' => true]],
        'layout' => 'horizontal',
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-md-3',
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
    <div class="row">
        <div class="col-xs-12 credit-wrapper ">
            <?= $form->field($model, 'credit', ['horizontalCssClasses' => [
                'label' => 'col-md-3',
                'offset' => '',
                'wrapper' => 'col-md-9',
            ],
            ])->radioList($model::getCreditPlaceholders(), ['inline' => true, 'inlineRadioListTemplate' => '{input}<div></div>'])->label("Нужна ли техника в оренду") ?>

        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 english-wrapper">
            <?php

            echo $form->field($model, 'english', ['horizontalCssClasses' => [
                'label' => 'col-md-3',
                'offset' => '',
                'wrapper' => 'col-md-9',
            ],
            ])->radioList($model::getEnglishPlaceholders())->label("Знание английского");
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 image-wrapper">

            <?= $form->field($model, 'photos', ['options' => ['style' => 'display:none']])->label(false) ?>

            <?= $form->field(new \app\models\UploadForm(), 'imageFiles[]',
                ['template' => '
<span class="label col-md-3 ">Добавить фото (до 5 шт.)</span>
{beginWrapper}{beginLabel}{labelTitle}{input}{endLabel}{endWrapper} 
<div class="gallery col-md-6">
<img class="preview">
<img class="preview">
<img class="preview">
<img class="preview">
<img class="preview">
</div>{error}',
                    'horizontalCssClasses' => [
                        'label' => 'col-md-3',
                        'offset' => '',
                        'wrapper' => 'col-md-3',
                    ],
                ])->fileInput(['style' => 'display:none','class'=>'select-image', 'multiple' => true, 'accept' => 'image/*'])->label('ЗАГРУЗИТЬ', ['class' => 'btn btn-warning btn-load glyphicon glyphicon-plus'])//label("Добавить фото (до 5 шт.)")   ?>

        </div>
    </div>


    <div class="form-group submit-wrapper">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-warning']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- request-_form -->
