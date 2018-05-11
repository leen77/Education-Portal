<?php


use yii\helpers\Html;

      echo  Html::a('PDF', [
    'pdf',
  //  'id' => $model->id,
], [
    'class' => 'btn btn-primary',
    'target' => '_blank',
]); 

?>