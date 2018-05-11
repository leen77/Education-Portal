<?php

 
use frontend\models\Temp;
use frontend\models\Admintemp;
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
use frontend\models\Comment;


$this->title = 'ViewComments';
$this->params['breadcrumbs'][] = ['label' => 'TutorHome', 'url' => ['tutor/thome']];
$this->params['breadcrumbs'][] = ['label' => 'ViewCourse', 'url' => ['temp/history','id'=>$id]];
$this->params['breadcrumbs'][] = $this->title;
  

NavBar::begin();
echo Nav::widget([
    'items' => [
    	['label' => 'Home', 'url' => ['/tutor/thome']],
        ['label' => 'Upload', 'url' => ['/temp/tutorupload']],
        ['label' => 'Requests', 'url' => ['/tutor/tutorrequests']],
        ['label' => 'Status', 'url' => ['/temp/status']],
        ['label' => 'LogOut', 'url' => ['/userdb/logout']],
    ],
    'options' => ['class' => 'navbar-nav'],
]);
NavBar::end();

$t=Temp::find()->where(['tempid'=>$id])->limit(1)->one();
$comm=Comment::find()->all();
?>

<h3><b><?php echo $t->topicname." (Comments)" ?></b></h3>


<?php
foreach($comm as $c)
{
	if($c->tempid == $id )
	{
		$user=Userdb::find()->where(['userid'=>$c->userid])->limit(1)->one();
		?>

          <div class="col-lg-12">
 
          <div class="panel panel-info">
                   
                     <div class="panel-heading"></div>
              
                         <div class="panel-body"> 

                     <h4><b><?php echo $user->email.":  " .$c->commentinfo ?></b></h4>
                    


</div>
 </div>

</div>
<?php		
	}
}

?>


