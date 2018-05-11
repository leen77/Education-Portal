<html>

 <head>
     
     <style>

 .img {
 width:50px;
    
  
    border-radius: 50%;
}

         
     </style>
 </head>

<body>
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

$this->title = 'Specific Request';
$this->params['breadcrumbs'][] = ['label' => 'UserHome', 'url' => ['userdb/shome']];
$this->params['breadcrumbs'][] = ['label' => 'RequestCourses', 'url' => ['request/userrequest']];
$this->params['breadcrumbs'][] = ['label' => 'TutorSearch for SpecificRequest', 'url' => ['tutor/specifictutor']];
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

  
  $tutor=Userdb::find()->where(['userid'=>$id])->limit(1)->one();

echo"<h2><b>". Html::a($tutor->name,['/temp/viewtutor','id'=>$id])."</b></h2>";
 //echo "<h2><b>".$tutor->tutorname."</b></h2>";
 //  $u=Userdb::find()->where(['email'=>$tutor->emailtut])->limit(1)->one();

   $model->coursesubject="";
   $model->coursedetails="";
?>
  <img src="<?php echo $tutor->imgfile;?>"  alt="Avatar" style="width:150px">
  <?php 

 

  
  
   echo "<h4><b>Studied at  ".$tutor->university."</b></h4>";


?>





    <?php $form = ActiveForm::begin(['action' => ['specifictutor2']]); ?>

    <?= $form->field($model, 'coursesubject')->textInput(['style'=>'width:350px']) ?>

      <?= $form->field($model, 'coursedetails')->textarea(array('rows'=>3,'style'=>'width:350px')) ;?>

    

  <?=   $form->field($model, 'hidden4')->hiddenInput()->label(false);?>
    <div class="form-group">
        <?= Html::submitButton( 'Create Request' , ['class' =>  'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>




