<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Course;
use frontend\models\Temp;
use frontend\models\CourseSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\bootstrap\Alert;
use yii\bootstrap\Widget;
use yii\web\Session;
use frontend\models\Enroll;
use frontend\models\Userdb ;
use yii\web\UploadedFile;
use frontend\models\Account;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;



 $acc=Account::find()->where(['userid'=>$id])->limit(1)->one();
 $u=Userdb::find()->where(['userid'=>$id])->limit(1)->one();


?>

<h3><b>AccountNo:     <?php echo $acc->accountno ?>  </b></h3>
<h3><b>Tutorname:     <?php echo $u->name ?>  </b></h3>
<h4><b>Payment:   5000  </b></h4>


       
 <h4> <b><?php echo Html::a('MakePayment',['/admin/ahome'],['class'=>'btn btn-danger']);?></b></h4>

 




