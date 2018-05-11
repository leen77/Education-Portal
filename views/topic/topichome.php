<html>

     <style>
       .floating-box {
    display: inline-block;
    
    margin: 15px;
   
}

 .floating-box1 {
    display: inline;
    
  
   
}
  </style>
     <head></head>

     <body>


<?php

    use yii\helpers\Html;
    use frontend\models\Course;
    use frontend\models\Tutor;
     use frontend\models\Topic;
     use frontend\models\Content;
    use yii\bootstrap\Button;
    use yii\helpers\Url;
    use yii\bootstrap\Modal;
    use yii\bootstrap\Widget;

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
 
   				<div class="col-lg-12">
 
       					<div class="panel panel-default">

       						<div class="panel-body">
                      
                       <div class="floating-box">
                       <h3><b><?php echo $c->contentname?></b></h3>
                       <h4><b>by <?php echo $tutor->tutorname?></b></h4>
                        </div>
                      <div class="floating-box">
                       <b><h4><?php
                        echo Html::a('<img src="pdflogo.png" />',array('/content/viewpdf','id'=>$c->contentid));/*['class'=>'btn btn-primary'])*/
// echo Html::a('<img src="pdf.jpg" />', array('/content/viewpdf', 'id'=>$c->contentid));?></p></b></h4>
                       
                        
                       <b><h4><?php echo Html::a('<img src="videologo.png" />',array('/content/viewvideo','id'=>$c->contentid));/*['class'=>'btn btn-success']*/?></p></b></h4>
                        </div>
                          
                        
                       <b><h4><?php echo Html::a('<img src="like.png" />',array('/content/like','id'=>$c->contentid));?></p></b></h4>
                       
                        
                       <div class="floating-box1">  <b><h4><?= Html::a('<img src="Comment.png" />',array('/comment/commentit','id1'=>$c->contentid));?></p></b></h4>
                       </b></div>   
                          
                      </div>
                </div>
          </div>
              
                   

                   <?php
                 }

      }
?>
 <?php

             /*  Modal::begin([

                'id'=>'modal',
                'size'=>'modal-lg',

               ]);

               echo "<div id='modalContent'></div>";

               Modal::end();*/
               ?>

                      
            
</body>
</html>