<?php

use yii\web\Session;
use frontend\models\Userdb;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use frontend\models\Course;

  

  NavBar::begin();
echo Nav::widget([
    'items' => [
        ['label' => 'Home', 'url' => ['/admin/ahome']],
        ['label' => 'Upload Requests', 'url' => ['/admin/adminrequests']],
        ['label' => 'Manage Course', 'url' => ['/course/index']],
        ['label' => 'Manage Users', 'url' => ['/userdb/index']],
        ['label' => 'LogOut', 'url' => ['/userdb/logout']],
    ],
    'options' => ['class' => 'navbar-nav'],
]);
NavBar::end();?>
 <?php  $courses=Course::find()->all();

     foreach($courses as $c)
     {
      ?>
          <div class="col-lg-4">
 
          <div class="panel panel-primary">
                   
                     <div class="panel-heading"></div>
              
                      <div class="panel-body">

                      <div class="w3-card-12">
                           <img src="<?php echo $c->logo?>" height="50" width="50">    

                        <h3><b><?php echo Html::a($c->coursename,['/admin/adminhistory','id'=>$c->courseid])?></b></h3>

 </div>

</div>
 </div>

</div>

                      <?php
                             }

                              ?>
