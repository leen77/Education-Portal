
<?php

    use frontend\models\Course;
    use frontend\models\Tutor;
    use frontend\models\Temp;
    use frontend\models\Userdb;
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use yii\bootstrap\Nav;
    use yii\bootstrap\NavBar;
    use yii\web\Session ;
    use yii\db\ActiveQuery ;
    use frontend\models\Enroll ;
   
      $course = Course::find()->where(['courseid' => $id])->limit(1)->one();

$this->title = 'MyCourses';
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
NavBar::end();   
 ?>
<h3><b><?php echo $course->coursename?></b></h3>

  

 	
 <?php

         $session=new Session;
         $email=$session['email'];
         $u= Userdb::find()->where(['email' => $email])->limit(1)->one();

         $t= Temp::find()->where(['courseid' => $id])->all();
         foreach ($t as $t1)
          {
           $enr=Enroll::find()->where(['tempid'=>$t1->tempid ,'userid'=>$u->userid])->limit(1)->one() ;    
           if($enr!=null)
           {
        //$enr=Enroll::find()->where(['tempid'=>$t->tempid ,'userid'=>$u->userid])->all() ; 
       // $e=Enroll::find()->all();

      //  $t=Temp::find()->all();

      
          
        
          
              //$tut1=Temp::find()->where(['tempid'=>$enr->tempid])->limit(1)->one() ;
              $tut = Userdb::find()->where(['userid' => $t1->userid])->limit(1)->one();
       
       


?>
 
 
   		<div class="col-lg-6">
 
       		<div class="panel panel-primary">

            <div class="panel-heading"></div>
 
          		
                   	  <div class="panel-body">                       
                                
                          
                            <p><h3><b><?php echo Html::a($t1->topicname,['/temp/viewtopic','id'=>$t1->tempid])?></b></h3></p>
                            <p><h4><b>By <?php echo Html::a($tut->name,['/temp/viewtutor','id'=>$t1->userid])?></b></h4></p>
                               <p><h5><b>Uploaded on <?php echo $t1->uploadedon?></b></h5></p>

                             
                        

                       
                        </div>
                   </div>

             </div>    

                     
                             
  
 <?php
    }
   }
   ?>