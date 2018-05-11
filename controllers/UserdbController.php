<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Userdb;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;
use yii\db\Exception;
use yii\web\UploadedFile;
use frontend\models\UserdbSearch;
use frontend\models\Account;
use frontend\models\Tutor;

/**
 * UserdbController implements the CRUD actions for Userdb model.
 */
class UserdbController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    
    public function actionIndex()
    {
        $searchModel = new UserdbSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
  public function actionHome()
    {
      
        $model=new Userdb();
        $session=new Session;
         $POST_VARIABLE=Yii::$app->request->post('Userdb');
        $eml = $POST_VARIABLE['email']; 
        $pwd =$POST_VARIABLE['password'];
        $role=$POST_VARIABLE['roleid'];
        $f=0;

        $users=Userdb::find()->all();
        foreach($users as $user)
        {
            if(strcmp($user->email,$eml) == 0 && strcmp($user->password,$pwd) == 0 && $user->roleid == $role)
            {
                $f=1;
                $session->open();
                $session['user']=$user->name;
                $session['email']=$user->email;

                if($role==1)
                {
                    return $this->render('shome',['email'=>$eml]);    
                }
                elseif ($role==3) 
                {
                    return $this->redirect(array('tutor/thome','model'=>$model,'email'=>$eml));
                }
                else
                {
                    return $this->redirect(array('admin/ahome','model'=>$model,'email'=>$eml));
                }
                
            }
           
      
         }

           if($f==0)
            {
              Yii::$app->session->setFlash('error', 'Username or Password incorrect');
                return $this->render('login'
            ,['model'=>$model]);
            }

    }

    public function actionShome()
    {
        $session=new Session;
      $email=$session['email'];
      return $this->render('shome',['email'=>$email]);
    }

public function actionAhome()
    {
        $session=new Session;
      $email=$session['email'];
      return $this->render('ahome',['email'=>$email]);
    }

      public function actionHome1()
    {
      $model=new Userdb();



      return $this->render('home1',[
        'model'=>$model]);
    }

    public function actionAccounthome()
    {
        $model=new Account;
        return $this->render('accounthome',['model'=>$model]);
    }

       public function actionAccounthome1()
    {
       $model=new Account;
          $POST_VARIABLE=Yii::$app->request->post('Account');;
          $model->accountno=$POST_VARIABLE['accountno'];
          $session=new Session;
          $em=$POST_VARIABLE['hidden4'];
           $tutor=Userdb::find()->where(['email'=>$em])->limit(1)->one();
           $model->userid=$tutor->userid;
           $model->save(false);


        
       Yii::$app->session->setFlash('success', 'You have successfully added.');
        return $this->render('registerhome');
    }




     public function actionRegisterhome()
    {
         
        $model=new Userdb();


       if(isset($_POST['Userdb']))
        {
            
             $model->attributes = $_POST['Userdb'];
             
             $POST_VARIABLE=Yii::$app->request->post('Userdb');
             $model->roleid= $POST_VARIABLE['roleid'];
             $email1 = $POST_VARIABLE['email']; 
             $model->file=UploadedFile::getInstance($model,'file');
             $model->file->saveAs('uploads/'.$model->file->baseName.'.'.$model->file->extension);
              $model->imgfile='uploads/'.$model->file->baseName.'.'.$model->file->extension;

            try
               {


                        $model->save(false);
                
                    
                       $model2=new Account();
                       $model2->hidden4=$email1;

                         if($model->roleid==3)
                         {
                            $model1=new Tutor;
                            $model1->userid=$model->userid;
                    
                            $model1->tutorname=$POST_VARIABLE['name'];
                        $model1->save(false);


                            return $this->render('accounthome',['model'=>$model2]);
                          }
                         Yii::$app->session->setFlash('success', 'You have successfully added.');
                        return $this->render('registerhome');
                }
            //}
            catch(Exception $e)
            //   else
                {
                 Yii::$app->session->setFlash('error', 'Email already exists');
                        return $this->render('register',['model'=>$model]);
                  }
             
       
        
        }


    
          
       
        
    }
  

      public function actionLogin()
    {
        $model=new Userdb();

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

       if ($model->load(Yii::$app->request->post()) && $model->login()) {
          return $this->goBack();
      }
      



      return $this->render('login',[
        'model'=>$model]);
    }


      public function actionLogout()
      {
         $model=new Userdb();
         Yii::$app->getSession()->destroy();
         return $this->render('login',[
        'model'=>$model]);
      }

      public function actionRegister()
    {
      $model=new Userdb();

     return $this->render('register',[
        'model'=>$model,]);

    }
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Userdb model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Userdb();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->userid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Userdb model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->userid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Userdb model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Userdb model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Userdb the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Userdb::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
