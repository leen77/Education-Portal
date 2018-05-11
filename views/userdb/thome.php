<html>

   <head>

     <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
img {
 width:50px;
    
  
    border-radius: 50%;
}
</style>

</head>

<body>
  <?php

use yii\web\Session;
use frontend\models\Userdb;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use frontend\models\Course;

  $session=new Session;
  echo "<h3>Welcome   ".$session['user']."</h3>";

  
     NavBar::begin();
echo Nav::widget([
    'items' => [
        ['label' => 'Home', 'url' => ['/tutor/thome']],
         ['label' => 'Upload', 'url' => ['/temp/tutorupload']],
        ['label' => 'Requests', 'url' => ['/tutor/tutorrequests']],
        ['label' => 'Status', 'url' => ['/temp/status']],
        ['label' => 'Upload Quiz', 'url' => ['/quiz/create']],
    ],
    'options' => ['class' => 'navbar-nav'],
]);
NavBar::end();?>

  
 <?php
  $unm=$session['user'];

     $users=Userdb::find()->all();
          foreach($users as $user)
            {
                   if(strcmp($user->email,$email) == 0)
                      {
                        ?>
                         <img src="<?php echo $user->imgfile;?>"  alt="Avatar" style="width:150px">

                         <?php
                        $nm=$user->name;
                        $dob=$user->dob;
                        $email=$user->email;
                        $mobile=$user->mobile;
                        $univ=$user->university;

                                 break;

                               }
                     }

     ?>

  
 
      <div class="col-lg-9">
 
          <div class="panel panel-info">
 
               <div class="panel-heading">Personal Details</div>
 
                <div class="panel-body">

                   <p><b>Name:</b> <?=$nm?> </p>

               <p><b>Email:</b> <?=$email?> </p>

               <p><b>University:</b> <?=$univ?> </p>
 
           </div>
 
        </div>

      </div>
        </br></br></br>

       <?php  $courses=Course::find()->all();

     foreach($courses as $c)
     {
      ?>
          <div class="col-lg-4">
 
          <div class="panel panel-primary">
                   
                     <div class="panel-heading"></div>
              
                      <div class="panel-body">   

                        <h3><b><?php echo Html::a($c->coursename,['/temp/history','id'=>$c->courseid])?></b></h3>



</div>
 </div>

</div>

                      <?php
                             }

                              ?>


    


</body>
</html>