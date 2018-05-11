
 <?php

use yii\web\Session;
use frontend\models\Userdb;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

  $session=new Session;
  echo "<h3>Welcome   ".$session['user']."</h3>";

  
     NavBar::begin();
echo Nav::widget([
    'items' => [
        ['label' => 'My Courses', 'url' => ['/course/mycourse']],
        ['label' => 'Search Courses', 'url' => ['/course/index']],
        ['label' => 'Request Courses', 'url' => ['/request/userrequest']],
    ],
    'options' => ['class' => 'navbar-nav'],
]);
NavBar::end();


   $unm=$session['user'];

     $users=Userdb::find()->all();
          foreach($users as $user)
            {
                   if(strcmp($user->email,$email) == 0)
                      {
                        $nm=$user->name;
                        $dob=$user->dob;
                        $email=$user->email;
                        $mobile=$user->mobile;
                        $univ=$user->university;

                                 break;

                               }
                     }

     ?>

  <div class="row">
 
      <div class="col-lg-5">
 
          <div class="panel panel-default">
 
               <div class="panel-heading">Personal Details</div>
 
                <div class="panel-body">
 
                      

               <p><b>Name:</b> <?=$nm?> </p>

        <p><b>DOB:</b> <?=$dob?> </p>

               <p><b>Email:</b> <?=$email?> </p>
 
               <p><b>Mobile:</b> <?=$mobile?> </p>

               <p><b>University:</b> <?=$univ?> </p>
 
           </div>
 
       </div>
 
 
       <div class="alert alert-success">
 
           Thank you for visiting us.
 
       </div>
 
   </div>
 
</div>

    


