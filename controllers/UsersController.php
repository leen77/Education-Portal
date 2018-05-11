<?php
//namespace app\controllers;
namespace frontend\controllers;
 use yii\web\Controller;

use frontend\models\Users;
 
 class UsersController extends Controller
 {
	 public function actionIndex1(){
		 $users=Users::find()->all();
		//print_r($users);
		 return $this->render('index1',['users'=>$users]);
		 
	 }
 }
 ?>