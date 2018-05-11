<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this yii\web\View */
/* @var $model frontend\models\Userdb */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'AdminHome', 'url' => ['admin/ahome']];
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['userdb/index']];
$this->params['breadcrumbs'][] = $this->title;

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



<div class="userdb-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->userid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->userid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'userid',
            'password',
            'name',
           // 'dob',
            'email:email',
            'mobile',
            'university',
            'roleid',
            'imgfile',
        ],
    ]) ?>

</div>