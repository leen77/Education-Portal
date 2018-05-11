<?php

//use Yii;
use frontend\models\Content;
use frontend\models\Temp;

 $temp=Temp::find()->where(['tempid'=>$id])->limit(1)->one();

 $this->title = 'ViewVideo';
$this->params['breadcrumbs'][] = ['label' => 'TutorHome', 'url' => ['tutor/thome']];
$this->params['breadcrumbs'][] = ['label' => 'ViewCourse', 'url' => ['temp/history','id'=>$id]];
$this->params['breadcrumbs'][] = ['label' => 'ViewContent', 'url' => ['temp/historycontent','id'=>$id]];
$this->params['breadcrumbs'][] = $this->title;
?>


        
         <div class="col-lg-12">
 
          <div class="panel panel-danger">
                   
                     <div class="panel-heading"><h3><b><?php echo $temp->topicname ?> </b></h3></div>
              
                      <div class="panel-body"> 
         <video src="<?php echo $vname?>" width="1000" height="700"  controls>
    </video>
</div>
</div>
</div>
   