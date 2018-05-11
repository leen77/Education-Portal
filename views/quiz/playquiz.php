<?php

    use yii\helpers\Html;
    use frontend\models\Course;
    use frontend\models\Tutor;
    use frontend\models\Userdb;
    use frontend\models\Temp;
    use yii\bootstrap\Nav;
     use yii\bootstrap\NavBar;
     use frontend\models\Quiz;


  $t=Temp::find()->where(['tempid'=>$id])->limit(1)->one();
  $tutor=Userdb::find()->where(['userid'=>$t->userid])->limit(1)->one();
  
  NavBar::begin();
   
echo Nav::widget([
    'items' => [
        ['label' => 'Home', 'url' => ['/userdb/shome']],
        ['label' => 'My Courses', 'url' => ['/course/viewcourse']],
        ['label' => 'Search Courses', 'url' => ['/course/index']],
        ['label' => 'Request Courses', 'url' => ['/request/userrequest']],
    ],
    'options' => ['class' => 'navbar-nav'],
]);
NavBar::end();
    
//$i=1;
$c= Quiz::find()
        ->select('quizno')
        ->distinct()
        ->count();

 
 $quiz=Quiz::find()->all();


  for($i=1;$i<=$c;$i++)
  {
      
       ?>

      <div class="col-lg-9">
 
          <div class="panel panel-success">
 
               <div class="panel-heading"></div>
 
                <div class="panel-body">
 
                    <b><h3><?php echo Html::a('Quiz-'.$i,array('/quiz/playquiz1','id1'=>$id,'id2'=>$i));?></b></h3>     

                   </div>
               </div>
         </div>              

<?php
  }
 

?>