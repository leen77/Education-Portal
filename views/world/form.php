<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Form */
/* @var $form ActiveForm */
?>
<div class="form">

    <?php $form = ActiveForm::begin(['action'=>['form1']]); ?>

        <?= $form->field($model, 'title') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'text') ?>
        <?= $form->field($model, 'file')->fileInput() ;?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- form -->
