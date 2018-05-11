<?php


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use yii\widgets\Pjax;


$this->title = 'Search';
$this->params['breadcrumbs'][] = $this->title;
?>


     
                

                           <?php $form = ActiveForm::begin(['action' => ['search','id'=>$model->coursename]]); ?>

                              <?= $form->field($model, 'coursename')->textInput(['style'=>'width:250px']) ;?>

                


             

                       <div class="form-group">
               
                       <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            
                        </div>
                <?php ActiveForm::end(); ?>

<?php Pjax::begin();?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel'=>$searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
                'coursename',
             
            

            
        ]
    ]); ?>

    <?php Pjax::end();?>
        

