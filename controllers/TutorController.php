<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Tutor;
use frontend\models\TutorSearch;
use frontend\models\UserdbSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Content;
use frontend\models\Course;
use frontend\models\Request;
use frontend\models\Specificreq;
use yii\web\Session;
use yii\db\Expression;
/**

 * TutorController implements the CRUD actions for Tutor model.
 */
class TutorController extends Controller
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

    /**
     * Lists all Tutor models.
     * @return mixed
     */
    public function actionSpecifictutor()
    {
         $searchModel = new TutorSearch();
         $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

       return $this->render('specifictutor', [
            'dataProvider' => $dataProvider,
            'searchModel'=>$searchModel
        ]);
    }


  public function actionSearchtutor()
    {
         $searchModel = new TutorSearch();
         $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

       return $this->render('searchtutor', [
            'dataProvider' => $dataProvider,
            'searchModel'=>$searchModel
        ]);
    }


    public function actionSpecifictutor1($id)
    {
        $model=new Request;

        $model->hidden4=$id;
      return $this->render('specifictutor1',[
         'id'=>$id,'model'=> $model,
      ]);
    } 


    public function actionThome()
    {

      $session=new Session;
      $email=$session['email'];
      return $this->render('thome',['email'=>$email]);
    }
      public function actionSpecifictutor2()
    
    {

        $model=new Request;
        $model1=new Specificreq;
        $model->attributes = $_POST['Request'];
        $POST_VARIABLE=Yii::$app->request->post('Request');
        $model->specificreq=1;
        $model->save();
        $id=$POST_VARIABLE['hidden4'];
        $model1->requestid=$model->requestid;
        $model1->tutorid=$id;
        $expression = new Expression('NOW()');
        $now = (new \yii\db\Query)->select($expression)->scalar();  // SELECT NOW();
        $model->requestedon= $now;
        $model1->save();

        Yii::$app->session->setFlash('success', 'Your Request  successfully created.');
        return $this->render('specifictutor1',
            ['id'=>$id,'model'=>$model]);



     }

     public function actionTutorrequests()
     {
        return $this->render('tutorrequests');
     }
    public function actionHome()
            
    {
        return $this->render('home');
    }
    
    public function actionIndex()
    {
        $searchModel = new TutorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionViewtopictutor($id)
    {
         return $this->render('viewtopictutor',array('id'=>$id));
      }
     public function actionTutorhome($id)
    
   {

     return $this->render('tutorhome',array('id'=>$id));
   }

   public function actionTopictutorhome($id)
   {
      return $this->render('topictutorhome',array('id'=>$id));
   }
    /**
     * Displays a single Tutor model.
     * @param integer $id
     * @return mixed
     */
    
    public function actionTutorsearch()
    {
         $searchModel = new TutorSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    
    return $this->render('tutorsearch', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]);
    }
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tutor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tutor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->tutorid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tutor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->tutorid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Tutor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tutor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tutor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tutor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
