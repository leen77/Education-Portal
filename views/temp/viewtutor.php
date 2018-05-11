<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
/* @var $this yii\web\View */
/* @var $model frontend\models\Request */
/* @var $form yii\widgets\ActiveForm */
use frontend\models\Tutor;
use frontend\models\Userdb;
use frontend\models\Temp;
use frontend\models\Course;

/*$this->title = 'Specific Request';
$this->params['breadcrumbs'][] = ['label' => 'UserHome', 'url' => ['userdb/shome']];
$this->params['breadcrumbs'][] = ['label' => 'RequestCourses', 'url' => ['request/userrequest']];
$this->params['breadcrumbs'][] = ['label' => 'TutorSearch for SpecificRequest', 'url' => ['tutor/specifictutor']];
$this->params['breadcrumbs'][] = $this->title;*/


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

  $tutor=Userdb::find()->where(['userid'=>$id])->limit(1)->one();

 echo "<h2><b>".$tutor->name."</b></h2>";
   //$u=Userdb::find()->where(['email'=>$tutor->emailtut])->limit(1)->one();

   ?>
  <img src="<?php echo $tutor->imgfile;?>"  alt="Avatar" style="width:150px">
  <?php 

 

  
  
   echo "<h4><b>Studied at  ".$tutor->university."</b></h4>";


?>
<?php 

echo "</br><h3><b>Uploads</b></h3>";

$t= Temp::find()->where(['userid' => $id])->all();

foreach($t as $a)
{
	if(strcmp($a->status,'approved')==0)
	{
		$c= Course::find()->where(['courseid' => $a->courseid])->limit(1)->one();

		?>
		<div class="col-lg-9">
 
       		<div class="panel panel-success">

            <div class="panel-heading"><?php echo $c->coursename ?></div>
 
          		
                   	  <div class="panel-body">                       
                                
                          
                            <p><h3><b><?php echo Html::a($a->topicname,['/temp/viewtopic','id'=>$a->tempid])?></b></h3></p>
                             <p><h4><b>Likes: <?php echo $a->likes ?></b></h4></p>
                             <p> <h4><b><?php echo Html::a('Comments',['/temp/historycomment','id'=>$a->tempid]) ?></b></h4> 
                              </p>
                             
                        

                       
                        </div>
                   </div>

             </div>    
<?php
	}
}