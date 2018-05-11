<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;


/* @var $this yii\web\View */
/* @var $model frontend\models\CourseSearch */
/* @var $form yii\widgets\ActiveForm */


  ?>

<div class="tutor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['specifictutor'],
        'method'=>'get',
        
    ]); ?>

    <?= $form->field($model, 'tutorSearch',[
                                'inputTemplate' => '<div class="input-group"><span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>{input}</div>',
                                      'inputOptions' => ['placeholder' => "Search"]])->textInput(['style'=>'width:250px']) ;?>
 

    

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        
    </div>

    <?php ActiveForm::end(); ?>

</div>
