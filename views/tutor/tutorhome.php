<?php

    use yii\helpers\Html;
    use frontend\models\Course;
    use frontend\models\Tutor;
     use frontend\models\Topic;
     use frontend\models\Content;
    use yii\bootstrap\Button;
    use yii\helpers\Url;
    

   $tutor=Tutor::find()->where(['tutorid'=>$id])->limit(1)->one();
      $content=Content::find()->all();/*where(['topicid'=>$id])*/;

   

    ?>
     <?php  echo"<b><h2>".$tutor->tutorname."</h2></b>"?>
 <?php
   
          foreach($content as $c)
           {
               if(strcmp($c->tutorid,$id) == 0)   //  $tutor=Tutor::find()->where(['tutorid'=>$c->tutorid])->limit(1)->one();
                {

                   $tutor=Tutor::find()->where(['tutorid'=>$c->tutorid])->limit(1)->one();

          ?>
          

          <!-- <div class="row">-->
 
          <div class="col-lg-9">
 
                <div class="panel panel-default">

                  <div class="panel-body">
                      
                       <h3><b><?php echo $c->contentname?></b></h3>
                     

                       <b><h4><?php echo Html::a('PDF',['/content/viewpdf','id'=>$c->contentid])?></p></b></h4>

                       <b><h4><?php echo Html::a('Video',['/content/viewvideo','id'=>$c->contentid])?></p></b></h4>
                      </div>
                </div>
          </div>


                   <?php
                 }

      }
?>
                      
            
