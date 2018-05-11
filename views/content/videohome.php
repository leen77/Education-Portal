    <?php

    use yii\helpers\Html;
    use frontend\models\Course;
    use frontend\models\Tutor;
    use frontend\models\Content;

  ?>
    
    <?php
    $content=Content::find()->all();/*where(['topicid'=>$id])*/;

    foreach($content as $c)
    {
    	   if(strcmp($c->topicid,$id) == 0)
             {
             	 $tutor=Tutor::find()->where(['tutorid'=>$c->tutorid])->limit(1)->one();
    	    	?>
    	   	

 	         <div class="row">
 
   				<div class="col-lg-9">
 
       					<div class="panel panel-default">

       						<div class="panel-body">

       							<p><b><h4><?php echo Html::a($c->contentname,['/content/viewvideo','id'=>$c->contentid])?></p></b></h4>
                                 <p><b>By <?php echo $tutor->tutorname; ?> <b></p> 
       					

                              
                              </div>
                           </div>
                           </div>

                         </div>
                    <?php

    }

}
   ?>
