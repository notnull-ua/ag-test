<?php
/* @var $this yii\web\View */
/* @var $model app\models\Post */
?>
<h1>/request/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>

<?php
echo $this->render('_form',[
        'model'=>$model
])
?>
