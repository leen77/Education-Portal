<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Temp */

$this->title = $model->tempid;
$this->params['breadcrumbs'][] = ['label' => 'Temps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="temp-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->tempid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->tempid], [
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
            'tempid',
            'courseid',
            'topicname',
            'pdf',
            'video',
        ],
    ]) ?>

</div>
