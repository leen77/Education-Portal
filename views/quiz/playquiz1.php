<?php

    use yii\helpers\Html;
    use frontend\models\Course;
    use frontend\models\Tutor;
    use frontend\models\Userdb;
    use frontend\models\Temp;
    use yii\bootstrap\Nav;
     use yii\bootstrap\NavBar;
     use frontend\models\Quiz;
      use yii\bootstrap\ActiveForm;


     $quiz=Quiz::find()->all();

    $i=1;
    $form = ActiveForm::begin(['action' => ['playquiz2']]);
     foreach($quiz as $q)
     {

          if($q->tempid == $id1 && $q->quizno == $id2)
          {
             ?>
               
             <div class="col-lg-12">
 
          		<div class="panel panel-success">
 
               		<div class="panel-heading"></div>
 
               			 <div class="panel-body">
 
                    <b><h3><?php echo 'Q-'.$i.'  '.$q->qtext ?></b></h3>     

                   </div>
               </div>
         </div>   
        
           
                
           
             
             <?php 
              

            echo "<h4><b>". $form->field($model,'option[i]')->radioList(['A'=>$q->op1,'B'=>$q->op2,'C'=>$q->op3,'D'=>$q->op4])->label(false)."</b></h4>" ;
             echo "</br></br>";

           
          $i++;

          }
            
     }
     echo  $form->field($model, 'hidden1')->hiddenInput()->label(false);
      echo  $form->field($model, 'hidden2')->hiddenInput()->label(false);
    echo Html::submitButton('Submit', ['class' => 'btn btn-primary']) ;
    ActiveForm::end(); 
  ?>