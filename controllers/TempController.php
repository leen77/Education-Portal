<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Temp;
use frontend\models\Admintemp;
use frontend\models\Comment;
use frontend\models\TempSearch;
use frontend\models\Userdb;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Course;
use yii\web\UploadedFile;
use yii\web\Session;
use yii\db\Expression;


/**
 * TempController implements the CRUD actions for Temp model.
 */
class TempController extends Controller
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

    public function actionTutorupload()
    {
        $model=new Temp;

        return $this->render('tutorupload',['model'=>$model]);
    }

    public function actionViewtopic($id)
    {
        return $this->render('viewtopic',array('id'=>$id));
    }


    public function actionViewtutor($id)
    {
        return $this->render('viewtutor',array('id'=>$id));
    }
    public function actionLike1($id)
    { 

           $model = $this->findModel($id);
           $model->likes=($model->likes)+1;
           $model->save();


           return $this->redirect(['viewtopic', 'id' => $id]);

    }
    
    public function actionStatus()
    {
        return $this->render('status');
    }

    public function actionHistory($id)
    {
        return $this->render('history',['id'=>$id]);
    }

     public function actionHistorycomment($id)
    {
        return $this->render('historycomment',['id'=>$id]);
    }


     public function actionHistorycontent($id)
    {
        return $this->render('historycontent',['id'=>$id]);
    }



     public function actionTutoruploadhome()
     {
         $this->enableCsrfValidation = false; 
          $model=new Admintemp;
          $model1=new Temp;
          $session=new Session;
          $tut=$session['email'];

            $tutor=Userdb::find()->where(['email'=>$tut])->limit(1)->one();



          
             if(isset($_POST['Temp']))
             {
                 $POST_VARIABLE=Yii::$app->request->post('Temp');
                
                   //$model->courseid=$POST_VARIABLE['courseid'];
                   $model1->courseid=$POST_VARIABLE['courseid'];
                   //$model->topicname= $POST_VARIABLE['topicname']; 
                    $model1->topicname= $POST_VARIABLE['topicname']; 
                   //$model->userid=$tutor->userid;
                    $model1->userid=$tutor->userid;
                    $model1->file=UploadedFile::getInstances($model1,'file');
                    $model1->file1=UploadedFile::getInstances($model1,'file1');


                   $x='';
                   $y='';
                    
                 foreach($model1->file as $file)
                   {
                    $file->saveAs($file->baseName.'.'.$file->extension);

                     
                     
                      //$model->pdf=$file->baseName.'.'.$file->extension.'+'.$x; 
                       $model1->pdf=$file->baseName.'.'.$file->extension.'+'.$x; 
                  //   $model->video=$file->baseName.'.'.$file->extension.'+'.$x; 
                     $x=$file->baseName.'.'.$file->extension.'+'.$x;

                    }

                    
                    foreach($model1->file1 as $file1)
                   {
                    $file1->saveAs($file1->baseName.'.'.$file1->extension);

                     
                     
                     // $model->video=$file1->baseName.'.'.$file1->extension.'+'.$y;
                       $model1->video=$file1->baseName.'.'.$file1->extension.'+'.$y; 
                  //   $model->video=$file->baseName.'.'.$file->extension.'+'.$x; 
                     $y=$file1->baseName.'.'.$file1->extension.'+'.$y;

                    }
                  // $model->pdf='uploads/'.$model->file->baseName.'.'.$model->file->extension; 
                    // $model->video='uploads/'.$model->file->baseName.'.'.$model->file->extension; 

                   $expression = new Expression('NOW()');
                   $now = (new \yii\db\Query)->select($expression)->scalar();  // SELECT NOW();
                    $model1->uploadedon= $now;
                    if( $model1->save(false) )
                      {
                    Yii::$app->session->setFlash('success', 'Request Submitted to Administrator');
                    return $this->render('status');
                      }

               }     



     }
    


    public function actionIndex()
    {
        $searchModel = new TempSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Temp model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Temp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Temp();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->tempid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Temp model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionCommenthome()
    {
        $model=new Comment;
        
        $session=new Session;
      //  $uid=$session['user'];

       //  $user= Userdb::find()->where(['userid' => $uid])->limit(1)->one();

        if(isset($_POST['Comment']))
        {
           
          //  $model->attributes=$_POST['Comment'];
             $POST_VARIABLE=Yii::$app->request->post('Comment');

              if(isset($POST_VARIABLE['hidden3']))
              $id1=$POST_VARIABLE['hidden3'];

                else
                    $id1=1;
             $model->commentinfo=$POST_VARIABLE['commentinfo'];
            $model->tempid=$id1;
           // $model->userid=$uid;
           if($model->save())
            Yii::$app->session->setFlash('success', 'Commented Successfully');

            $model->hidden3=$id1;
            return $this->render('commentit',array('id1'=>$id1,'model'=>$model));
        }
    }
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->tempid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionCommentit($id)
    {
        $model=new Comment;
        $model->hidden3=$id;
        return $this->render('commentit',array('id'=>$id,'model'=>$model));
    }

    
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Temp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Temp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Temp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
