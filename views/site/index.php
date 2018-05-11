<html>

 <head>

 

     <style type="text/css">

   .center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
}

     body {
    margin: 0;
    /* The image used */
    background-image: url("finally.jpg");

    /* Full height */
    height: 100%; 

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
         td {
    padding: 40px;
}
img
{
  align-self: center;
}


     </style>
 </head>

 <body>
  
<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\bootstrap\Alert;
use yii\bootstrap\Widget;


 

/* @var $this yii\web\View */

$this->title = 'Eductronic';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1 style="color:cyan;">Eductronic</h1>

        <p class="lead"><h4 style="color:red;"><b>The Education portal for learners of Computer/IT Technology</b></h4></p>

        <!--<p><img src="bookhat.jpg"/></p>-->

             <table align="center">
            <tr>
                <td><?php $form = ActiveForm::begin(['action' => ['/userdb/login'],]);?>
             <?= Html::submitButton('Login', ['class' => 'btn btn-success']) ?>
              <?php ActiveForm::end(); ?></td>
        
                <td>
              <?php $form = ActiveForm::begin(['action' => ['/userdb/register'],]);?>
             <?= Html::submitButton('Signup', ['class' => 'btn btn-success']) ?>
              <?php ActiveForm::end(); ?>
                  </td>

        </tr>
    </table>
    </div>

  <?php

$images=['<img  class="center" src="data.jpg" height="200" width="400"/>','<img  class="center" src="js2.jpg"  height="200" width="400"/>','<img src="py.png"   class="center" height="200" width="400"/>','<img src="java.png"   class="center" height="200" width="400" />'];
echo yii\bootstrap\Carousel::widget(['items'=>$images]);

    ?>

      <!--<script type="text/javascript">
var slideimages = new Array() 
slideimages[0] = new Image() 
slideimages[0].src = "1.jpg" 
slideimages[1] = new Image()
slideimages[1].src = "2.jpg"
slideimages[2] = new Image()
slideimages[2].src = "3.jpg"
/*slideimages[3] = new Image()
slideimages[3].src = "4.jpg"
slideimages[4] = new Image()
slideimages[4].src = "Images/Slider/tag-model.jpg"*/

var step=0

function slideit(){
 if (!document.images)
  return
 document.getElementById('slide').src = slideimages[step].src
 if (step<2)
  step++
 else
  step=0
 setTimeout("slideit()",3500)
}

slideit()
</script>  --> 

      <!--  <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>-->

</body>
</html>