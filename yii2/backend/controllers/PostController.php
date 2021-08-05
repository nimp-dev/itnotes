<?php


namespace backend\controllers;
use backend\models\MmAtCt;
use yii\base\BaseObject;
use yii\base\DynamicModel;
use yii\console\Response;
use yii\data\ActiveDataProvider;
use backend\models\Articles;
use backend\models\Categories;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
use Yii;
use yii\helpers\Url;
use yii\web\UploadedFile;


class PostController extends AppAdminController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'view', 'update', 'create', 'delete','save-redactor-img'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Articles::find(),
            'pagination' => [
                'pageSize' => 10
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ],
        ]);

        return $this->render('index',[
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Articles();
        $modelcat = new MmAtCt();

        if ($model->load(Yii::$app->getRequest()->post()) && $model->save()) {
            $modelcat->article = $model->id;
            if($modelcat->load(Yii::$app->getRequest()->post()) && $modelcat->save())

                return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelcat' => $modelcat,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelcat = MmAtCt::findOne(['article'=>$id]);


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelcat' => $modelcat,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        $mmtt = MmAtCt::findOne(['article'=>$id]);
        $mmtt->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Articles::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSaveRedactorImg() {
        $this->enableCsrfValidation = false;
        if(Yii::$app->request->isPost){
            $dir = Yii::getAlias('@images').'/';
            $result_link = str_replace('admin.','',Url::home(true)).'/uploads/images/';
            $file = UploadedFile::getInstanceByName('file');
            $model = new DynamicModel(compact('file'));
            $model->addRule('file','image')->validate();

            if($model->hasErrors()) {
                $result = [
                    'error' => $model->getFirstError('file')
                ];
            }else{
                $model->file->name = strtotime('now').'.'.$model->file->extension;
                if($model->file->saveAs($dir.$model->file->name)){
                    $result = ['filelink'=>$result_link.$model->file->name, 'filename'=>$model->file->name];
                } else{
                    $result = [
                        'error' => Yii::t('vova07/imperavi','ERROR_CAN_NOT_UPLOAD_FILE')
                    ];
                }
            }
            Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
            return $result;
        } else {
            throw new BadRequestHttpException('Only POST is allowed');
        }
    }

}