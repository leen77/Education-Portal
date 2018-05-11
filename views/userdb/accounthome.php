 <?php 


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\bootstrap\Alert;
use yii\bootstrap\Widget;
  

 $form = ActiveForm::begin(['action' => ['accounthome1'],]);?>
                       
                                
                            <?= $form->field($model, 'accountno',[
                                'inputTemplate' => '<div class="input-group"><span class="input-group-addon"><span class="glyphicon glyphicon-bank"></span></span>{input}</div>',
                                      'inputOptions' => ['placeholder' => "Accountno...."]
                                        ])->textInput(['style'=>'width:500px']) ?>



                      <?=   $form->field($model, 'hidden4')->hiddenInput()->label(false);?>
               
                       <?= Html::submitButton('Register', ['class' => 'btn btn-success']) ?>
            
                     
                <?php ActiveForm::end(); ?>
        