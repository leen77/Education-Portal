
<?php

    use frontend\models\Course;
    use frontend\models\Tutor;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\models\Content;
use frontend\models\Comment;
use frontend\models\Temp;
use frontend\models\Userdb;


 ?>


 <?php if (Yii::$app->session->hasFlash('success')): ?>

 	<?php endif; ?>
 <?php

        $c = Temp::find()->where(['tempid' => $id])->limit(1)->one();
       // $=Tutor::find()->where(['tutorid'=>$user->tutorid])->limit(1)->one();
    

  ?>     
      <h3><b><?php echo $c->topicname; ?></b></h3>
    </h3><b>Comments</b></h3>
 
<?php 
   
    $comm=Comment::find()->all();
    foreach($comm as $comm1)
    {
         if($c->tempid == $id)
         {
           ?>
         <div class="row">
 
   		      <div class="col-lg-5">
 
       	              	<div class="panel panel-default">
 
          		
                   	  <div class="panel-body">                       
                                
                            <p><h4></b> <?=$comm1->commentinfo?></b> </h4></p>

                        

                       </div>

                   </div>

             </div>    

   </div>                  
                             
 <?php
       }
     }

   ?> 
 