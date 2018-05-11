<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CourseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index1'],
        'method'=>'get',
        
    ]); ?>

    <?= $form->field($model, 'courseSearch',[
                                'inputTemplate' => '<div class="input-group"><span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>{input}</div>',
                                      'inputOptions' => ['placeholder' => "Search"]])->textInput(['style'=>'width:250px']) ;?>
 

    

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        
    </div>

    <?php ActiveForm::end(); ?>

</div>
