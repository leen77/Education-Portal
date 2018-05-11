<?php

use yii\web\Session;
use frontend\models\Userdb;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use frontend\models\Temp;
use frontend\models\Course;



     NavBar::begin();
echo Nav::widget([
    'items' => [
        ['label' => 'Home', 'url' => ['/userdb/shome']],
        ['label' => 'My Courses', 'url' => ['/course/viewcourse']],
        ['label' => 'Search Courses', 'url' => ['/course/index1']],
         ['label' => 'Search Tutor', 'url' => ['/tutor/searchtutor']],
        ['label' => 'Request Courses', 'url' => ['/request/userrequest']],
       ['label' => 'LogOut', 'url' => ['/userdb/logout']], 
    ],
    'options' => ['class' => 'navbar-nav'],
]);
NavBar::end();?>



<h2> <b>This(Eductronic) project is developed by 
<br>
	Neel Shah(CE-111)
	Jay Thanki(CE-127)
	Naman Thacker(CE-126)
<br>
as a part of System Design Practice(SDP) Project 

</b></h2>