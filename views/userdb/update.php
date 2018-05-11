<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;


/* @var $this yii\web\View */
/* @var $model frontend\models\Userdb */

$this->title = 'Update User: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'AdminHome', 'url' => ['admin/ahome']];
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['userdb/index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['userdb/view', 'id' => $model->userid]];
$this->params['breadcrumbs'][] = 'Update';
NavBar::begin();
echo Nav::widget([
    'items' => [
        ['label' => 'Home', 'url' => ['/admin/ahome']],
        ['label' => 'Manage Course', 'url' => ['/course/index']],
        ['label' => 'Manage Users', 'url' => ['/userdb/index']],
        ['label' => 'Manage Tutors', 'url' => ['/tutor/index']],
        ['label' => 'LogOut', 'url' => ['/userdb/logout']],
        
    ],
    'options' => ['class' => 'navbar-nav'],
]);
NavBar::end();?>



<div class="userdb-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
