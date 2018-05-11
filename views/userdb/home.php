<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
<style>

 .panel-heading {
  background-color: navy blue;
}
.img {
 width:50px;
    
  
    border-radius: 50%;
}

 .floating-box {
    display: inline-block;
    
    margin: 15px;
   
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
use frontend\models\Temp;
use frontend\models\Course;

  $session=new Session;
  echo "<h3>Welcome   ".$session['user']."</h3>";

  
     NavBar::begin();
echo Nav::widget([
    'items' => [
        ['label' => 'My Courses', 'url' => ['/course/viewcourse']],
        ['label' => 'Search Courses', 'url' => ['/course/index']],
        ['label' => 'Request Courses', 'url' => ['/request/userrequest']],
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

               <p><b>DOB:</b> <?=$dob?> </p>

               <p><b>Email:</b> <?=$email?> </p>
 
               <p><b>Mobile:</b> <?=$mobile?> </p>

               <p><b>University:</b> <?=$univ?> </p>
 
           </div>
 
       </div>
 
 
       
 
   </div>
   <br/>

  <p> <h3><b>My Courses</b></h3></p>
<?php
/*   $temp = Temp::find()->all();

        foreach($temp as $t)
        {
          if(strcmp($t->enroll,'yes')==0)
          {
        
        $c=Course::find()->where(['courseid'=>$t->courseid])->limit(1)->one();
        $tutor = Userdb::find()->where(['userid' => $t->userid])->limit(1)->one();
       
       


?>
 
  
      <div class="col-lg-6">
 
          <div class="panel panel-primary">
                   
                     <div class="panel-heading"><?= $c->coursename ?></div>
              
                      <div class="panel-body">                       
                                
                           <!-- <p><h3></b>Course:</b> <?=$c->coursename?> </b></h3></p> -->
                            <p><h3><b><?php echo Html::a($t->topicname,['/temp/viewtopic','id'=>$t->tempid])?></b></h3></p>
                            <p><h4><b>By <?php echo $tutor->name?></b></h4></p>
                             
                        

                       </div>

                   </div>

                 </div>

              
<?php
       }
    }

  */

   $courses=Course::find()->all();

     foreach($courses as $c)
     {
      ?>
          <div class="col-lg-4">
 
          <div class="panel panel-primary">
                   
                     <div class="panel-heading"></div>
              
                      <div class="panel-body">   

                        <h3><b><?php echo Html::a($c->coursename,['/course/viewcourse1','id'=>$c->courseid])?></b></h3>



</div>
 </div>

</div>

                      <?php
                             }

                              ?>

       


    


</body>

</html>
