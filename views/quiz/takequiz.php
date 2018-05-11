<?php

use yii\helpers\Html;
use frontend\models\Temp;
 use frontend\models\Course;
    use frontend\models\Tutor;
    
    use frontend\models\Userdb;


use yii\bootstrap\ActiveForm;


?>

<b><h3>Quiz</h3></b>
<?php 
	foreach($ques as $q)
{?>	


 <div class="row">
 
   				<div class="col-lg-12">
 
       					<div class="panel panel-default">

       						<div class="panel-body">

       						<?php echo $q->qtext;

       						
       						?>


       			

                              
                              </div>
                           </div>
                           </div>

                         </div>

                         <?php 
                     }?>