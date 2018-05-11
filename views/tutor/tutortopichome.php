<?php

    use yii\helpers\Html;
    use frontend\models\Course;
    use frontend\models\Tutor;
     use frontend\models\Topic;
     use frontend\models\Content;
    use yii\bootstrap\Button;
    use yii\helpers\Url;
    use yii\bootstrap\Modal;

    $topic=Topic::find()->where(['topicid'=>$id])->limit(1)->one();
      $content=Content::find()->all();/*where(['topicid'=>$id])*/;

   

    ?>
     <?php  echo"<b><h2>".$topic->topicname."</h2></b>"?>
 <?php
   
          foreach($content as $c)
           {
               if(strcmp($c->topicid,$id) == 0)   //  $tutor=Tutor::find()->where(['tutorid'=>$c->tutorid])->limit(1)->one();
                {

                   $tutor=Tutor::find()->where(['tutorid'=>$c->tutorid])->limit(1)->one();

          ?>
          

          <!-- <div class="row">-->
 
          <div class="col-lg-6">
 
                <div class="panel panel-default">

                  <div class="panel-body">
                      
                       <div class="floating-box">
                       <h3><b><?php echo $c->contentname?></b></h3>
                       <h4><b>by <?php echo $tutor->tutorname?></b></h4>
                        </div>
                      <div class="floating-box">
                       <b><h4><?php echo Html::a('PDF',['/content/viewpdf','id'=>$c->contentid],['class'=>'btn btn-primary'])?></p></b></h4>
                       
                        
                       <b><h4><?php echo Html::a('Video',['/content/viewvideo','id'=>$c->contentid],['class'=>'btn btn-success'])?></p></b></h4>
                        </div>
                          
                        
                       <b><h4><?php echo Html::a('Like',['/content/like','id'=>$c->contentid],['class'=>'btn btn-primary'])?></p></b></h4>
                         </b><?php echo $c->likes?></b>
                       <div class="floating-box1">  <b><h4><?= Html::a('Comment',['/comment/commentit','id1'=>$c->contentid],['class'=>'btn btn-success'])?></p></b></h4>
                       </b></div>   
                          
                      </div>
                </div>
          </div>
              
                   

                   <?php
                 }

      }
?>