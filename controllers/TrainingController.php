<?php

namespace app\controllers;

use app\models\Training;
use app\models\SearchTraining;
use Carbon\Carbon;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * TrainingController implements the CRUD actions for Training model.
 */
class TrainingController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Training models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SearchTraining();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $dataProvider->sort = false;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Training model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Training model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Training();

        if ($this->request->isPost && $model->load($this->request->post())) {
            if (empty($model->name)) {
                $date = Carbon::createFromFormat('Y-m-d H:i', $model->date);

                $model->name = Yii::t('app', 'Training') . ' ' . $date->format('D j. n.');
            }

            if ($model->save()) {
                Yii::$app->session->addFlash('success', Yii::t('app', sprintf('Training <strong>%s</strong> was created', $model->name)));

                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Training model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


        if ($this->request->isPost && $model->load($this->request->post())) {
            if (empty($model->name)) {
                $date = Carbon::createFromFormat('Y-m-d H:i', $model->date);

                $model->name = Yii::t('app', 'Training') . ' ' . $date->format('D j. n.');
            }

            if ($model->save()) {
                Yii::$app->session->addFlash('success', Yii::t('app', sprintf('Training <strong>%s</strong> was updated', $model->name)));

                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Training model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $model->deleted_at = Carbon::now()->format('Y-m-d H:i:s');
        $model->save();

        Yii::$app->session->addFlash('success', Yii::t('app', sprintf('Training <strong>%s</strong> was deleted', $model->name)));

        return $this->redirect(['index']);
    }

    /**
     * Finds the Training model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Training the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Training::findOne(['id' => $id])) !== null) {
            if ($model->deleted_at === null) {
                return $model;
            }
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
