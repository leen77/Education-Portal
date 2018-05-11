<?php
namespace frontend\controllers;

use Yii;
//se yii\base\InvalidParamException;
//use yii\web\BadRequestHttpException;
use yii\web\Controller;
//use yii\filters\VerbFilter;
//use yii\filters\AccessControl;
//use common\models\LoginForm;
//use frontend\models\PasswordResetRequestForm;
//use frontend\models\ResetPasswordForm;
//use frontend\models\SignupForm;
//use frontend\models\ContactForm;

class Controller extends Controller
{
	  
 

	public function actionMylogin()
	{
		return $this->render('mylogin');
	}
}