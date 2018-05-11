<?php

 use yii\helpers\Html;
 use frontend\models\Request;
 use yii\widgets\ActiveForm;

  
 
  Yii::$app->session->getFlash('success');
  
  ?>

  <?php


   $request = Request::find()->where(['requestid' => $id])->limit(1)->one();
   
   ?>

   <div class="col-lg-6">
 
       		<div class="panel panel-default">
 
          		
                   	  <div class="panel-body">                       
                                
                            <p><b><h4>Course Subject:</b> <?=$request->coursesubject?> </p></h4>
                            <p><b><h4>Course Info:</b> <?=$request->coursedetails?> </p></h4>

                               <p>
        <?= Html::a('Update', ['update1','id' => $request->requestid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete1','id' => $request->requestid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
                        

                       </div>

                   </div>

             </div>    

          

           
    
