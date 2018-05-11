<?php 


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
use frontend\models\Quiz;


$quiz=Quiz::find()->all();
$c=0;

foreach($quiz as $q)
{
	if($q->tempid == $id)
	{
		$c=$c+1;
		?>

		<div class="col-lg-9">
 
                   <div class="panel-body">   

                        <h3><b><?php echo ($c)." ".$q->qtext?></b></h3>
                   


 </div>
 </div>

</br></br></br></br></br>

  <div class="col-lg-3">
 
                   <div class="panel-body">   

                        <h4><b><?php echo "A:"." ".$q->op1?></b></h4>
                 </div>
 </div>       
                      <div class="col-lg-3">
 
                   <div class="panel-body">   

                        <h4><b><?php echo "B:"." ".$q->op2?></b></h4>
                 </div>
 </div> 
 <div class="col-lg-3">
 
                   <div class="panel-body">   

                        <h4><b><?php echo "C:"." ".$q->op3?></b></h4>
                 </div>
 </div> 
 <div class="col-lg-3">
 
                   <div class="panel-body">   

                        <h4><b><?php echo "D:"." ".$q->op4?></b></h4>
                 </div>
 </div> 
                   
                   
                   


 </div>
 </div>
 
		<?php
	}
}

?>