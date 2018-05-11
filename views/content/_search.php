<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TopicSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-search">

    <?php $form = ActiveForm::begin(); ?>
       <?= $form->field($model, 'contentSearch',[
                                'inputTemplate' => '<div class="input-group"><span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>{input}</div>',
                                      'inputOptions' => ['placeholder' => "Search"]])->textInput(['style'=>'width:250px']) ;?>




         <?= Html::a('Search',['/content/tutorhome','id'=>$id],['class'=>'btn btn-success']);?>
                 
    <?php ActiveForm::end(); ?>

</div>
