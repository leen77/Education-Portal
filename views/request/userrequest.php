

<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
/* @var $this yii\web\View */
/* @var $model frontend\models\Request */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'RequestCourses';
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
 
  $model->coursesubject="";
   $model->coursedetails="";
?>





    <?php $form = ActiveForm::begin(['action' => ['requesthome']]); ?>

    <?= $form->field($model, 'coursesubject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'coursedetails')->textarea(['rows' => 6]) ?>

  <?=   $form->field($model, 'hidden1')->hiddenInput()->label(false);?>
    <div class="form-group">
        <?= Html::submitButton( 'Create Request' , ['class' =>  'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php echo "<b><h3>".Html::a('Request to Specific Tutor', ['tutor/specifictutor'])."</h3></b>" ?>


