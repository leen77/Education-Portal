<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this yii\web\View */
/* @var $model frontend\models\Course */

$this->title = 'Create Course';
$this->params['breadcrumbs'][] = ['label' => 'AdminHome', 'url' => ['admin/ahome']];
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['course/index']];
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
NavBar::end();?>

<div class="course-create">

    <h1><?= Html::encode($this->title) ?></h1>

  <?php 

    $model->courseid="";
    $model->coursename="";

    ?>
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
NavBar::end();?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
