<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Temp;
use frontend\models\Admintemp;
use frontend\models\Comment;
use frontend\models\TempSearch;
use frontend\models\Userdb;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Course;
use yii\web\UploadedFile;
use yii\web\Session;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use frontend\models\Tutor;

$this->title = 'View Course';
$this->params['breadcrumbs'][] = ['label' => 'TutorHome', 'url' => ['tutor/thome']];
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

$course=Course::find()->where(['courseid'=>$id])->limit(1)->one();
?>

<h3><b><?= $course->coursename ;?></b></h3>

<?php
$t=Temp::find()->all();
//$session=new Session;
 // $em=$session['email'];

foreach($t as $a)
{
	//$tut=Userdb::find()->where(['email'=>$em])->limit(1)->one();
    if($a->courseid==$id && strcmp($a->status,'approved')==0)
    {
        $u=Userdb::find()->where(['userid'=>$a->userid])->limit(1)->one();
     ?>

      <div class="col-lg-6">
 
          <div class="panel panel-info">
                   
                     <div class="panel-heading"></div>
              
                      <div class="panel-body"> 

                     <h3><b><?php echo Html::a($a->topicname,['/admin/adminhistorycontent','id'=>$a->tempid]) ;?></b></h3>
                     <p><h4><b>By <?php echo Html::a($u->name,['/temp/viewtutor','id'=>$a->userid])?></b></h4></p>
                     <p><h5><b>Uploaded on <?php echo $a->uploadedon?></b></h5></p>
                     <h4><b><?php echo "Likes: ". $a->likes?></b></h4>
                     <h4><b><?php echo Html::a('Comments',['/admin/adminhistorycomment','id'=>$a->tempid]) ?></b></h4>
                     
                     <h4> <b><?php echo Html::a('MakePayment',['/admin/makepayment','id'=>$a->userid],['class'=>'btn btn-danger']);?></b></h4>


</div>
 </div>

</div>

<?php
    } 
  
}
?>