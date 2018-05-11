<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Temp */

$this->title = 'Update Temp: ' . $model->tempid;
$this->params['breadcrumbs'][] = ['label' => 'Temps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tempid, 'url' => ['view', 'id' => $model->tempid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="temp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
