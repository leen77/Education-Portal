

<html>
<head>

  <style>
      
  .floating-box
  {
    display: inline-block;
  }

td {
    padding: 20px;
}


    </style>

    </head>


<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Content;
use frontend\models\Comment;
use frontend\models\Temp;
use frontend\models\Userdb;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

 $this->title = 'Comment';
$this->params['breadcrumbs'][] = ['label' => 'UserHome', 'url' => ['userdb/shome']];
$this->params['breadcrumbs'][] = ['label' => 'ViewCourses', 'url' => ['course/viewcourse1','id'=>$id]];
$this->params['breadcrumbs'][] = ['label' => 'ViewTopic', 'url' => ['temp/viewtopic','id'=>$id]];
$this->params['breadcrumbs'][] = $this->title;


/* @var $this yii\web\View */
/* @var $model frontend\models\Userdb */
/* @var $form ActiveForm */
?>
<?php
    $model->commentinfo='';
 ?>
    
   <?php

NavBar::begin();
    echo Nav::widget([
    'items' => [
        ['label' => 'Home', 'url' => ['/userdb/shome']],
        ['label' => 'My Courses', 'url' => ['/course/viewcourse']],
        ['label' => 'Search Courses', 'url' => ['/course/index1']],
        ['label' => 'Request Courses', 'url' => ['/request/userrequest']],
    ],
    'options' => ['class' => 'navbar-nav'],
]);
NavBar::end();
  $c = Temp::find()->where(['tempid' => $id])->limit(1)->one();
  //$u=Userdb::find()->where(['userid'=>$c->userid])->limit(1)->one();?>
 <h2><b><?= $c->topicname?></b></h2>

    
<h3><b>Add Comment</b></h3>

                   
    <?php $form = ActiveForm::begin(['action'=>['commenthome']]); ?>

        <?= $form->field($model, 'commentinfo',[
                                      'inputOptions' => ['placeholder' => "Share your comment........."]
                                        ])->textArea(array('rows'=>5,'cols'=>50)) ;?>

        <?=   $form->field($model, 'hidden3')->hiddenInput()->label(false);?>


       <table><tr><td>
         <?= Html::submitButton('Comment', ['class' => 'btn btn-success']) ?>
          </td>
          
          </tr>
        </table>
       
            
        
            
        
    <?php ActiveForm::end(); ?>
<h3><b>Previous Comments</b></h3>
<?php 
   //$c = Content::find()->where(['contentid' => $id1])->limit(1)->one();

    $comm=Comment::find()->all();

    foreach($comm as $comm1)

    {
      $u=Userdb::find()->where(['userid'=>$comm1->userid])->limit(1)->one();
         if($comm1->tempid == $id)
         {
           ?>
         <div class="row">
 
              <div class="col-lg-12">
 
                        <div class="panel panel-default">
 
                
                      <div class="panel-body">                       
                                
                            <p><h4></b><?php echo"<h4><b>". $u->email.":</h4></b>  ".$comm1->commentinfo ?></b> </h4></p>

                        

                       </div>

                   </div>

             </div>    

   </div>         
  <?php

}

}
?>
