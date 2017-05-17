<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form ActiveForm */
?>
<div class="request-_form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'age') ?>
        <?= $form->field($model, 'height') ?>
        <?= $form->field($model, 'weight') ?>
        <?= $form->field($model, 'city') ?>
        <?= $form->field($model, 'credit') ?>
        <?= $form->field()->checkboxList($model->) ?>
        <?= $form->field($model, 'english') ?>
        <?= $form->field($model, 'photos') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- request-_form -->
