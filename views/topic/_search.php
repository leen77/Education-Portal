<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TopicSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="topic-search">

    <?php $form = ActiveForm::begin([
        'action' => ['viewtopic'],
        'method' => 'get',
    ]); ?>
       <?= $form->field($model, 'topicSearch',[
                                'inputTemplate' => '<div class="input-group"><span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>{input}</div>',
                                      'inputOptions' => ['placeholder' => "Search"]])->textInput(['style'=>'width:250px']) ;?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    
    </div>

    <?php ActiveForm::end(); ?>

</div>
