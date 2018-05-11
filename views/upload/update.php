<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Uploads */

$this->title = 'Update Uploads: ' . $model->uploadid;
$this->params['breadcrumbs'][] = ['label' => 'Uploads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->uploadid, 'url' => ['view', 'id' => $model->uploadid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="uploads-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
