<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Request;

/* @var $this yii\web\View */
/* @var $model frontend\models\Request */
/* @var $form yii\widgets\ActiveForm */
?>

 <?php
      $request = Request::find()->where(['requestid' => $id])->limit(1)->one();
         $model->coursesubject=$request->coursesubject;
           $model->coursedetails=$request->coursedetails;

           
           $request->delete();
?>
<b><h2>Update Request</h2></b>

 <?php $form = ActiveForm::begin(['action' => ['requesthome']]);?>

    <?= $form->field($model, 'coursesubject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'coursedetails')->textarea(['rows' => 6]) ?>

     <?=   $form->field($model, 'hidden2')->hiddenInput()->label(false);?>

    <div class="form-group">
        <?= Html::submitButton( 'Update',['class' =>  'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>