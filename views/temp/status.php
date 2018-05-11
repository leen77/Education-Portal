<?php

use yii\web\Session;
use frontend\models\Userdb;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use frontend\models\Course;
use frontend\models\Temp;


NavBar::begin();
echo Nav::widget([
    'items' => [
    	['label' => 'Home', 'url' => ['/tutor/thome']],
        ['label' => 'Upload', 'url' => ['/temp/tutorupload']],
        ['label' => 'Requests', 'url' => ['/tutor/tutorrequests']],
        ['label' => 'Status', 'url' => ['/temp/status']],
        ['label' => 'LogOut', 'url' => ['/userdb/logout']],
    ],
    'options' => ['class' => 'navbar-nav'],
]);
NavBar::end();



 $session=new Session;
  $em=$session['email'];


   $tut=Userdb::find()->where(['email'=>$em])->limit(1)->one();


  $all=Temp::find()->all();

 foreach($all as $a)
     {

        if(strcmp($a->userid,$tut->userid)==0)
         {
     	 $c=Course::find()->where(['courseid'=>$a->courseid])->limit(1)->one();
      
      ?>
          <div class="col-lg-12">
 
          <div class="panel panel-info">
                   
                     <div class="panel-heading"><?= $c->coursename ?></div>
              
                      <div class="panel-body"> 

                     <h3><b><?php echo $a->topicname ?></b></h3>
                     <p><h5><b>Uploaded on <?php echo $a->uploadedon?></b></h5></p>
                     <h4><b><?php echo "Status: ". $a->status ?></b></h4>


</div>
 </div>

</div>

                      <?php
                             }
                          }
                              ?>