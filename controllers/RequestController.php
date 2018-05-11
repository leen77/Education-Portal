<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Request;
use frontend\models\Specificreq;
use frontend\models\RequestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;

/**
 * RequestController implements the CRUD actions for Request model.
 */
class RequestController extends Controller
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
     * Lists all Request models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RequestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionRemoverequest($id)
    {
          $s=Specificreq::find()->where(['requestid'=>$id])->limit(1)->one() ;
         $e=Request::find()->where(['requestid'=>$id])->limit(1)->one() ;

    if($s!=null)
         $s->delete();
       $e->delete();

        return $this->redirect(array('/tutor/tutorrequests'));  
    }

    public function actionUserrequest()
    {
        $model=new Request;
    $model->hidden1=0;
        return $this->render('userrequest',['model'=>$model]);
    }


    public function actionRequesthome()
    {
           
        $model=new Request;
        $POST_VARIABLE=Yii::$app->request->post('Request');
             
          /*  if(isset($POST_VARIABLE['hidden1']))
             $f = $POST_VARIABLE['hidden1']; 

            if(isset($POST_VARIABLE['hidden2']))
             $f = $POST_VARIABLE['hidden2']; */
        
      //  if($f==0)
       // {
        $model->attributes = $_POST['Request'];
        $expression = new Expression('NOW()');
        $now = (new \yii\db\Query)->select($expression)->scalar();  // SELECT NOW();
        $model->requestedon= $now;

          Yii::$app->session->setFlash('success', 'Your request successfully created.');
        $model->save();
       // }
         
        // else
         //{

          //$model->attributes = $_POST['Request'];
         //Yii::$app->session->setFlash('success', 'Your request successfully updated.');
           //$model->save();
     //}

        return $this->render('userrequest',['model'=>$model]);

    


    }

    /**


     * Displays a single Request model.
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
     * Creates a new Request model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Request();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->requestid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }



    /**
     * Updates an existing Request model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->requestid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

     public function actionUpdate1($id)
    {
     //   $model = $this->findModel($id);
    
        $model=new Request;
    
        
                $model->hidden2=1;
            return $this->render('update1',['id'=>$id,'model'=>$model]);
    }

    /**
     * Deletes an existing Request model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

     public function actionDelete1($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['userrequest']);
    }

    /**
     * Finds the Request model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Request the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Request::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
