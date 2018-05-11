<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tutor */

$this->title = 'Update Tutor: ' . $model->tutorid;
$this->params['breadcrumbs'][] = ['label' => 'AdminHome', 'url' => ['admin/ahome']];
$this->params['breadcrumbs'][] = ['label' => 'Tutors', 'url' => ['tutor/index']];
$this->params['breadcrumbs'][] = ['label' => $model->tutorid, 'url' => ['tutor/view', 'id' => $model->tutorid]];
$this->params['breadcrumbs'][] = 'Update';


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


<div class="tutor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>