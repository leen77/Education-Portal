<?php

use yii\web\Session;
use frontend\models\Userdb;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use frontend\models\Course;
use frontend\models\Temp;
use frontend\models\Request;
use frontend\models\Specificreq;


NavBar::begin();
echo Nav::widget([
    'items' => [
    	['label' => 'Home', 'url' => ['/tutor/thome']],
        ['label' => 'Upload', 'url' => ['/temp/tutorupload']],
        ['label' => 'Requests', 'url' => ['/tutor/tutorrequests']],
        ['label' => 'Status', 'url' => ['/temp/status']],
        ['label' => 'LogOut', 'url' => ['/userdb/logout']],
    ],
    'options' => ['class' => 'navbar-nav'],
]);
NavBar::end();



 $session=new Session;
  $em=$session['email'];


  $tut=Userdb::find()->where(['email'=>$em])->limit(1)->one();


  $all=Request::find()->all();

$i=0;
 foreach($all as $a)
     {
      
        if($a->specificreq == 0)
         {
              $i++;
      
      ?>
          <div class="col-lg-12">
 
          <div class="panel panel-info">
                     <div class="panel-heading">

                         <h4 class="panel-title">
                              <b><a data-toggle="collapse" href="#<?php echo $i?>"><?php echo $a->coursesubject ?></a></b>
                           </h4>
                       

                     </div>
                        
                    <div id="<?php echo $i?>" class="panel-collapse collapse">
                       <div class="panel-body">
                          <h4><b><?php echo "Details: ". $a->coursedetails ?></b></h4>
                      <h5><b><?php echo "Requested on: ". $a->requestedon ?></b></h5>
                      <?php echo Html::a('Remove',['/request/removerequest','id'=>$a->requestid],['class'=>'btn btn-danger']);?>
                       </div>
                   </div>

                  

                   
                    


</div>

 </div>



                      <?php
                             }
                          }
                          ?>
  </br></br></br></br></br></br> </br></br> </br></br> </br></br> </br></br>                          
<h3><b>Specific Requests</b></h3>

<?php

$j=1000;
$r=Specificreq::find()->all();
foreach($r as $t)
     {


        if($t->tutorid == $tut->userid)
         {
            $j++;
          $req=Request::find()->where(['requestid'=>$t->requestid])->limit(1)->one();
    
      
      ?>
          <div class="col-lg-12">
 
          <div class="panel panel-info">
                   
                    
              
                       <div class="panel-heading">

                         <h4 class="panel-title">
                              <b><a data-toggle="collapse" href="#<?php echo $j?>"><?php echo $req->coursesubject ?></a></b>
                           </h4>
                       

                     </div>
                        
                    <div id="<?php echo $j?>" class="panel-collapse collapse">
                       <div class="panel-body">
                          <h4><b><?php echo "Details: ". $req->coursedetails ?></b></h4>
                      <h5><b><?php echo "Requested on: ". $req->requestedon ?></b></h5>
                                            <?php echo Html::a('Remove',['/request/removerequest','id'=>$req->requestid],['class'=>'btn btn-danger']);?>
                       </div>
                   </div>

</div>

</div>

                      <?php
                             }
                          }
                          ?>

