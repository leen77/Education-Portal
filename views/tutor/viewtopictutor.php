<?php

    use yii\helpers\Html;
    use frontend\models\Course;
    use frontend\models\Tutor;
     use frontend\models\Content;


    ?>

    <?php

    $tutor=Tutor::find()->where(['tutorid'=>$id])->limit(1)->one();
?>
    <b><h2><?= $tutor->tutorname?></h2></b>
 <?php
    $courses=Content::find()->all();
    foreach($courses as $c)
    {
           if($c->tutorid== $id)
           {
               
            ?>
            

             <div class="row">
 
                <div class="col-lg-6">
 
                        <div class="panel panel-default">

                            <div class="panel-body">

                                <p><b><h4><?php echo Html::a($c->contentname,['/tutor/topictutorhome','id'=>$c->contentid])?></p></b></h4>

                

                              
                              </div>
                           </div>
                           </div>

                         </div>
                    <?php

           }
    }
?>
