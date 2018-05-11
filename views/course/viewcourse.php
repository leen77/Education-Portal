
<?php

    use frontend\models\Course;
    use frontend\models\Tutor;
    use frontend\models\Temp;
    use frontend\models\Userdb;
    use yii\bootstrap\Nav;
    use yii\bootstrap\Navbar;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\Session ;
use frontend\models\Enroll ;

/*$this->title = 'My Courses';

$this->params['breadcrumbs'][] = $this->title;*/
$this->title = 'ViewCourses';
$this->params['breadcrumbs'][] = ['label' => 'UserHome', 'url' => ['userdb/shome']];
$this->params['breadcrumbs'][] = $this->title;


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
NavBar::end();?>

<?php
echo "<h3><b>My Courses</b></h3>";
 


  
 
 $session=new Session;
         $email=$session['email'];
        
         
         $u= Userdb::find()->where(['email' => $email])->limit(1)->one();
        $e = Enroll::find()->all();

        foreach($e as $t)
        {
          if($t->userid==$u->userid)
          {
        $temp=Temp::find()->where(['tempid'=>$t->tempid])->limit(1)->one();
        $c=Course::find()->where(['courseid'=>$temp->courseid])->limit(1)->one();
        $tutor = Userdb::find()->where(['userid' => $temp->userid])->limit(1)->one();
       
       


?>
 <div class="row">
 
   		<div class="col-lg-12">
 
       		<div class="panel panel-default">
 
          		
                   	  <div class="panel-body">                       
                                
                            <p><h3><b>Course: <?=$c->coursename?> </b></h3></p>
                            <p><h3><b><?php echo Html::a($temp->topicname,['/temp/viewtopic','id'=>$t->tempid])?></b></h3></p>
                            <p><h4><b>By <?php echo Html::a($tutor->name,['/temp/viewtutor','id'=>$temp->userid])?></b></h4></p>
                           
                            <p><h5><b>Uploaded on <?php echo $temp->uploadedon?></b></h5></p>
                              <?php echo Html::a('Unenroll',['/course/unenroll','id'=>$t->enrollid],['class'=>'btn btn-success']);?>
                        

                       </div>

                   </div>

             </div>    

   </div>                  
                             
  
 <?php
    }
   }
   ?>