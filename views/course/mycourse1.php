
<?php

    use frontend\models\Course;
    use frontend\models\Tutor;
    use frontend\models\Temp;
    use frontend\models\Userdb;
    use yii\bootstrap\NavBar ;
    use yii\bootstrap\Nav ;

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


  NavBar::begin();
   
echo Nav::widget([
    'items' => [
        ['label' => 'Home', 'url' => ['/userdb/shome']],
        ['label' => 'My Courses', 'url' => ['/course/viewcourse']],
        ['label' => 'Search Courses', 'url' => ['/course/index1']],
         ['label' => 'Search Tutor', 'url' => ['/tutor/searchtutor']],
        ['label' => 'Request Courses', 'url' => ['/request/userrequest']],
        ['label' => 'LogOut', 'url' => ['/userdb/logout']],
    ],
    'options' => ['class' => 'navbar-nav'],
]);
NavBar::end();

 ?>


 <?php if (Yii::$app->session->hasFlash('success')): ?>

 	<?php endif; ?>
 <?php

        $temp = Temp::find()->all();

        foreach($temp as $t)
        {
          if(strcmp($t->enroll,'yes')==0)
          {
        
        $c=Course::find()->where(['courseid'=>$t->courseid])->limit(1)->one();
        $tutor = Userdb::find()->where(['userid' => $t->userid])->limit(1)->one();
       
       


?>
 <div class="row">
 
   		<div class="col-lg-12">
 
       		<div class="panel panel-default">
 
          		
                   	  <div class="panel-body">                       
                                
                            <p><h3></b>Course:</b> <?=$c->coursename?> </b></h3></p>
                            <p><h3><b><?php echo Html::a($t->topicname,['/temp/viewtopic','id'=>$t->tempid])?></b></h3></p>
                            <p><h4><b>By <?php echo Html::a($tutor->name,['/temp/viewtutor','id'=>$t->userid])?></b></h4></p>
                             
                        

                       </div>

                   </div>

             </div>    

   </div>                  
                             
  
 <?php
    }
   }
   ?>