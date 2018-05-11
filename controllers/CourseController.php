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
/**
 * CourseController implements the CRUD actions for Course model.
 */
class CourseController extends Controller
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

    /**return 
     * Lists all Course models.
     * @return mixed
     */

     public function actionIndex()
    {
        $searchModel = new CourseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndex1()
    {
       
        /*$searchModel= new CourseSearch;
        $query = Course::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);*/

        $searchModel = new CourseSearch();
         $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

       return $this->render('index1', [
            'dataProvider' => $dataProvider,
            'searchModel'=>$searchModel
        ]);
    }

   public function actionViewcourse()
   {
    return $this->render('viewcourse');
   }

   public function actionViewcourse1($id)
   {
    return $this->render('viewcourse1',['id'=>$id]);
   }

   public function actionMycourse($id)
    {

         
        return $this->render('mycourse',array('id'=>$id));
    }

    public function actionMycourse1($id)
    {
         $session=new Session;
         $email=$session['email'];
        $model=new Enroll ;
         
         $u= Userdb::find()->where(['email' => $email])->limit(1)->one();

         $t= Temp::find()->where(['tempid' => $id])->limit(1)->one();

         $e=Enroll::find()->where(['tempid'=>$id ,'userid'=>$u->userid])->limit(1)->one() ;
       //  $x=$e->find()->count() ;
         if($e==null) 
        {
          $model->userid=$u->userid ;
          $model->tempid=$t->tempid ;
          $model->save(false);
          Yii::$app->session->setFlash('success', 'Successfully Enrolled the course');
        return $this->render('viewcourse');
         }  
         
         
         else
        {

               Yii::$app->session->setFlash('error', 'ALready Enrolled the course');
               return $this->render('viewcourse');

        
        }
    }

      
    public function actionUnenroll($id)
    {
       $e=Enroll::find()->where(['enrollid'=>$id])->limit(1)->one() ;
       $e->delete();

        return $this->render('viewcourse');  
    }
    public function actionHello2(){
   $action=Yii::$app->request->post('action');
   $selection=(array)Yii::$app->request->post('selection');
   print_r($selection);
        }

    
  
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Course model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Course();

      


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->courseid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


public function actionCourse1()
{
  $model = new Course();
$model->attributes = $_POST['Course'];

 $model->file=UploadedFile::getInstance($model,'file');
             $model->file->saveAs($model->file->baseName.'.'.$model->file->extension);
              $model->logo=$model->file->baseName.'.'.$model->file->extension;

 $model->save(false);

  return $this->render('create', [
                'model' => $model,
            ]);

}
    /**
     * Updates an existing Course model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->courseid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Course model.
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
     * Finds the Course model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Course the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Course::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
