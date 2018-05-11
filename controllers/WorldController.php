<?php

namespace frontend\controllers;
use Yii;
use frontend\models\form;
use frontend\models\Login;
use yii\web\Controller;
use yii\web\UploadedFile;

class WorldController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }



public function actionForm()
{
    $model = new Form();

    if ($model->load(Yii::$app->request->post())) {
        if ($model->validate()) {
            // form inputs are valid, do something here
            return;
        }
    }

    return $this->render('form', [
        'model' => $model,
    ]);
}

    public function actionLogin()
    {
      $model=new Login();
      return $this->render('login',['model'=>$model,]);
    }



     public function actionMyLogin1()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('mylogin1', [
                'model' => $model,
            ]);
        }
    }


      public function actionHome()
    {
        return $this->render('home');
    }

      public function actionForm1()
    {
       
       $form=new Form();
      if ($form->load(Yii::$app->request->post())){
   //    $form->title= $title;
     //    $form->email=$email;
      //$form->text= $text;
        $imageName=$form->text;
        $form->file=UploadedFile::getInstance($form,'file');
        $form->file->saveAs('uploads/'.$imageName.'.'.$form->file->extension);
        $form->upfile='uploads/'.$imageName.'.'.$form->file->extension;
        $form->save();

      if ($form->save())
      {
        return $this->refresh();
      }
    }

       /*$form->title= 'hi';
         $form->email='hello@gmail.com';
      $form->text= 'how r u?';
       $form->save();*/
         //}
        return $this->render('form1');
    }
}
