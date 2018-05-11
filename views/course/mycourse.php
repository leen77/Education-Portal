<?php

    use yii\helpers\Html;
    use frontend\models\Course;
    use frontend\models\Tutor;
    use frontend\models\Userdb;
    use frontend\models\Temp;
    use yii\bootstrap\Nav;
     use yii\bootstrap\NavBar;

   $course=Course::find()->where(['courseid'=>$id])->limit(1)->one();   
   
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
  

    


   
 <b><h3><?php echo $course->coursename;?> </h3></b>
 <?php

    $topic=Temp::find()->all();
    foreach($topic as $c)
    {
    	   if($c->courseid == $id && strcmp($c->status,'approved')==0)
    	   {
                $tutor=Userdb::find()->where(['userid'=>$c->userid])->limit(1)->one();

    	   	?>
    	   	

 	         <div class="row">
 
   				<div class="col-lg-12">
 
       					<div class="panel panel-default">

       						<div class="panel-body">

       							<p><b><h3><?php echo Html::a($c->topicname,['/temp/viewtopic','id'=>$c->tempid])?></p></b></h3>
      
                    <p><h4><b>By <?php echo Html::a($tutor->name,['/temp/viewtutor','id'=>$c->userid])?></b></h4></p>
                    <p><h5><b>Uploaded on <?php echo $c->uploadedon?></b></h5></p>
                 
                     <?php echo Html::a('Enroll',['/course/mycourse1','id'=>$c->tempid],['class'=>'btn btn-success']);?>


       			

                              
                              </div>
                           </div>
                           </div>

                         </div>
                    <?php

    	   }
    }
?>
