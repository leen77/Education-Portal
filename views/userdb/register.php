<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;




?>

<h2>Register</h2>


                        
                                
                        <?php   
                             $model->password=""; 
                             $model->name=""; 
                            
                             $model->email=""; 
                             $model->mobile=""; 
                             $model->university=""; 
                             
                             
                             ?>     
                                
                             
                  
    <?php $form = ActiveForm::begin(['action' => ['registerhome']]); ?>

        <?= $form->field($model, 'email',[
                                'inputTemplate' => '<div class="input-group"><span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>{input}</div>',
                                      'inputOptions' => ['placeholder' => "Email"]
                                        ])->textInput(['style'=>'width:250px']) ;?>

        <?= $form->field($model, 'password',[
                                  'inputTemplate' => '<div class="input-group"><span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>{input}</div>',
                                      'inputOptions' => ['placeholder' => "Password"]
                                                                   ])->passwordInput(['style'=>'width:250px']) ;?>

        <?= $form->field($model,'confirmpwd',[
                                  'inputTemplate' => '<div class="input-group"><span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>{input}</div>',
                                      'inputOptions' => ['placeholder' => "Confirm Password"]
                                                                   ])->passwordInput(['style'=>'width:250px']) ; ?>

        <?= $form->field($model, 'name',[
                                  'inputTemplate' => '<div class="input-group"><span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>{input}</div>',
                                      'inputOptions' => ['placeholder' => "Name"]
                                                                   ]) ->textInput(['style'=>'width:250px']) ;?>
        
        <?= $form->field($model, 'mobile',[
                                  'inputTemplate' => '<div class="input-group"><span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>{input}</div>',
                                      'inputOptions' => ['placeholder' => "Mobile No"]
                                                                   ])->textInput(['style'=>'width:250px']) ;?>
        <?= $form->field($model, 'university',[
                                  'inputTemplate' => '<div class="input-group"><span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>{input}</div>',
                                      'inputOptions' => ['placeholder' => "University"]
                                                                   ]) ->textInput(['style'=>'width:250px']) ;?>
         <?= $form->field($model,'roleid')->radioList([3=>'Tutor',1=>'Student'])->label(false) ?>
          <?= $form->field($model,'file',[
                                  'inputTemplate' => '<div class="input-group"><span class="input-group-addon"><span class="glyphicon glyphicon-picture"></span></span>{input}</div>',
                                      'inputOptions' => ['placeholder' => "Upload Image"]
                                                                   ])->fileInput(); ?>
    
        <div class="form-group">
            <?= Html::submitButton('Register', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>


