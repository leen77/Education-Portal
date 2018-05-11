<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Content;
use frontend\models\Comment;
use frontend\models\Temp;



/* @var $this yii\web\View */
/* @var $model frontend\models\Userdb */
/* @var $form ActiveForm */
?>
<?php
    $model->commentinfo='';
 ?>
    
   <?php
  $c = Temp::find()->where(['tempid' => $id1])->limit(1)->one();?>
 <h2><b><?= $c->topicname?></b></h2>;

    
<h3><b>Add Comment</b></h3>

                   
    <?php $form = ActiveForm::begin(['action'=>['commenthome']]); ?>

        <?= $form->field($model, 'commentinfo',[
                                      'inputOptions' => ['placeholder' => "Share your comment........."]
                                        ])->textArea(array('rows'=>5,'cols'=>50)) ;?>

        <?=   $form->field($model, 'hidden3')->hiddenInput()->label(false);?>


       
         <?= Html::submitButton('Comment', ['class' => 'btn btn-success']) ?>


       
            
        
            
        
    <?php ActiveForm::end(); ?>
<h3><b>Previous Comments</b></h3>
<?php 
   //$c = Content::find()->where(['contentid' => $id1])->limit(1)->one();

    $comm=Comment::find()->all();
    foreach($comm as $comm1)
    {
         if($comm1->contentid == $id1)
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
