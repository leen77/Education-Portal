

<?php

    use yii\helpers\Html;
    use frontend\models\Course;
    use frontend\models\Tutor;
    use frontend\models\Userdb;
    use frontend\models\Temp;
    use yii\bootstrap\Nav;
     use yii\bootstrap\NavBar;
     use yii\web\Session;
       use frontend\models\Enroll;


  $t=Temp::find()->where(['tempid'=>$id])->limit(1)->one();
 // $tutor=Userdb::find()->where(['userid'=>$t->userid])->limit(1)->one();
  
 $this->title = 'ViewContent';
$this->params['breadcrumbs'][] = ['label' => 'TutorHome', 'url' => ['tutor/thome']];
$this->params['breadcrumbs'][] = ['label' => 'ViewCourse', 'url' => ['temp/history','id'=>$id]];
$this->params['breadcrumbs'][] = $this->title;
  

   
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
NavBar::end();

 $session=new Session;
         $email=$session['email'];
      //  $model=new Enroll ;
         
        // $u= Userdb::find()->where(['email' => $email])->limit(1)->one();

//         $t= Temp::find()->where(['tempid' => $id])->limit(1)->one();

         //$e=Enroll::find()->where(['tempid'=>$id ,'userid'=>$u->userid])->limit(1)->one() ;
    ?>


   
 <h2><b><?php echo $t->topicname;?></b></h2>
 

<h3> <b>PDF's</b></h3>


 <?php

    $str1=$t->pdf;
    $token=strtok($str1,"+");
    $c=0;

    while($token !== false)
   {
    $c++;

      ?>
   
           
 
          <div class="col-lg-3">
 
                <div class="panel panel-default">

                  <div class="panel-body">

                    <p><b><h3><?php echo Html::a('<img src="pdflogo1.png" />',array('/content/viewpdf','content'=>$token)).$t->topicname.'-'.$c?></p></b></h3>

                  

            

                              
                              </div>
                          </div>
                           </div>

                         
                    <?php

             $token = strtok("+");
         }
    
?>

   
</br></br></br></br>
</br></br></br> 

<?php

    $str1=$t->video;

  //  if($str1!=0)
    //  { 
     echo "<h3> <b>"."Videos"."</b></h3>";
    $token=strtok($str1,"+");
    $c1=0;

    while($token !== false)
   {
    $c1++;

      ?>


           
 
          <div class="col-lg-3">
 
                <div class="panel panel-default">

                  <div class="panel-body">

                    <p><b><h3><?php echo Html::a('<img src="videologo.png" />',array('/content/viewvideo','id'=>$t->tempid,'video'=>$token)).$t->topicname.'-'.$c1?></p></b></h3>

                           </div>
                           </div>
                           </div>

                         
                    <?php

             $token = strtok("+");
         }
      //}
    ?>

