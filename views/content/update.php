<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Content */

$this->title = 'Update Content: ' . $model->contentid;
$this->params['breadcrumbs'][] = ['label' => 'Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->contentid, 'url' => ['view', 'id' => $model->contentid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="content-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
