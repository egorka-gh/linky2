<?php

namespace app\controllers;

use Yii;
use app\models\Favorites;
use app\models\Publications;
use app\models\PublicationsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PublicationsController implements the CRUD actions for Publications model.
 */
class PublicationsController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Publications models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PublicationsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Publications model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Publications model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Publications();
        $model['user'] = Yii::$app->user->id;;
        $model['post_date'] = date('Y-m-d H:i:s');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Publications model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Publications model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionAddLike(){
        //if (Yii::$app->request->isAjax) {
        if (!Yii::$app->user->isGuest) {
            $user = Yii::$app->user->id;
            $data = Yii::$app->request->post();
            $pid = $data['postId'];
            if($pid !== null){
                $pid=intval($pid);
            }
            $action = $data['action'];
            if($action == -1){
                //del
                $model = Favorites::findOne(['pub'=>$pid, 'user'=>$user]);
                if($model !== null){
                    $model->delete();   
                }
            }else if($action == 1){
                //add
                $model = new Favorites();
                $model['pub'] = $pid;
                $model['user'] = $user;
                $model->save();
            }
        }

        //recalc likes
        $count = Favorites::find()->where(['pub'=>$pid])->count();
        $data=array('likes' => $count, 'pid'=> $pid);
        return $this->asJson($data);
    }

    /**
     * Finds the Publications model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Publications the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Publications::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
