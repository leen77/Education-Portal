<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Temp;
use frontend\models\Admintemp;
use frontend\models\Comment;
use frontend\models\TempSearch;
use frontend\models\Userdb;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Course;
use yii\web\UploadedFile;
use yii\web\Session;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use frontend\models\Tutor;


NavBar::begin();
echo Nav::widget([
    'items' => [
        ['label' => 'Home', 'url' => ['/admin/home']],
        ['label' => 'Manage Course', 'url' => ['/course/index']],
        ['label' => 'Manage Users', 'url' => ['/userdb/index']],
        ['label' => 'Manage Tutors', 'url' => ['/tutor/index']],
        
    ],
    'options' => ['class' => 'navbar-nav'],
]);
NavBar::end();?>


<h3><b>Request Approval</b></h3>

<?php 

$app=Temp::find()->all();

 foreach($app as $a)
     {

        if(strcmp($a->status,'processing')==0)
         {
     	 $c=Course::find()->where(['courseid'=>$a->courseid])->limit(1)->one();
       $tut=Userdb::find()->where(['userid'=>$a->userid])->limit(1)->one();
      ?>
          <div class="col-lg-6">
 
          <div class="panel panel-success">
                   
                     <div class="panel-heading"><?= $c->coursename ?></div>
              
                      <div class="panel-body">   

                        <h3><b><?php echo Html::a($a->topicname,['/admin/admintopic','id'=>$a->tempid])?></b></h3>
                        <h4><b><?php echo "By ".$tut->name ?></b></h4>


</div>
 </div>

</div>

                      <?php
                             }
                          }
                              ?>