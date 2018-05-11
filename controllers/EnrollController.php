<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Enroll;
use frontend\models\EnrollSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Userdb;
use frontend\models\Temp;
use yii\web\Session;
/**
 * EnrollController implements the CRUD actions for Enroll model.
 */
class EnrollController extends Controller
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
     * Lists all Enroll models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EnrollSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Enroll model.
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
     * Creates a new Enroll model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Enroll();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->enrollid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
  public function actionLike($id)
    { 

           $session=new Session;
         $email=$session['email'];
        $model=new Enroll ;
         
         $u= Userdb::find()->where(['email' => $email])->limit(1)->one();

         $t= Temp::find()->where(['tempid' => $id])->limit(1)->one();

         $e=Enroll::find()->where(['tempid'=>$id ,'userid'=>$u->userid])->limit(1)->one() ;

        
           //$model = $this->findModel($id);
          // $e->likes=($e->likes)+1;
          
            if($e->tlikes == 0)
            {
                   $e->tlikes=($e->tlikes)+1;
                    $t->likes=($t->likes)+1;
                      $e->save();
                        $t->save();

            }

        else
        {

         //   $e->tlikes=($e->tlikes);
           //         $e->likes=($e->likes);
             //         $e->save();
                       Yii::$app->session->setFlash('danger', 'You already liked the topic');

        }

           return $this->redirect(['/temp/viewtopic', 'id' => $id]);

    }
    /**
     * Updates an existing Enroll model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->enrollid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Enroll model.
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
     * Finds the Enroll model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Enroll the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Enroll::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
