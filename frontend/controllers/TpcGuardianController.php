<?php

namespace frontend\controllers;

use app\models\TesteGuardian;
use Yii;
use app\models\TpcGuardian;
use app\models\TpcGuardianSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TpcGuardianController implements the CRUD actions for TpcGuardian model.
 */
class TpcGuardianController extends Controller
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
        ];
    }

    /**
     * Lists all TpcGuardian models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TpcGuardianSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TpcGuardian model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws ForbiddenHttpException
     */
    public function actionView($id)
    {

        $validRecados = TpcGuardian::getValidTpc()->all();

        for ($i = 0; $i < count($validRecados); $i++) {
            $currentValidIDS[$i] = $validRecados[$i]->id;
        }

        if (!in_array($this->findModel($id)->id,$currentValidIDS)) {
            throw new ForbiddenHttpException("You don't have permission do view this TPC");
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the TpcGuardian model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TpcGuardian the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TpcGuardian::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
