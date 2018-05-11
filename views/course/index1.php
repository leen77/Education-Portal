<?php


use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\ActiveForm;
use yii\elasticsearch\ActiveDataProvider;
use dosamigos\datepicker\DatePicker;
use yii\bootstrap\Nav;
use yii\bootstrap\Navbar;



/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

/*$this->title = 'Courses';
$this->params['breadcrumbs'][] = $this->title;
*/

$this->title = 'SearchCourses';
$this->params['breadcrumbs'][] = ['label' => 'UserHome', 'url' => ['userdb/shome']];
$this->params['breadcrumbs'][] = $this->title;
    NavBar::begin();
   
echo Nav::widget([
    'items' => [
        ['label' => 'Home', 'url' => ['/userdb/shome']],
        ['label' => 'My Courses', 'url' => ['/course/viewcourse']],
        ['label' => 'Search Courses', 'url' => ['/course/index1']],
        ['label' => 'Request Courses', 'url' => ['/request/userrequest']],
    ],
    'options' => ['class' => 'navbar-nav'],
]);
NavBar::end();


?>

   <?php  echo $this->render('_search',['model'=>$searchModel]);?>

   <?php Pjax::begin();?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'id'=>'grid',
        //'filterModel'=>$searchModel,
        'columns' => [
    // ...
            // 'contentOptions' => ['style' => 'width:2px;'],

           


          /* [ 'class' => 'yii\grid\CheckboxColumn',
           'options' => ['style' => 'width:2px;'],
           
           //'checkboxOptions' => function($model, $key, $index, $widget) {
            //return ['value' => $model['courseid'] ];
         //},
            

         ],*/

                
            
        // you may configure additional properties here
           
                // 'courseid',
                [
                    'headerOptions' => ['width' => '150'],
                   // 'attribute'=>'coursename',
                     'class' => 'yii\grid\ActionColumn',
                      'template' => '{myButton}',
                    //'options' => ['style' => 'width:2px;'],
                     'buttons' => [
                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::a($model->coursename,['/course/mycourse','id'=>$model->courseid]);
                }
            ],
        ],
                 
                /*[

                     'attribute'=>'tutorid',
                     'value'=>'tutor.tutorname',
                      'options' => ['style' => 'width:500px;'],

                ],*/

              /*  [
               //'headerOptions' => ['width' => '50'],     
            'class' => 'yii\grid\ActionColumn',
           //  'options' => ['style' => 'width:500px;'],
            'template' => '{myButton}',  // the default buttons + your custom button
            'buttons' => [
                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::a('Enroll',['/course/mycourse1','id'=>$model->courseid]);
                }
            ],
        ],*/
      
            

            
        ]
    ]); ?>

    <?php Pjax::end();?>

