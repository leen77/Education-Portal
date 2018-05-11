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


