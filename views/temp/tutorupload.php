
<html>
<head>
          <style>
          .progress { position:relative; width:400px; border: 1px solid #ddd; padding: 1px; border-radius: 3px; }
.bar { background-color: #B4F5B4; width:0%; height:20px; border-radius: 3px; }
.percent { position:absolute; display:inline-block; top:3px; left:48%; }
</style>
</head>
<body>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Course;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;



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
NavBar::end();?>



<h2><b>Upload Content</b></h2>

    <?php $form = ActiveForm::begin(['action' => ['tutoruploadhome'],

    'options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($model, 'courseid') ->dropDownList(
        	ArrayHelper::map(Course::find()->all(),'courseid','coursename'),
        	[
                'prompt'=>'Select Course...',

        	]
        	) ;?>
       
        <?= $form->field($model, 'topicname') ->textInput(['style'=>'width:500px']) ;?>
        <?= $form->field($model,'file[]')->fileInput(['multiple'=>true]);?>
        <?= $form->field($model,'file1[]')->fileInput(['multiple'=>true]);?>

        <div class="form-group">
            <?= Html::submitButton('Upload', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
  
   <!--<div class="progress">
        <div class="bar"></div >
        <div class="percent">0%</div >
    </div>
    
    <div id="status"></div>
    
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script>
(function() {
    
var bar = $('.bar');
var percent = $('.percent');
var status = $('#status');
   
$('form').ajaxForm({
    beforeSend: function() {
        status.empty();
        var percentVal = '0%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
    uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete + '%';
        bar.width(percentVal)
        percent.html(percentVal);
        //console.log(percentVal, position, total);
    },
    success: function() {
        var percentVal = '100%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
    complete: function(xhr) {
        status.html(xhr.responseText);
    }
}); 

})();       
</script>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
<script type="text/javascript">
_uacct = "UA-850242-2";
urchinTracker();
</script>-->
</body>
</html>

