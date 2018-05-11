<html>
<head>
   
   <style>

     img.avatar {
    width: 40%;
    border-radius: 50%;
}


     body {
    margin: 0;
    /* The image used */
    background-image: url("finally.jpg");

    /* Full height */
    height: 100%; 

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
   </style>
</head>

<?php


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\bootstrap\Alert;
use yii\bootstrap\Widget;

//$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>




     <h1 style="color:cyan;"><p><center>Login</center></p></h1>


                <?php if (Yii::$app->session->hasFlash('error')): ?>
                        
                                
                        <?php $model->userid="";  
                             $model->password=""; 
                         
                             
                             ?>     
                                
                             
                  <?php endif; ?>


               
 
          
 
                <div class="panel panel-default col-md-6 col-md-offset-3">

                  <div class="panel-body">

                          <center><img src="loginavatar.jpg" alt="Avatar" class="avatar"></center>
                   <!-- <img src="1.jpg" class="img-responsive center-block"> -->
                           <?php $form = ActiveForm::begin(['action' => ['home'],]);?>
                           
                            <?php //echo '<p><span class="glyphicon glyphicon-map-marker" aria-hidden="true">'.$row['id'].'</span></p>';?>
                                
                            <?= $form->field($model, 'email',[
                                'inputTemplate' => '<div class="input-group"><span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>{input}</div>',
                                      'inputOptions' => ['placeholder' => "Email"]
                                        ])->textInput(['style'=>'width:250px']) ?>


                              <?= $form->field($model, 'password',[
                                  'inputTemplate' => '<div class="input-group"><span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>{input}</div>',
                                      'inputOptions' => ['placeholder' => "Password"]
                                                                   ])->passwordInput(['style'=>'width:250px']) ?>
                              <?= $form->field($model,'roleid')->radioList([2=>'Admin',3=>'Tutor',1=>'Student'])->label(false) ?>
                                
                                    

                          <?php  $form->field($model, 'captcha')->widget(\yii\captcha\Captcha::classname(),[
      
    'options' => ['placeholder' => 'Enter verification code'],
    ]) ?>

                      
               
                       <?= Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>
            
                     
                <?php ActiveForm::end(); ?>
        

                              </div>
                           </div>
                           

                         