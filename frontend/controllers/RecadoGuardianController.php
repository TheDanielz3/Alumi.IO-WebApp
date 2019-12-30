<?php

namespace frontend\controllers;

use app\models\Aluno;
use app\models\Disciplinaturma;
use Yii;
use app\models\RecadoGuardian;
use app\models\RecadoGuardianSearch;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RecadoGuardianController implements the CRUD actions for RecadoGuardian model.
 */
class RecadoGuardianController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['guardian', 'admin'],
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'update' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all RecadoGuardian models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RecadoGuardianSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RecadoGuardian model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws ForbiddenHttpException
     */
    public function actionView($id)
    {
        $validRecados = RecadoGuardian::getValidRecados()->all();

        for ($i = 0; $i < count($validRecados); $i++) {
            $currentValidIDS[$i] = $validRecados[$i]->id;
        }


        if (!in_array($this->findModel($id)->id,$currentValidIDS)) {
            throw new ForbiddenHttpException("You don't have permission do view this Recado");
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Updates an existing RecadoGuardian model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->id_aluno !== null) {
            $model->assinado = 1;
            $model->save();
        }

        return $this->redirect(['view', 'id' => $model->id]);
    }

    /**
     * Finds the RecadoGuardian model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RecadoGuardian the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RecadoGuardian::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
