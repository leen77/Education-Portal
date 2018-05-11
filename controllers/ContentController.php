<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Content;
use frontend\models\ContentSearch;
use frontend\models\Content1Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * ContentController implements the CRUD actions for Content model.
 */
class ContentController extends Controller
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
     * Lists all Content models.
     * @return mixed
     */

    public function actionPdfhome($id)
    {
         return $this->render('pdfhome',array('id'=>$id));
    }

     public function actionVideohome($id)
    {
         return $this->render('videohome',array('id'=>$id));
    }
    public function actionIndex()
    {
      

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

     
    public function actionTutortopicsearch($id)
    {

        //if($f==0)
        //{
        $query = Content::find()->where(['tutorid' => $id]);
         $searchModel = new ContentSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

       $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
       return $this->render('tutortopicsearch', [
            'dataProvider' => $dataProvider,
            'searchModel'=>$searchModel,
            'id'=>$id,
        ]);
    }
   //}

     /* else
      {
          $searchModel = new ContentSearch();
          return $this->render('tutortopicsearch', [
            'dataProvider' => $dataProvider,
            'searchModel'=>$searchModel,
            'id'=>$id,
        ]);

      }*/
    

   /* public function actionTutortopic1search($dataProvider)
    {
        $searchModel = new Content1Search();
       // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('tutortopic1search', [
            'dataProvider' => $dataProvider,
            'searchModel'=>$searchModel
        ]);
    }*/



    public function actionViewvideo($video,$id)
   {
      //$video= Content::find()->where(['contentid' => $id])->limit(1)->one();
      return $this->render('viewvideo',['vname'=>$video,'id'=>$id]);
   }

    public function actionViewpdf($content)
    {
       //$filename = Content::find()->where(['contentid' => $id])->limit(1)->one();
        
          $filename=$content;
        $path = Yii::getAlias('@webroot').'/';
       // $filePath=$path.$filename->plocation;
       // $myFileName='1.pdf';
        $filePath=$path.$content;

   
     $file = $filePath;
     $fp = fopen($file, "r") ;

header("Cache-Control: maxage=1");
header("Pragma: public");
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=".$filename."");
header("Content-Description: PHP Generated Data");
header("Content-Transfer-Encoding: binary");
header('Content-Length:' . filesize($file));
ob_clean();
flush();
while (!feof($fp)) {
   $buff = fread($fp, 1024);
   print $buff;
}
exit;
    } 

    /**
     * Displays a single Content model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionLike($id)
    { 
       

           $model = $this->findModel($id);
           $model->likes=($model->likes)+1;
           $model->save();

           return $this->redirect(['topic/topichome', 'id' => $model->topicid]);

    }

     public function actionLike1($id)
    { 
       

           $model = $this->findModel($id);
           $model->likes=($model->likes)+1;
           $model->save();

           return $this->redirect(['tutor/topictutorhome', 'id' => $model->contentid]);

    }

    /**
     * Creates a new Content model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Content();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->contentid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Content model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->contentid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Content model.
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
     * Finds the Content model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Content the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Content::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
