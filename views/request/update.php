<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Request */

$this->params['breadcrumbs'][] = ['label' => 'Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->requestid, 'url' => ['view', 'id' => $model->requestid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="request-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
