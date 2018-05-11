<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Admin;
use frontend\models\Temp;
use frontend\models\Admintemp;
use frontend\models\AdminSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdminController implements the CRUD actions for Admin model.
 */
class AdminController extends Controller
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
     * Lists all Admin models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdminSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionMakepayment($id)
    {
        return $this->render('makepayment',['id'=>$id]);
    }


     public function actionAdminhistory($id)
     {
        return $this->render('adminhistory',['id'=>$id]);
     }

     public function actionAdminhistorycontent($id)
     {
        return $this->render('adminhistorycontent',['id'=>$id]);
     }

      public function actionAdminhistorycomment($id)
     {
        return $this->render('adminhistorycomment',['id'=>$id]);
     }


    /**
     * Displays a single Admin model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionAdmintopic($id)
    {
        return $this->render('admintopic',[
            'id'=>$id]);
    }

     public function actionAhome()
     {
        return $this->render('ahome');
     }
     public function actionViewquiz($id)
     {
         return $this->render('viewquiz',['id'=>$id]);
     }

      public function actionAdminrequests()
      {
         return $this->render('adminrequests');
      }

    public function actionApprove($id)
    {
          $a= Temp::find()->where(['tempid' => $id])->limit(1)->one(); 
          $a->status='approved';
          $a->save();

          return $this->render('ahome');

    } 

    public function actionReject($id)
    {
         $a= Temp::find()->where(['tempid' => $id])->limit(1)->one(); 
          $a->status='rejected';
          $a->save();

          return $this->render('ahome');
    }

    /**
     * Creates a new Admin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Admin();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->email]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->email]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Admin model.
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
     * Finds the Admin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Admin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Admin::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
